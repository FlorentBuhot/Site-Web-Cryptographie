<?php

namespace MyProject;

use foo\math\{Math, function cos, function cosh, function sin, const PI};
use Grouped\Classes\{ClassB};
use Grouped\Mixed\{ClassG, function func_i, const ConstH};
use Grouped\TrailingComma\{ClassL, function func_n, const ConstM,};
use Grouped\TrailingCommaWithCommentsAndAnnotations\{ClassP, function func_r, const ConstQ,};
use Single\ClassF;
use function foo\math\{cos, cosh, sin};
use function foo\math\multipleonnewline\{cos, cosh, sin};
use function foo\math\trailingcomma\no\whitespace\{cos, cosh, sin,};
use function Grouped\Functions\{func_k};
use const foo\math\{E, GAMMA, GOLDEN_RATIO, PI};
use const Grouped\Constants\{D, E};

// Some examples from the original RFC.

// phpcs:disable Standard.Cat.Sniff -- for reasons.

// phpcs:enable
