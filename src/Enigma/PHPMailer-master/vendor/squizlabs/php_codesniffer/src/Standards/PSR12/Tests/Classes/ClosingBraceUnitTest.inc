<?php

trait Foo3
{

}

interface Foo2
{

}//end class

class Foo
{
}

echo 'hi';

class Foo1
{
    public function foo()
    {
    }

    public function foo2()
    {
    }//end foo2()
}//end

function bar()
{
}

function bar2()
{
}//end bar2()

$foo->bar(
    $arg1,
    function ($arg2) use ($var1) {
        // body
    },
    $arg3
);

$instance = new class extends \Foo implements \HandleableInterface {
    // Class content
};

$app->get('/hello/{name}', function ($name) use ($app) {
    return 'Hello ' . $app->escape($name);
});
