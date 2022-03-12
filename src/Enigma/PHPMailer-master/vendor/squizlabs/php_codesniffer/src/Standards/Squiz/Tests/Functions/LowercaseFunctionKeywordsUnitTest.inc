<?php
// Correct.
function Foo()
{
}

$a = function () {
};

abstract class Foo
{
    static function StaticFunction()
    {
    }

    final static public function FinalStaticPublicFunction()
    {
    }

    public function PublicFunction()
    {
    }

    protected function ProtectedFunction()
    {
    }

    abstract protected function AbstractProtectedFunction();

    private function PrivateFunction()
    {
    }
}

// Incorrect.
function Bar()
{
}

$a = function () {
};

abstract class Bar
{
    static function StaticFunction()
    {
    }

    final static public function FinalStaticPublicFunction()
    {
    }

    public function PublicFunction()
    {
    }

    protected function ProtectedFunction()
    {
    }

    abstract protected function AbstractProtectedFunction();

    private function PrivateFunction()
    {
    }
}

$a = fn($x) => $x;
