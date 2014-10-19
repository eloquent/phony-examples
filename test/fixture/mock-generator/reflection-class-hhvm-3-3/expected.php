<?php

/**
 * A mock class generated by Phony.
 *
 * @uses \ReflectionClass
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
class MockGeneratorReflectionClassHhvm3_3
extends \ReflectionClass
implements \Eloquent\Phony\Mock\MockInterface
{
    /**
     * Inherited method 'export'.
     *
     * @uses \ReflectionClass::export()
     *
     * @param mixed $a0 Was 'name'.
     * @param mixed $a1 Was 'ret'.
     */
    public static function export(
        $a0,
        $a1 = false
    ) {
        $arguments = array($a0, $a1);
        for ($i = 2; $i < func_num_args(); $i++) {
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
     * Inherited method '__toString'.
     *
     * @uses \ReflectionClass::__toString()
     */
    public function __toString()
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
     * Inherited method 'getAttribute'.
     *
     * @uses \ReflectionClass::getAttribute()
     *
     * @param mixed $a0 Was 'name'.
     */
    public function getAttribute(
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
     * Inherited method 'getAttributeRecursive'.
     *
     * @uses \ReflectionClass::getAttributeRecursive()
     *
     * @param mixed $a0 Was 'name'.
     */
    public function getAttributeRecursive(
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
     * Inherited method 'getAttributes'.
     *
     * @uses \ReflectionClass::getAttributes()
     */
    public function getAttributes()
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
     * Inherited method 'getAttributesRecursive'.
     *
     * @uses \ReflectionClass::getAttributesRecursive()
     */
    public function getAttributesRecursive()
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
     * Inherited method 'getConstant'.
     *
     * @uses \ReflectionClass::getConstant()
     *
     * @param mixed $a0 Was 'name'.
     */
    public function getConstant(
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
     * Inherited method 'getConstants'.
     *
     * @uses \ReflectionClass::getConstants()
     */
    public function getConstants()
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
     * Inherited method 'getConstructor'.
     *
     * @uses \ReflectionClass::getConstructor()
     */
    public function getConstructor()
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
     * Inherited method 'getDefaultProperties'.
     *
     * @uses \ReflectionClass::getDefaultProperties()
     */
    public function getDefaultProperties()
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
     * Inherited method 'getDocComment'.
     *
     * @uses \ReflectionClass::getDocComment()
     */
    public function getDocComment()
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
     * Inherited method 'getEndLine'.
     *
     * @uses \ReflectionClass::getEndLine()
     */
    public function getEndLine()
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
     * Inherited method 'getExtension'.
     *
     * @uses \ReflectionClass::getExtension()
     */
    public function getExtension()
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
     * Inherited method 'getExtensionName'.
     *
     * @uses \ReflectionClass::getExtensionName()
     */
    public function getExtensionName()
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
     * Inherited method 'getFileName'.
     *
     * @uses \ReflectionClass::getFileName()
     */
    public function getFileName()
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
     * Inherited method 'getInterfaceNames'.
     *
     * @uses \ReflectionClass::getInterfaceNames()
     */
    public function getInterfaceNames()
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
     * Inherited method 'getInterfaces'.
     *
     * @uses \ReflectionClass::getInterfaces()
     */
    public function getInterfaces()
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
     * Inherited method 'getMethod'.
     *
     * @uses \ReflectionClass::getMethod()
     *
     * @param mixed $a0 Was 'name'.
     */
    public function getMethod(
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
     * Inherited method 'getMethods'.
     *
     * @uses \ReflectionClass::getMethods()
     *
     * @param mixed $a0 Was 'filter'.
     */
    public function getMethods(
        $a0 = null
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
     * Inherited method 'getModifiers'.
     *
     * @uses \ReflectionClass::getModifiers()
     */
    public function getModifiers()
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
     * Inherited method 'getName'.
     *
     * @uses \ReflectionClass::getName()
     */
    public function getName()
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
     * Inherited method 'getNamespaceName'.
     *
     * @uses \ReflectionClass::getNamespaceName()
     */
    public function getNamespaceName()
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
     * Inherited method 'getParentClass'.
     *
     * @uses \ReflectionClass::getParentClass()
     */
    public function getParentClass()
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
     * Inherited method 'getProperties'.
     *
     * @uses \ReflectionClass::getProperties()
     *
     * @param mixed $a0 Was 'filter'.
     */
    public function getProperties(
        $a0 = 65535
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
     * Inherited method 'getProperty'.
     *
     * @uses \ReflectionClass::getProperty()
     *
     * @param mixed $a0 Was 'name'.
     */
    public function getProperty(
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
     * Inherited method 'getRequirementNames'.
     *
     * @uses \ReflectionClass::getRequirementNames()
     */
    public function getRequirementNames()
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
     * Inherited method 'getRequirements'.
     *
     * @uses \ReflectionClass::getRequirements()
     */
    public function getRequirements()
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
     * Inherited method 'getShortName'.
     *
     * @uses \ReflectionClass::getShortName()
     */
    public function getShortName()
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
     * Inherited method 'getStartLine'.
     *
     * @uses \ReflectionClass::getStartLine()
     */
    public function getStartLine()
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
     * Inherited method 'getStaticProperties'.
     *
     * @uses \ReflectionClass::getStaticProperties()
     */
    public function getStaticProperties()
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
     * Inherited method 'getStaticPropertyValue'.
     *
     * @uses \ReflectionClass::getStaticPropertyValue()
     *
     * @param mixed $a0 Was 'name'.
     * @param mixed $a1 Was 'default'.
     */
    public function getStaticPropertyValue(
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
     * Inherited method 'getTraitAliases'.
     *
     * @uses \ReflectionClass::getTraitAliases()
     */
    public function getTraitAliases()
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
     * Inherited method 'getTraitNames'.
     *
     * @uses \ReflectionClass::getTraitNames()
     */
    public function getTraitNames()
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
     * Inherited method 'getTraits'.
     *
     * @uses \ReflectionClass::getTraits()
     */
    public function getTraits()
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
     * Inherited method 'hasConstant'.
     *
     * @uses \ReflectionClass::hasConstant()
     *
     * @param mixed $a0 Was 'name'.
     */
    public function hasConstant(
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
     * Inherited method 'hasMethod'.
     *
     * @uses \ReflectionClass::hasMethod()
     *
     * @param mixed $a0 Was 'name'.
     */
    public function hasMethod(
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
     * Inherited method 'hasProperty'.
     *
     * @uses \ReflectionClass::hasProperty()
     *
     * @param mixed $a0 Was 'name'.
     */
    public function hasProperty(
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
     * Inherited method 'implementsInterface'.
     *
     * @uses \ReflectionClass::implementsInterface()
     *
     * @param mixed $a0 Was 'cls'.
     */
    public function implementsInterface(
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
     * Inherited method 'inNamespace'.
     *
     * @uses \ReflectionClass::inNamespace()
     */
    public function inNamespace()
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
     * Inherited method 'isAbstract'.
     *
     * @uses \ReflectionClass::isAbstract()
     */
    public function isAbstract()
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
     * Inherited method 'isCloneable'.
     *
     * @uses \ReflectionClass::isCloneable()
     */
    public function isCloneable()
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
     * Inherited method 'isFinal'.
     *
     * @uses \ReflectionClass::isFinal()
     */
    public function isFinal()
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
     * Inherited method 'isInstance'.
     *
     * @uses \ReflectionClass::isInstance()
     *
     * @param mixed $a0 Was 'obj'.
     */
    public function isInstance(
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
     * Inherited method 'isInstantiable'.
     *
     * @uses \ReflectionClass::isInstantiable()
     */
    public function isInstantiable()
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
     * Inherited method 'isInterface'.
     *
     * @uses \ReflectionClass::isInterface()
     */
    public function isInterface()
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
     * Inherited method 'isInternal'.
     *
     * @uses \ReflectionClass::isInternal()
     */
    public function isInternal()
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
     * Inherited method 'isIterateable'.
     *
     * @uses \ReflectionClass::isIterateable()
     */
    public function isIterateable()
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
     * Inherited method 'isSubclassOf'.
     *
     * @uses \ReflectionClass::isSubclassOf()
     *
     * @param mixed $a0 Was 'cls'.
     */
    public function isSubclassOf(
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
     * Inherited method 'isTrait'.
     *
     * @uses \ReflectionClass::isTrait()
     */
    public function isTrait()
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
     * Inherited method 'isUserDefined'.
     *
     * @uses \ReflectionClass::isUserDefined()
     */
    public function isUserDefined()
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
     * Inherited method 'newInstance'.
     *
     * @uses \ReflectionClass::newInstance()
     *
     * @param mixed $a0 Was 'args'.
     */
    public function newInstance(
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
     * Inherited method 'newInstanceArgs'.
     *
     * @uses \ReflectionClass::newInstanceArgs()
     *
     * @param mixed $a0 Was 'args'.
     */
    public function newInstanceArgs(
        $a0 = array()
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
     * Inherited method 'newInstanceWithoutConstructor'.
     *
     * @uses \ReflectionClass::newInstanceWithoutConstructor()
     */
    public function newInstanceWithoutConstructor()
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
     * Inherited method 'serialize'.
     *
     * @uses \ReflectionClass::serialize()
     */
    public function serialize()
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
     * Inherited method 'setStaticPropertyValue'.
     *
     * @uses \ReflectionClass::setStaticPropertyValue()
     *
     * @param mixed $a0 Was 'name'.
     * @param mixed $a1 Was 'value'.
     */
    public function setStaticPropertyValue(
        $a0,
        $a1
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
     * Inherited method 'unserialize'.
     *
     * @uses \ReflectionClass::unserialize()
     *
     * @param mixed $a0 Was 'string'.
     */
    public function unserialize(
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
