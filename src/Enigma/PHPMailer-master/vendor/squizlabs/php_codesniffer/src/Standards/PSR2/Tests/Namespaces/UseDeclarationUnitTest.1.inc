<?php

namespace MyProject;

use;
use LastThing;
use SomethingElse;


// Comment here.

trait HelloWorld
{
    use Hello, World;
}

$var = new MyClass(
    function () use ($foo, $bar) {
        return true;
    }
);

class Foo
{
}

class Container extends Component implements IContainer
{
    use TContainer;
}

$x = $foo ? function ($foo) use /* comment */ ($bar): int {
    return 1;
} : $bar;

// Testcase must be on last line in the file.
