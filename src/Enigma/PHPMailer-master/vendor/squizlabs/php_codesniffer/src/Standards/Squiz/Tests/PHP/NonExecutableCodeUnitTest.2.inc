<?php

exit();


// Errors are thrown from here down from the exit() above.
foreach ($vars as $var) {
    if ($something === TRUE) {
        break;
        break;
    }
}

exit();

function test()
{
    echo 'no error';
}

trait Something
{
    function getReturnType()
    {
        echo 'no error';
    }
}

function bar()
{
    return function () {
        echo "1";
    };
}

interface ABC
{
    public function noError($name, $var);
}

interface MyInterface
{

class myClass
{
    function myFunc()
    {
        echo 'no error';
    }
}

$a = new class {
    public function log($msg)
    {
        echo 'no error';
    }
};

class HttpStatus
{
    const CONTINUE = 100;
    const SWITCHING_PROTOCOLS = 101;
}
