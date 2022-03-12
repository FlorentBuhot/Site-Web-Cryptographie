<?php

namespace PHP_CodeSniffer\Tests\Core\File;

interface testFECNInterface
{
}

/* testExtendedClass */

interface testInterfaceThatExtendsInterface extends testFECNInterface
{
}

/* testNamespacedClass */

interface testInterfaceThatExtendsFQCNInterface extends \PHP_CodeSniffer\Tests\Core\File\testFECNInterface
{
}

/* testNonExtendedClass */

class testFECNClass
{
}

/* testInterface */

class testFECNExtendedClass extends testFECNClass
{
}

/* testInterfaceThatExtendsInterface */

class testFECNNamespacedClass extends \PHP_CodeSniffer\Tests\Core\File\testFECNClass
{
}

/* testInterfaceThatExtendsFQCNInterface */

class testFECNNonExtendedClass
{
}

/* testNestedExtendedClass */

class testFECNNestedExtendedClass
{
    public function someMethod()
    {
        /* testNestedExtendedAnonClass */
        $anon = new class extends testFECNAnonClass {
        };
    }
}

/* testClassThatExtendsAndImplements */

class testFECNClassThatExtendsAndImplements extends testFECNClass implements InterfaceA, InterfaceB
{
}

/* testClassThatImplementsAndExtends */

class testFECNClassThatImplementsAndExtends implements InterfaceA, InterfaceB extends testFECNClass {
}
