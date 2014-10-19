<?php

/**
 * A mock class generated by Phony.
 *
 * @uses \DateTime
 *
 * This file is part of the Phony package.
 *
 * Copyright © 2014 Erin Millard
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with the Phony source code.
 *
 * @link https://github.com/eloquent/phony
 */
class MockGeneratorDateTime
extends \DateTime
implements \Eloquent\Phony\Mock\MockInterface
{
    /**
     * Inherited method '__set_state'.
     *
     * @uses \DateTime::__set_state()
     */
    public static function __set_state()
    {
        $arguments = array();
        for ($i = 0; $i < func_num_args(); $i++) {
            $arguments[] = func_get_arg($i);
        }

        if (isset(self::$_staticStubs[__FUNCTION__])) {
            return self::$_staticStubs[__FUNCTION__]->invokeWith(
                new \Eloquent\Phony\Call\Argument\Arguments($arguments)
            );
        }
    }

    /**
     * Inherited method 'createFromFormat'.
     *
     * @uses \DateTime::createFromFormat()
     *
     * @param mixed $a0 Was 'format'.
     * @param mixed $a1 Was 'time'.
     * @param mixed $a2 Was 'object'.
     */
    public static function createFromFormat(
        $a0,
        $a1,
        $a2 = null
    ) {
        $arguments = array($a0, $a1, $a2);
        for ($i = 3; $i < func_num_args(); $i++) {
            $arguments[] = func_get_arg($i);
        }

        if (isset(self::$_staticStubs[__FUNCTION__])) {
            return self::$_staticStubs[__FUNCTION__]->invokeWith(
                new \Eloquent\Phony\Call\Argument\Arguments($arguments)
            );
        }
    }

    /**
     * Inherited method 'getLastErrors'.
     *
     * @uses \DateTime::getLastErrors()
     */
    public static function getLastErrors()
    {
        $arguments = array();
        for ($i = 0; $i < func_num_args(); $i++) {
            $arguments[] = func_get_arg($i);
        }

        if (isset(self::$_staticStubs[__FUNCTION__])) {
            return self::$_staticStubs[__FUNCTION__]->invokeWith(
                new \Eloquent\Phony\Call\Argument\Arguments($arguments)
            );
        }
    }

    /**
     * Construct a mock.
     */
    public function __construct()
    {
    }

    /**
     * Inherited method '__wakeup'.
     *
     * @uses \DateTime::__wakeup()
     */
    public function __wakeup()
    {
        $arguments = array();
        for ($i = 0; $i < func_num_args(); $i++) {
            $arguments[] = func_get_arg($i);
        }

        if (isset($this->_stubs[__FUNCTION__])) {
            return $this->_stubs[__FUNCTION__]->invokeWith(
                new \Eloquent\Phony\Call\Argument\Arguments($arguments)
            );
        }
    }

    /**
     * Inherited method 'add'.
     *
     * @uses \DateTime::add()
     *
     * @param mixed $a0 Was 'interval'.
     */
    public function add(
        $a0
    ) {
        $arguments = array($a0);
        for ($i = 1; $i < func_num_args(); $i++) {
            $arguments[] = func_get_arg($i);
        }

        if (isset($this->_stubs[__FUNCTION__])) {
            return $this->_stubs[__FUNCTION__]->invokeWith(
                new \Eloquent\Phony\Call\Argument\Arguments($arguments)
            );
        }
    }

    /**
     * Inherited method 'diff'.
     *
     * @uses \DateTime::diff()
     *
     * @param mixed $a0 Was 'object'.
     * @param mixed $a1 Was 'absolute'.
     */
    public function diff(
        $a0,
        $a1 = null
    ) {
        $arguments = array($a0, $a1);
        for ($i = 2; $i < func_num_args(); $i++) {
            $arguments[] = func_get_arg($i);
        }

        if (isset($this->_stubs[__FUNCTION__])) {
            return $this->_stubs[__FUNCTION__]->invokeWith(
                new \Eloquent\Phony\Call\Argument\Arguments($arguments)
            );
        }
    }

    /**
     * Inherited method 'format'.
     *
     * @uses \DateTime::format()
     *
     * @param mixed $a0 Was 'format'.
     */
    public function format(
        $a0
    ) {
        $arguments = array($a0);
        for ($i = 1; $i < func_num_args(); $i++) {
            $arguments[] = func_get_arg($i);
        }

        if (isset($this->_stubs[__FUNCTION__])) {
            return $this->_stubs[__FUNCTION__]->invokeWith(
                new \Eloquent\Phony\Call\Argument\Arguments($arguments)
            );
        }
    }

    /**
     * Inherited method 'getOffset'.
     *
     * @uses \DateTime::getOffset()
     */
    public function getOffset()
    {
        $arguments = array();
        for ($i = 0; $i < func_num_args(); $i++) {
            $arguments[] = func_get_arg($i);
        }

        if (isset($this->_stubs[__FUNCTION__])) {
            return $this->_stubs[__FUNCTION__]->invokeWith(
                new \Eloquent\Phony\Call\Argument\Arguments($arguments)
            );
        }
    }

    /**
     * Inherited method 'getTimestamp'.
     *
     * @uses \DateTime::getTimestamp()
     */
    public function getTimestamp()
    {
        $arguments = array();
        for ($i = 0; $i < func_num_args(); $i++) {
            $arguments[] = func_get_arg($i);
        }

        if (isset($this->_stubs[__FUNCTION__])) {
            return $this->_stubs[__FUNCTION__]->invokeWith(
                new \Eloquent\Phony\Call\Argument\Arguments($arguments)
            );
        }
    }

    /**
     * Inherited method 'getTimezone'.
     *
     * @uses \DateTime::getTimezone()
     */
    public function getTimezone()
    {
        $arguments = array();
        for ($i = 0; $i < func_num_args(); $i++) {
            $arguments[] = func_get_arg($i);
        }

        if (isset($this->_stubs[__FUNCTION__])) {
            return $this->_stubs[__FUNCTION__]->invokeWith(
                new \Eloquent\Phony\Call\Argument\Arguments($arguments)
            );
        }
    }

    /**
     * Inherited method 'modify'.
     *
     * @uses \DateTime::modify()
     *
     * @param mixed $a0 Was 'modify'.
     */
    public function modify(
        $a0
    ) {
        $arguments = array($a0);
        for ($i = 1; $i < func_num_args(); $i++) {
            $arguments[] = func_get_arg($i);
        }

        if (isset($this->_stubs[__FUNCTION__])) {
            return $this->_stubs[__FUNCTION__]->invokeWith(
                new \Eloquent\Phony\Call\Argument\Arguments($arguments)
            );
        }
    }

    /**
     * Inherited method 'setDate'.
     *
     * @uses \DateTime::setDate()
     *
     * @param mixed $a0 Was 'year'.
     * @param mixed $a1 Was 'month'.
     * @param mixed $a2 Was 'day'.
     */
    public function setDate(
        $a0,
        $a1,
        $a2
    ) {
        $arguments = array($a0, $a1, $a2);
        for ($i = 3; $i < func_num_args(); $i++) {
            $arguments[] = func_get_arg($i);
        }

        if (isset($this->_stubs[__FUNCTION__])) {
            return $this->_stubs[__FUNCTION__]->invokeWith(
                new \Eloquent\Phony\Call\Argument\Arguments($arguments)
            );
        }
    }

    /**
     * Inherited method 'setISODate'.
     *
     * @uses \DateTime::setISODate()
     *
     * @param mixed $a0 Was 'year'.
     * @param mixed $a1 Was 'week'.
     * @param mixed $a2 Was 'day'.
     */
    public function setISODate(
        $a0,
        $a1,
        $a2 = null
    ) {
        $arguments = array($a0, $a1, $a2);
        for ($i = 3; $i < func_num_args(); $i++) {
            $arguments[] = func_get_arg($i);
        }

        if (isset($this->_stubs[__FUNCTION__])) {
            return $this->_stubs[__FUNCTION__]->invokeWith(
                new \Eloquent\Phony\Call\Argument\Arguments($arguments)
            );
        }
    }

    /**
     * Inherited method 'setTime'.
     *
     * @uses \DateTime::setTime()
     *
     * @param mixed $a0 Was 'hour'.
     * @param mixed $a1 Was 'minute'.
     * @param mixed $a2 Was 'second'.
     */
    public function setTime(
        $a0,
        $a1,
        $a2 = null
    ) {
        $arguments = array($a0, $a1, $a2);
        for ($i = 3; $i < func_num_args(); $i++) {
            $arguments[] = func_get_arg($i);
        }

        if (isset($this->_stubs[__FUNCTION__])) {
            return $this->_stubs[__FUNCTION__]->invokeWith(
                new \Eloquent\Phony\Call\Argument\Arguments($arguments)
            );
        }
    }

    /**
     * Inherited method 'setTimestamp'.
     *
     * @uses \DateTime::setTimestamp()
     *
     * @param mixed $a0 Was 'unixtimestamp'.
     */
    public function setTimestamp(
        $a0
    ) {
        $arguments = array($a0);
        for ($i = 1; $i < func_num_args(); $i++) {
            $arguments[] = func_get_arg($i);
        }

        if (isset($this->_stubs[__FUNCTION__])) {
            return $this->_stubs[__FUNCTION__]->invokeWith(
                new \Eloquent\Phony\Call\Argument\Arguments($arguments)
            );
        }
    }

    /**
     * Inherited method 'setTimezone'.
     *
     * @uses \DateTime::setTimezone()
     *
     * @param mixed $a0 Was 'timezone'.
     */
    public function setTimezone(
        $a0
    ) {
        $arguments = array($a0);
        for ($i = 1; $i < func_num_args(); $i++) {
            $arguments[] = func_get_arg($i);
        }

        if (isset($this->_stubs[__FUNCTION__])) {
            return $this->_stubs[__FUNCTION__]->invokeWith(
                new \Eloquent\Phony\Call\Argument\Arguments($arguments)
            );
        }
    }

    /**
     * Inherited method 'sub'.
     *
     * @uses \DateTime::sub()
     *
     * @param mixed $a0 Was 'interval'.
     */
    public function sub(
        $a0
    ) {
        $arguments = array($a0);
        for ($i = 1; $i < func_num_args(); $i++) {
            $arguments[] = func_get_arg($i);
        }

        if (isset($this->_stubs[__FUNCTION__])) {
            return $this->_stubs[__FUNCTION__]->invokeWith(
                new \Eloquent\Phony\Call\Argument\Arguments($arguments)
            );
        }
    }

    /**
     * Call a static parent method.
     *
     * @param string                                           $name      The method name.
     * @param \Eloquent\Phony\Call\Argument\ArgumentsInterface $arguments The arguments.
     */
    private static function _callParentStatic(
        $name,
        \Eloquent\Phony\Call\Argument\ArgumentsInterface $arguments
    ) {
        return call_user_func_array(
            array(__CLASS__, 'parent::' . $name),
            $arguments->all()
        );
    }

    /**
     * Call a parent method.
     *
     * @param string                                           $name      The method name.
     * @param \Eloquent\Phony\Call\Argument\ArgumentsInterface $arguments The arguments.
     */
    private function _callParent(
        $name,
        \Eloquent\Phony\Call\Argument\ArgumentsInterface $arguments
    ) {
        return call_user_func_array(
            array($this, 'parent::' . $name),
            $arguments->all()
        );
    }

    private static $_staticStubs = array();
    private $_stubs = array();
    private $_mockId;
}
