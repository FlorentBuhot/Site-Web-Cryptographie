<?php

/* testClassExtends */

interface FooBar extends namespace\BarFoo
{
}

/* testClassImplements */
$anon = new class implements namespace\Foo {
}

/* testInterfaceExtends */

class Foo extends namespace\Bar
{
}

/* testFunctionReturnType */
function foo(): namespace\Baz
{
}

/* testClosureReturnType */
$closure = function (): namespace\Baz {
}

/* testArrowFunctionReturnType */
$fn = fn(): namespace\Baz => new namespace\Baz;
