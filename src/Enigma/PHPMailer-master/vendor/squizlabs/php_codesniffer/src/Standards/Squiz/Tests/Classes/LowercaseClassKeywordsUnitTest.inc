<?php

trait MyTrait
{
}

interface MyInterface
{
}

abstract class MyClass extends MyClass
{
}

final class MyClass implements MyInterface
{
}

class MyClass
{
    const myConst = true;
    var $myVar = null;
}

$a = new class() {
};
