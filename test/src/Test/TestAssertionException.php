<?php

/*
 * This file is part of the Phony package.
 *
 * Copyright © 2014 Erin Millard
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Eloquent\Phony\Test;

use Eloquent\Phony\Assertion\Exception\AssertionExceptionInterface;
use Exception;

class TestAssertionException extends Exception implements
    AssertionExceptionInterface
{
}