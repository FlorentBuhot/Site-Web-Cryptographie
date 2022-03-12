<?php

use Vendor\Package\{ClassB};
use function Another\Vendor\functionD;
use function Vendor\Package\{functionA, functionB, functionC};
use const Another\Vendor\CONSTANT_D;
use const Vendor\Package\{CONSTANT_A, CONSTANT_B, CONSTANT_C};

class ClassName3
{
    use \FirstTrait;
    use SecondTrait;
    use ThirdTrait;
}

$foo = function () use ($bar) {
};
