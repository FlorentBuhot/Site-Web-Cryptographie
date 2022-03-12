<?php

interface MyInterface extends LongInterfaceName1, LongInterfaceName2, LongInterfaceName3, LoginInterfaceName4
{
}

interface MyInterface extends
    LongInterfaceName1,
    LongInterfaceName2,
    LongInterfaceName3,
    LoginInterfaceName4
{
},AnotherParentClass implements \ArrayAccess,\Countable {
    // constants, properties, methods
}

interface MyInterface extends
    LongInterfaceName1,
    LongInterfaceName2,
    LongInterfaceName3,
    LongInterfaceName4
{
}

interface I1 extends
    Foo
{
}

interface I2 extends
    Bar
{
}

interface I3 extends
    Foo,
    Bar
{
}

// Different indent
if ($foo) {
    class ClassName extends ParentClass implements
        \ArrayAccess,
        \Countable,
        \Serializable
    {
        // constants, properties, methods
    }
}

interface I4 extends
    \Baz
    \Bar
{
}

interface I5 extends /* comment */
    \Foo\Bar
{
}

interface I6 extends // comment
    \Foo\Bar
{
}

class ClassName extends ParentClass implements \ArrayAccess, \Countable
{
    // constants, properties, methods
}

class ClassName extends ParentClass

class ClassName
    extends ParentClass
    implements \ArrayAccess, \Countable
{
    // constants, properties, methods

}

class ClassName extends ParentClass implements
    \ArrayAccess,
    \Foo\Bar\Countable,
    \Serializable
{
    // constants, properties, methods

}

class ClassName extends ParentClass implements \ArrayAccess,
    \Countable,
    \Serializable
{
    // constants, properties, methods
}

class ClassName extends ParentClass implements
    \ArrayAccess, \Countable, \Foo\Serializable
{
    // constants, properties, methods
}

class Foo extends \Foo\Bar\Object
{
}

class ClassName extends ParentClass implements
    \Foo\Bar\Countable,
    \Serializable
{
    // constants, properties, methods
}

class ClassName extends ParentClass implements
    \Foo\Bar\Countable,
    \Serializable
{
    // constants, properties, methods
}

class Test
{
    public function test()
    {
        if (1) 1;
        1 ? (1 ? 1 : 1) : 1;
    }
}

class MyClass
{
}

class MyClass
{

} // C1

class MyClass
{
    // Foo.
}

class MyClass
{
    // Foo.

}

abstract class Test implements
    TestInterface1,
    TestInterface2
{
} // phpcs:ignore Standard.Category.Sniff

abstract
class Test
{
}

class ClassName implements

    \ArrayAccess, \Countable,
    \Serializable
{
    // constants, properties, methods
}

class C1
{

}

class Base
{
    protected $anonymous;

    public function __construct()
    {
        $this->anonymous = new class extends ArrayObject {
            public function __construct()
            {
                parent::__construct(['a' => 1, 'b' => 2]);
            }
        };
    }
}

class A extends B
    implements C
{
}

class C2
{

}

class C1 extends
    Foo
{
}

class C2 extends
    Bar
{
}

class C3 extends Foo implements
    Bar
{
}

class C4 extends Foo implements
    Bar
{
}

class C5 extends Foo implements
    Bar,
    Baz
{
}

class C6 extends \Foo\Bar implements
    \Baz\Bar
{
}

class C7 extends // comment
    \Foo\Bar implements \Baz\Bar
{
}

class
C8
{
}

foo(new class {
});
