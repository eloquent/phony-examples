<?php

/*
 * This file is part of the Phony package.
 *
 * Copyright © 2014 Erin Millard
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Eloquent\Phony\Call\Event\Factory;

use Eloquent\Phony\Call\Call;
use Eloquent\Phony\Call\Event\GeneratedEvent;
use Eloquent\Phony\Call\Event\ReturnedEvent;
use Eloquent\Phony\Sequencer\Sequencer;
use Eloquent\Phony\Test\TestClock;
use PHPUnit_Framework_TestCase;
use RuntimeException;

/**
 * @covers \Eloquent\Phony\Call\Event\Factory\CallEventFactory
 */
class CallEventFactoryWithGeneratorsTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->sequencer = new Sequencer();
        $this->clock = new TestClock();
        $this->subject = new CallEventFactory($this->sequencer, $this->clock);

        $this->exception = new RuntimeException('You done goofed.');
    }

    public function testCreateResponseWithGenerators()
    {
        $generator = call_user_func(function () { return; yield null; });
        $generatedEvent = new GeneratedEvent(0, 0.0, $generator);
        $returnedEvent = new ReturnedEvent(1, 1.0, $generator);

        $this->assertEquals($generatedEvent, $this->subject->createResponse($generator, null, true));
        $this->assertEquals($returnedEvent, $this->subject->createResponse($generator, null, false));
    }

    public function testCreateGeneratedEvent()
    {
        $generatorFactory = eval('return function () { return; yield null; };');
        $generator = call_user_func($generatorFactory);
        $expected = new GeneratedEvent(0, 0.0, $generator);
        $actual = $this->subject->createGenerated($generator);

        $this->assertEquals($expected, $actual);
    }
}
