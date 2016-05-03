<?php

/*
 * This file is part of the Phony package.
 *
 * Copyright © 2016 Erin Millard
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Eloquent\Phony\Spy;

use Eloquent\Phony\Assertion\AssertionRenderer;
use Eloquent\Phony\Assertion\ExceptionAssertionRecorder;
use Eloquent\Phony\Call\Arguments;
use Eloquent\Phony\Call\CallVerifierFactory;
use Eloquent\Phony\Exporter\InlineExporter;
use Eloquent\Phony\Invocation\InvocableInspector;
use Eloquent\Phony\Invocation\Invoker;
use Eloquent\Phony\Matcher\AnyMatcher;
use Eloquent\Phony\Matcher\MatcherFactory;
use Eloquent\Phony\Matcher\MatcherVerifier;
use Eloquent\Phony\Matcher\WildcardMatcher;
use Eloquent\Phony\Test\GeneratorFactory;
use Eloquent\Phony\Test\TestCallFactory;
use Eloquent\Phony\Test\TestClassA;
use Eloquent\Phony\Verification\GeneratorVerifierFactory;
use Eloquent\Phony\Verification\TraversableVerifierFactory;
use PHPUnit_Framework_TestCase;
use RuntimeException;

class SpyVerifierWithGeneratorsTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->callback = 'implode';
        $this->callFactory = new TestCallFactory();
        $this->invoker = Invoker::instance();
        $this->generatorSpyFactory = GeneratorSpyFactory::instance();
        $this->traversableSpyFactory = TraversableSpyFactory::instance();
        $this->label = 'label';
        $this->spy = new SpyData(
            $this->callback,
            $this->label,
            $this->callFactory,
            $this->invoker,
            $this->generatorSpyFactory,
            $this->traversableSpyFactory
        );

        $this->exporter = new InlineExporter(1, false);
        $this->matcherFactory =
            new MatcherFactory(AnyMatcher::instance(), WildcardMatcher::instance(), $this->exporter);
        $this->matcherVerifier = new MatcherVerifier();
        $this->generatorVerifierFactory = GeneratorVerifierFactory::instance();
        $this->traversableVerifierFactory = TraversableVerifierFactory::instance();
        $this->callVerifierFactory = CallVerifierFactory::instance();
        $this->assertionRecorder = ExceptionAssertionRecorder::instance();
        $this->invocableInspector = new InvocableInspector();
        $this->assertionRenderer = new AssertionRenderer($this->invocableInspector, $this->exporter);
        $this->subject = new SpyVerifier(
            $this->spy,
            $this->matcherFactory,
            $this->matcherVerifier,
            $this->generatorVerifierFactory,
            $this->traversableVerifierFactory,
            $this->callVerifierFactory,
            $this->assertionRecorder,
            $this->assertionRenderer,
            $this->invocableInspector
        );

        $this->generatorVerifierFactory->setCallVerifierFactory($this->callVerifierFactory);
        $this->traversableVerifierFactory->setCallVerifierFactory($this->callVerifierFactory);

        $this->callEventFactory = $this->callFactory->eventFactory();

        $this->returnValueA = 'x';
        $this->returnValueB = 'y';
        $this->exceptionA = new RuntimeException('You done goofed.');
        $this->exceptionB = new RuntimeException('Consequences will never be the same.');
        $this->thisValueA = new TestClassA();
        $this->thisValueB = new TestClassA();
        $this->arguments = Arguments::create('a', 'b', 'c');
        $this->matchers = $this->matcherFactory->adaptAll($this->arguments->all());
        $this->otherMatcher = $this->matcherFactory->adapt('d');
        $this->callA = $this->callFactory->create(
            $this->callEventFactory->createCalled(array($this->thisValueA, 'testClassAMethodA'), $this->arguments),
            $this->callEventFactory->createReturned($this->returnValueA),
            null,
            $this->callEventFactory->createReturned($this->returnValueA)
        );
        $this->callAResponse = $this->callA->responseEvent();
        $this->callB = $this->callFactory->create(
            $this->callEventFactory->createCalled(array($this->thisValueB, 'testClassAMethodA')),
            $this->callEventFactory->createReturned($this->returnValueB),
            null,
            $this->callEventFactory->createReturned($this->returnValueB)
        );
        $this->callBResponse = $this->callB->responseEvent();
        $this->callC = $this->callFactory->create(
            $this->callEventFactory->createCalled(array($this->thisValueA, 'testClassAMethodA'), $this->arguments),
            $this->callEventFactory->createThrew($this->exceptionA),
            null,
            $this->callEventFactory->createThrew($this->exceptionA)
        );
        $this->callCResponse = $this->callC->responseEvent();
        $this->callD = $this->callFactory->create(
            $this->callEventFactory->createCalled('implode'),
            $this->callEventFactory->createThrew($this->exceptionB),
            null,
            $this->callEventFactory->createThrew($this->exceptionB)
        );
        $this->callDResponse = $this->callD->responseEvent();
        $this->callE = $this->callFactory->create($this->callEventFactory->createCalled('implode'));
        $this->calls = array($this->callA, $this->callB, $this->callC, $this->callD, $this->callE);
        $this->wrappedCallA = $this->callVerifierFactory->fromCall($this->callA);
        $this->wrappedCallB = $this->callVerifierFactory->fromCall($this->callB);
        $this->wrappedCallC = $this->callVerifierFactory->fromCall($this->callC);
        $this->wrappedCallD = $this->callVerifierFactory->fromCall($this->callD);
        $this->wrappedCalls = array($this->wrappedCallA, $this->wrappedCallB, $this->wrappedCallC, $this->wrappedCallD);

        $this->callFactory->reset();

        // additions for generators

        $this->receivedExceptionA = new RuntimeException('Consequences will never be the same.');
        $this->receivedExceptionB = new RuntimeException('Because I backtraced it.');
        $this->generatorCalledEvent = $this->callEventFactory->createCalled();
        $this->generatedEvent = $this->callEventFactory->createReturned(GeneratorFactory::createEmpty());
        $this->generatorEventA = $this->callEventFactory->createProduced('m', 'n');
        $this->generatorEventB = $this->callEventFactory->createReceived('o');
        $this->generatorEventC = $this->callEventFactory->createProduced('p', 'q');
        $this->generatorEventD = $this->callEventFactory->createReceivedException($this->receivedExceptionA);
        $this->generatorEventE = $this->callEventFactory->createProduced('r', 's');
        $this->generatorEventF = $this->callEventFactory->createReceived('t');
        $this->generatorEventG = $this->callEventFactory->createProduced('u', 'v');
        $this->generatorEventH = $this->callEventFactory->createReceivedException($this->receivedExceptionB);
        $this->generatorEvents = array(
            $this->generatorEventA,
            $this->generatorEventB,
            $this->generatorEventC,
            $this->generatorEventD,
            $this->generatorEventE,
            $this->generatorEventF,
            $this->generatorEventG,
            $this->generatorEventH,
        );
        $this->generatorEndEvent = $this->callEventFactory->createReturned(null);
        $this->generatorCall = $this->callFactory->create(
            $this->generatorCalledEvent,
            $this->generatedEvent,
            $this->generatorEvents,
            $this->generatorEndEvent
        );
    }

    public function testReturnedFailureWithGenerator()
    {
        $this->subject->addCall($this->generatorCall);

        $this->setExpectedException('Eloquent\Phony\Assertion\Exception\AssertionException');
        $this->subject->returned(null);
    }

    public function testThrewFailureWithGenerator()
    {
        $this->generatorEndEvent = $this->callEventFactory->createReturned(null);
        $this->generatorCall = $this->callFactory->create(
            $this->generatorCalledEvent,
            $this->generatedEvent,
            $this->generatorEvents,
            $this->callEventFactory->createThrew($this->exceptionA)
        );
        $this->subject->addCall($this->generatorCall);

        $this->setExpectedException('Eloquent\Phony\Assertion\Exception\AssertionException');
        $this->subject->threw();
    }

    public function testCheckGenerated()
    {
        $this->assertFalse((boolean) $this->subject->checkGenerated());
        $this->assertTrue((boolean) $this->subject->never()->checkGenerated());

        $this->subject->setCalls($this->calls);

        $this->assertFalse((boolean) $this->subject->checkGenerated());
        $this->assertTrue((boolean) $this->subject->never()->checkGenerated());

        $this->subject->addCall($this->generatorCall);

        $this->assertTrue((boolean) $this->subject->checkGenerated());
        $this->assertTrue((boolean) $this->subject->once()->checkGenerated());
    }

    public function testGenerated()
    {
        $this->assertEquals(
            $this->generatorVerifierFactory->create($this->subject, array()),
            $this->subject->never()->generated()
        );

        $this->subject->addCall($this->generatorCall);

        $this->assertEquals(
            $this->generatorVerifierFactory->create($this->subject, array($this->generatorCall)),
            $this->subject->generated()
        );
    }

    public function testGeneratedFailure()
    {
        $this->subject->setCalls($this->calls);

        $expected = <<<'EOD'
Expected call on implode[label] to generate. Responded:
    - returned "x"
    - returned "y"
    - threw RuntimeException("You done goofed.")
    - threw RuntimeException("Consequences will never be the same.")
    - <none>
EOD;

        $this->setExpectedException('Eloquent\Phony\Assertion\Exception\AssertionException', $expected);
        $this->subject->generated();
    }

    public function testGeneratedFailureWithNoCalls()
    {
        $this->setExpectedException(
            'Eloquent\Phony\Assertion\Exception\AssertionException',
            'Expected call on implode[label] to generate. Never called.'
        );
        $this->subject->generated();
    }

    public function testCheckAlwaysGenerated()
    {
        $this->assertFalse((boolean) $this->subject->always()->checkGenerated());

        $this->subject->setCalls($this->calls);

        $this->assertFalse((boolean) $this->subject->always()->checkGenerated());

        $this->subject->setCalls(array($this->generatorCall, $this->generatorCall));

        $this->assertTrue((boolean) $this->subject->always()->checkGenerated());
    }

    public function testAlwaysGenerated()
    {
        $this->subject->setCalls(array($this->generatorCall, $this->generatorCall));
        $expected =
            $this->generatorVerifierFactory->create($this->subject, array($this->generatorCall, $this->generatorCall));

        $this->assertEquals($expected, $this->subject->always()->generated());
    }

    public function testAlwaysGeneratedFailure()
    {
        $this->subject->setCalls($this->calls);

        $expected = <<<'EOD'
Expected every call on implode[label] to generate. Responded:
    - returned "x"
    - returned "y"
    - threw RuntimeException("You done goofed.")
    - threw RuntimeException("Consequences will never be the same.")
    - <none>
EOD;

        $this->setExpectedException('Eloquent\Phony\Assertion\Exception\AssertionException', $expected);
        $this->subject->always()->generated();
    }

    public function testAlwaysGeneratedFailureWithNoMatcher()
    {
        $this->subject->setCalls($this->calls);

        $expected = <<<'EOD'
Expected every call on implode[label] to generate. Responded:
    - returned "x"
    - returned "y"
    - threw RuntimeException("You done goofed.")
    - threw RuntimeException("Consequences will never be the same.")
    - <none>
EOD;

        $this->setExpectedException('Eloquent\Phony\Assertion\Exception\AssertionException', $expected);
        $this->subject->always()->generated();
    }

    public function testAlwaysGeneratedFailureWithNoCalls()
    {
        $this->setExpectedException(
            'Eloquent\Phony\Assertion\Exception\AssertionException',
            'Expected every call on implode[label] to generate. Never called.'
        );
        $this->subject->always()->generated();
    }
}
