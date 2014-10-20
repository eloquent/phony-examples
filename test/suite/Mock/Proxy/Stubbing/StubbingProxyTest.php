<?php

/*
 * This file is part of the Phony package.
 *
 * Copyright © 2014 Erin Millard
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Eloquent\Phony\Mock\Proxy\Stubbing;

use Eloquent\Phony\Mock\Builder\MockBuilder;
use Eloquent\Phony\Mock\Factory\MockFactory;
use Eloquent\Phony\Stub\Factory\StubVerifierFactory;
use PHPUnit_Framework_TestCase;

class StubbingProxyTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->setUpWith('Eloquent\Phony\Test\TestClassB');
    }

    public function testConstructor()
    {
        $this->assertSame($this->mock, $this->subject->mock());
        $this->assertSame($this->class, $this->subject->reflector());
        $this->assertSame($this->className, $this->subject->className());
        $this->assertSame($this->stubs, $this->subject->stubs());
        $this->assertSame($this->magicStubsProperty, $this->subject->magicStubsProperty());
        $this->assertSame($this->mockFactory, $this->subject->mockFactory());
        $this->assertSame($this->stubVerifierFactory, $this->subject->stubVerifierFactory());
    }

    public function testConstructorDefaults()
    {
        $this->subject = new StubbingProxy($this->mock, $this->class, $this->stubs);

        $this->assertNull($this->subject->magicStubsProperty());
        $this->assertSame(MockFactory::instance(), $this->subject->mockFactory());
        $this->assertSame(StubVerifierFactory::instance(), $this->subject->stubVerifierFactory());
    }

    public function testFull()
    {
        $className = $this->className;

        $this->assertSame($this->subject, $this->subject->full());
        $this->assertNull($className::testClassAStaticMethodA());
        $this->assertNull($className::testClassAStaticMethodB('a', 'b'));
    }

    public function testStubFailure()
    {
        $this->setUpWith('Eloquent\Phony\Test\TestClassA');

        $this->setExpectedException('Eloquent\Phony\Mock\Exception\UndefinedMethodStubException');
        $this->subject->stub('nonexistent');
    }

    public function testMagicPropertyFailure()
    {
        $this->setUpWith('Eloquent\Phony\Test\TestClassA');

        $this->setExpectedException('Eloquent\Phony\Mock\Proxy\Exception\UndefinedPropertyException');
        $this->subject->nonexistent;
    }

    public function testMagicCallFailure()
    {
        $this->setUpWith('Eloquent\Phony\Test\TestClassA');

        $this->setExpectedException('Eloquent\Phony\Mock\Proxy\Exception\UndefinedMethodException');
        $this->subject->nonexistent();
    }

    protected function setUpWith($className)
    {
        $this->mockBuilder = new MockBuilder($className);
        $this->mock = $this->mockBuilder->get();
        $this->class = $this->mockBuilder->build();
        $this->className = $this->class->getName();
        $stubsProperty = $this->class->getProperty('_staticStubs');
        $stubsProperty->setAccessible(true);
        $this->stubs = $this->expectedStubs($stubsProperty->getValue(null));
        if ($this->class->hasMethod('__callStatic')) {
            $this->magicStubsProperty = $this->class->getProperty('_magicStaticStubs');
            $this->magicStubsProperty->setAccessible(true);
        } else {
            $this->magicStubsProperty = null;
        }
        $this->mockFactory = new MockFactory();
        $this->stubVerifierFactory = new StubVerifierFactory();
        $this->subject = new StubbingProxy(
            $this->mock,
            $this->class,
            $this->stubs,
            $this->magicStubsProperty,
            $this->mockFactory,
            $this->stubVerifierFactory
        );
    }

    protected function expectedStubs(array $stubs)
    {
        foreach ($stubs as $name => $stub) {
            $stubs[$name] = StubVerifierFactory::instance()->create($stub->callback(), $stub);
        }

        return $stubs;
    }
}
