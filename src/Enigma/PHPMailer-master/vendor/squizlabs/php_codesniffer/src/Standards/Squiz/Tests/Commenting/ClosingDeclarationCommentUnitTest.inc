<?php

function __construct()
{
}//end __construct()

function myFunction()
{
}//end myFunction()

function ourFunction()
{
}//end ourFunction

function yourFunction()
{
}//end myFunction()

interface TestClass
{
    function myFunction();

    function ourFunction();

    function yourFunction();

}//end class

interface TestClass
{
}//end class

class TestClass
{
    function __construct()
    {
    }//end __construct()

    function myFunction()
    {
    }//end myFunction()

    function yourFunction()
    {
    }//end myFunction()

}//end interface

abstract class TestClass
{
    abstract function myFunction();

    function ourFunction()
    {
    }//end myFunction()

    function yourFunction()
    {
    }//end yourFunction()

}

class TestClass
{
}

abstract class TestClass
{
}

class MyClass
{
    public function myFunction();
}//end class

// Closures don't need end comments.
echo preg_replace_callback('~-([a-z])~', function ($match) {
    return strtoupper($match[1]);
}, 'hello-world');

class TestClass
{
}

//end class

?>