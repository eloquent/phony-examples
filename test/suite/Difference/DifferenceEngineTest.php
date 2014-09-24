<?php

/*
 * This file is part of the Phony package.
 *
 * Copyright © 2014 Erin Millard
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace Eloquent\Phony\Difference;

use PHPUnit_Framework_TestCase;
use ReflectionClass;

class DifferenceEngineTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->subject = new DifferenceEngine();
    }

    public function differenceData()
    {
        return array(
            'Addition at start' => array(
                array(
                    'c',
                    'd',
                ),
                array(
                    'a',
                    'b',
                    'c',
                    'd',
                ),
                array(
                    array('+', 'a'),
                    array('+', 'b'),
                    array(' ', 'c'),
                    array(' ', 'd'),
                ),
            ),

            'Addition in middle' => array(
                array(
                    'a',
                    'd',
                ),
                array(
                    'a',
                    'b',
                    'c',
                    'd',
                ),
                array(
                    array(' ', 'a'),
                    array('+', 'b'),
                    array('+', 'c'),
                    array(' ', 'd'),
                ),
            ),

            'Addition at end' => array(
                array(
                    'a',
                    'b',
                ),
                array(
                    'a',
                    'b',
                    'c',
                    'd',
                ),
                array(
                    array(' ', 'a'),
                    array(' ', 'b'),
                    array('+', 'c'),
                    array('+', 'd'),
                ),
            ),

            'Removal at start' => array(
                array(
                    'a',
                    'b',
                    'c',
                    'd',
                ),
                array(
                    'c',
                    'd',
                ),
                array(
                    array('-', 'a'),
                    array('-', 'b'),
                    array(' ', 'c'),
                    array(' ', 'd'),
                ),
            ),

            'Removal in middle' => array(
                array(
                    'a',
                    'b',
                    'c',
                    'd',
                ),
                array(
                    'a',
                    'd',
                ),
                array(
                    array(' ', 'a'),
                    array('-', 'b'),
                    array('-', 'c'),
                    array(' ', 'd'),
                ),
            ),

            'Removal at end' => array(
                array(
                    'a',
                    'b',
                    'c',
                    'd',
                ),
                array(
                    'a',
                    'b',
                ),
                array(
                    array(' ', 'a'),
                    array(' ', 'b'),
                    array('-', 'c'),
                    array('-', 'd'),
                ),
            ),

            'Banana to atana' => array(
                array(
                    'b',
                    'a',
                    'n',
                    'a',
                    'n',
                    'a',
                ),
                array(
                    'a',
                    't',
                    'a',
                    'n',
                    'a',
                ),
                array(
                    array('-', 'b'),
                    array(' ', 'a'),
                    array('-', 'n'),
                    array('+', 't'),
                    array(' ', 'a'),
                    array(' ', 'n'),
                    array(' ', 'a'),
                ),
            ),

            'Lao to tzu' => array(
                array(
                    'The Way that can be told of is not the eternal Way;',
                    'The name that can be named is not the eternal name.',
                    'The Nameless is the origin of Heaven and Earth;',
                    'The Named is the mother of all things.',
                    'Therefore let there always be non-being,',
                    '  so we may see their subtlety,',
                    'And let there always be being,',
                    '  so we may see their outcome.',
                    'The two are the same,',
                    'But after they are produced,',
                    '  they have different names.',
                ),
                array(
                    'The Nameless is the origin of Heaven and Earth;',
                    'The named is the mother of all things.',
                    '',
                    'Therefore let there always be non-being,',
                    '  so we may see their subtlety,',
                    'And let there always be being,',
                    '  so we may see their outcome.',
                    'The two are the same,',
                    'But after they are produced,',
                    '  they have different names.',
                    'They both may be called deep and profound.',
                    'Deeper and more profound,',
                    'The door of all subtleties!',
                ),
                array(
                    array('-', 'The Way that can be told of is not the eternal Way;'),
                    array('-', 'The name that can be named is not the eternal name.'),
                    array(' ', 'The Nameless is the origin of Heaven and Earth;'),
                    array('-', 'The Named is the mother of all things.'),
                    array('+', 'The named is the mother of all things.'),
                    array('+', ''),
                    array(' ', 'Therefore let there always be non-being,'),
                    array(' ', '  so we may see their subtlety,'),
                    array(' ', 'And let there always be being,'),
                    array(' ', '  so we may see their outcome.'),
                    array(' ', 'The two are the same,'),
                    array(' ', 'But after they are produced,'),
                    array(' ', '  they have different names.'),
                    array('+', 'They both may be called deep and profound.'),
                    array('+', 'Deeper and more profound,'),
                    array('+', 'The door of all subtleties!'),
                ),
            ),
        );
    }

    /**
     * @dataProvider differenceData
     */
    public function testDifference($from, $to, $expected)
    {
        $this->assertSame($expected, $this->subject->difference($from, $to));
    }

    public function lineDifferenceData()
    {
        return array(
            'Added final lines with EOL no EOL change' => array(
                "a\nb\n",
                "a\nb\nc\n",
                array(
                    array(' ', "a\n"),
                    array(' ', "b\n"),
                    array('+', "c\n"),
                ),
            ),

            'Added final lines without EOL no EOL change' => array(
                "a\nb",
                "a\nb\nc",
                array(
                    array(' ', "a\n"),
                    array('-', "b"),
                    array('+', "b\n"),
                    array('+', "c"),
                ),
            ),

            'Added trailing EOL' => array(
                "a\nb",
                "a\nb\n",
                array(
                    array(' ', "a\n"),
                    array('-', "b"),
                    array('+', "b\n"),
                ),
            ),

            'Added trailing EOL and additional lines' => array(
                "a\nb",
                "a\nb\nc\n",
                array(
                    array(' ', "a\n"),
                    array('-', "b"),
                    array('+', "b\n"),
                    array('+', "c\n"),
                ),
            ),

            'Removed final lines with EOL no EOL change' => array(
                "a\nb\nc\n",
                "a\nb\n",
                array(
                    array(' ', "a\n"),
                    array(' ', "b\n"),
                    array('-', "c\n"),
                ),
            ),

            'Removed final lines with no EOL no EOL change' => array(
                "a\nb\nc",
                "a\nb",
                array(
                    array(' ', "a\n"),
                    array('-', "b\n"),
                    array('+', "b"),
                    array('-', "c"),
                ),
            ),

            'Removed trailing EOL' => array(
                "a\nb\n",
                "a\nb",
                array(
                    array(' ', "a\n"),
                    array('-', "b\n"),
                    array('+', "b"),
                ),
            ),

            'Removed trailing EOL and additional lines' => array(
                "a\nb\nc\n",
                "a\nb",
                array(
                    array(' ', "a\n"),
                    array('-', "b\n"),
                    array('+', "b"),
                    array('-', "c\n"),
                ),
            ),

            'Banana to atana' => array(
                "b\na\nn\na\nn\na\n",
                "a\nt\na\nn\na\n",
                array(
                    array('-', "b\n"),
                    array(' ', "a\n"),
                    array('-', "n\n"),
                    array('+', "t\n"),
                    array(' ', "a\n"),
                    array(' ', "n\n"),
                    array(' ', "a\n"),
                ),
            ),

            'Lao to tzu' => array(
                "The Way that can be told of is not the eternal Way;\n" .
                    "The name that can be named is not the eternal name.\r\n" .
                    "The Nameless is the origin of Heaven and Earth;\n" .
                    "The Named is the mother of all things.\r\n" .
                    "Therefore let there always be non-being,\n" .
                    "  so we may see their subtlety,\r\n" .
                    "And let there always be being,\n" .
                    "  so we may see their outcome.\r\n" .
                    "The two are the same,\n" .
                    "But after they are produced,\r\n" .
                    "  they have different names.",
                "The Nameless is the origin of Heaven and Earth;\n" .
                    "The named is the mother of all things.\r" .
                    "\r" .
                    "Therefore let there always be non-being,\r" .
                    "  so we may see their subtlety,\n" .
                    "And let there always be being,\r" .
                    "  so we may see their outcome.\n" .
                    "The two are the same,\r" .
                    "But after they are produced,\n" .
                    "  they have different names.\r" .
                    "They both may be called deep and profound.\n" .
                    "Deeper and more profound,\r" .
                    "The door of all subtleties!\n",
                array(
                    array('-', "The Way that can be told of is not the eternal Way;\n"),
                    array('-', "The name that can be named is not the eternal name.\r\n"),
                    array(' ', "The Nameless is the origin of Heaven and Earth;\n"),
                    array('-', "The Named is the mother of all things.\r\n"),
                    array('+', "The named is the mother of all things.\r"),
                    array('+', "\r"),
                    array(' ', "Therefore let there always be non-being,\n"),
                    array(' ', "  so we may see their subtlety,\r\n"),
                    array(' ', "And let there always be being,\n"),
                    array(' ', "  so we may see their outcome.\r\n"),
                    array(' ', "The two are the same,\n"),
                    array(' ', "But after they are produced,\r\n"),
                    array('-', "  they have different names."),
                    array('+', "  they have different names.\r"),
                    array('+', "They both may be called deep and profound.\n"),
                    array('+', "Deeper and more profound,\r"),
                    array('+', "The door of all subtleties!\n"),
                ),
            ),
        );
    }

    /**
     * @dataProvider lineDifferenceData
     */
    public function testLineDifference($from, $to, $expected)
    {
        $this->assertSame($expected, $this->subject->lineDifference($from, $to));
    }

    public function testInstance()
    {
        $class = get_class($this->subject);
        $reflector = new ReflectionClass($class);
        $property = $reflector->getProperty('instance');
        $property->setAccessible(true);
        $property->setValue(null, null);
        $instance = $class::instance();

        $this->assertInstanceOf($class, $instance);
        $this->assertSame($instance, $class::instance());
    }
}