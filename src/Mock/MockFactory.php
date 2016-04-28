<?php

/*
 * This file is part of the Phony package.
 *
 * Copyright © 2016 Erin Millard
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Eloquent\Phony\Mock;

use Eloquent\Phony\Call\Arguments;
use Eloquent\Phony\Mock\Builder\MockDefinition;
use Eloquent\Phony\Mock\Exception\ClassExistsException;
use Eloquent\Phony\Mock\Exception\MockException;
use Eloquent\Phony\Mock\Exception\MockGenerationFailedException;
use Eloquent\Phony\Mock\Handle\HandleFactory;
use Eloquent\Phony\Sequencer\Sequencer;
use ParseError;
use ParseException;
use ReflectionClass;

/**
 * Creates mock instances.
 */
class MockFactory
{
    /**
     * Get the static instance of this factory.
     *
     * @return MockFactory The static factory.
     */
    public static function instance()
    {
        if (!self::$instance) {
            self::$instance = new self(
                Sequencer::sequence('mock-label'),
                MockGenerator::instance(),
                HandleFactory::instance()
            );
        }

        return self::$instance;
    }

    /**
     * Cosntruct a new mock factory.
     *
     * @param Sequencer     $labelSequencer The label sequencer to use.
     * @param MockGenerator $generator      The generator to use.
     * @param HandleFactory $handleFactory  The handle factory to use.
     */
    public function __construct(
        Sequencer $labelSequencer,
        MockGenerator $generator,
        HandleFactory $handleFactory
    ) {
        $this->labelSequencer = $labelSequencer;
        $this->generator = $generator;
        $this->handleFactory = $handleFactory;
        $this->definitions = array();
    }

    /**
     * Create the mock class for the supplied definition.
     *
     * @param MockDefinition $definition The definition.
     * @param bool           $createNew  True if a new class should be created even when a compatible one exists.
     *
     * @return ReflectionClass The class.
     * @throws MockException   If the mock generation fails.
     */
    public function createMockClass(
        MockDefinition $definition,
        $createNew = false
    ) {
        $signature = $definition->signature();

        if (!$createNew) {
            foreach ($this->definitions as $tuple) {
                if ($signature === $tuple[0]) {
                    return $tuple[1];
                }
            }
        }

        $className = $this->generator->generateClassName($definition);

        if (class_exists($className, false)) {
            throw new ClassExistsException($className);
        }

        $source = $this->generator->generate($definition, $className);

        $reporting = error_reporting(E_ERROR | E_COMPILE_ERROR);

        try {
            eval($source);
        } catch (ParseError $e) {
            throw new MockGenerationFailedException(
                $definition,
                $source,
                error_get_last(),
                $e
            );
            // @codeCoverageIgnoreStart
        } catch (ParseException $e) {
            throw new MockGenerationFailedException(
                $definition,
                $source,
                error_get_last(),
                $e
            );
        }
        // @codeCoverageIgnoreEnd

        error_reporting($reporting);

        if (!class_exists($className, false)) {
            // @codeCoverageIgnoreStart
            throw new MockGenerationFailedException(
                $definition,
                $source,
                error_get_last()
            );
            // @codeCoverageIgnoreEnd
        }

        $class = new ReflectionClass($className);
        $customMethods = array();

        foreach ($definition->customStaticMethods() as $methodName => $method) {
            $customMethods[strtolower($methodName)] = $method[0];
        }
        foreach ($definition->customMethods() as $methodName => $method) {
            $customMethods[strtolower($methodName)] = $method[0];
        }

        $customMethodsProperty = $class->getProperty('_customMethods');
        $customMethodsProperty->setAccessible(true);
        $customMethodsProperty->setValue(null, $customMethods);

        $this->handleFactory->createStubbingStatic($class);

        $this->definitions[] = array($signature, $class);

        return $class;
    }

    /**
     * Create a new full mock instance for the supplied class.
     *
     * @param ReflectionClass $class The class.
     *
     * @return Mock          The newly created mock.
     * @throws MockException If the mock generation fails.
     */
    public function createFullMock(ReflectionClass $class)
    {
        $mock = $class->newInstanceArgs();
        $this->handleFactory
            ->createStubbing($mock, strval($this->labelSequencer->next()));

        return $mock;
    }

    /**
     * Create a new partial mock instance for the supplied definition.
     *
     * @param ReflectionClass      $class     The class.
     * @param Arguments|array|null $arguments The constructor arguments, or null to bypass the constructor.
     *
     * @return Mock          The newly created mock.
     * @throws MockException If the mock generation fails.
     */
    public function createPartialMock(
        ReflectionClass $class,
        $arguments = array()
    ) {
        $mock = $class->newInstanceArgs();
        $handle = $this->handleFactory
            ->createStubbing($mock, strval($this->labelSequencer->next()));

        $handle->partial();

        if (null !== $arguments) {
            $handle->constructWith($arguments);
        }

        return $mock;
    }

    private static $instance;
    private $labelSequencer;
    private $generator;
    private $handleFactory;
    private $definitions;
}