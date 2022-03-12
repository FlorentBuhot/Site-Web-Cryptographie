<?php

interface CustomChildCreator
{
    public function customChildCreator($elementName, Project $project);
}

class TestClass extends MyClass
{

    function __construct()
    {
        parent::MYCLASS();
        parent::__construct();
    }

    function TestClass()
    {
        parent::MyClass();
        parent::__construct();
    }

}

class MyClass
{

    function __construct()
    {
        parent::YourClass();
        parent::__construct();
    }

    function MyClass()
    {
        parent::YourClass();
        parent::__construct();
    }

}

class MyOtherClass extends \MyNamespace\SomeClass
{
    function __construct()
    {
        something::MyNamespace();
    }

}

abstract class MyAbstractClass extends \MyNamespace\SomeClass
{
    abstract public function __construct();
}

foo(new class extends MyClass {

    function TestClass()
    {
        parent::MyClass();
        parent::__construct();
    }

    function __construct()
    {
        parent::MyClass();
        parent::__construct();
    }

});

class OldClass
{
    function OldClass()
    {

    }
}


// Issue #2178.

class OlderClass
{
    function __CONSTRUCT()
    {
    }

    function OlderClass()
    {
    }
}

class Nested extends Another
{
    abstract public function nested();

    public function getAnonymousClass()
    {
        return new class() extends Something {
            public function nested()
            {
                echo 'In method nested!';
                parent::Another(); // OK.
            }

            public function __construct()
            {
                parent::Another(); // OK.
            }
        };
    }
}
