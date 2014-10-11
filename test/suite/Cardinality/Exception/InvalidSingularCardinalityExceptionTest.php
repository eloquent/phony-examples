<?php

/*
 * This file is part of the Phony package.
 *
 * Copyright © 2014 Erin Millard
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Eloquent\Phony\Cardinality\Exception;

use Exception;
use PHPUnit_Framework_TestCase;

class InvalidSingularCardinalityExceptionTest extends PHPUnit_Framework_TestCase
{
    public function testException()
    {
        $cardinality = array(2, 3);
        $cause = new Exception();
        $exception = new InvalidSingularCardinalityException($cardinality, $cause);

        $this->assertSame($cardinality, $exception->cardinality());
        $this->assertSame(
            "The specified cardinality is invalid for events that can only happen once or not at all.",
            $exception->getMessage()
        );
        $this->assertSame(0, $exception->getCode());
        $this->assertSame($cause, $exception->getPrevious());
    }
}