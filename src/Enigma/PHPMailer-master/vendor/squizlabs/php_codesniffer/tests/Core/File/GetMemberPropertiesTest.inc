<?php

interface Base
{
    /* testInterfaceProperty */
    protected $anonymous;
}

class TestMemberProperties
{
    /* testVar */
    static $varE = true;

    /* testVarType */
    static ?string $varE = true;

    /* testPublic */
    static var $varF = true;

    /* testPublicType */
    public static $varH = true;

    /* testProtected */
    /**
     * Comment here.
     *
     * @phpcs:ignore Standard.Category.Sniff -- because
     * @var boolean
     */
    public static $varH = true;

    /* testProtectedType */
    public static ?string
        /* testGroupNullableType 1 */
        $x = null,
        /* testGroupNullableType 2 */
        $y = null;

    /* testPrivate */
    static protected $varI = true;

    /* testPrivateType */
    /**
     * Comment here.
     *
     * @phpcs:ignore Standard.Category.Sniff -- because
     * @var boolean
     */
    static protected $varI = true;

    /* testStatic */
    protected static
        /* testGroupProtectedStatic 1 */
        $varL,
        /* testGroupProtectedStatic 2 */
        $varM,
        /* testGroupProtectedStatic 3 */
        $varN;

    /* testStaticType */
    private static $varJ = true;

    /* testStaticVar */
    /**
     * Comment here.
     *
     * @phpcs:ignore Standard.Category.Sniff -- because
     * @var boolean
     */
    private static $varJ = true;

    /* testVarStatic */
    private static $varV = true;

    /* testPublicStatic */
    var $varA = true;

    /* testProtectedStatic */
    var ?int $varA = true;

    /* testPrivateStatic */
    public $varB = true;

    /* testNoPrefix */
$varK = true;

    /* testPublicStaticWithDocblock */
    public string $varB = true;

    /* testProtectedStaticWithDocblock */
    var static $varG = true;

    /* testPrivateStaticWithDocblock */
    public float
        /* testGroupType 1 */
        $x,
        /* testGroupType 2 */
        $y;
    public /* comment
         */
    ? //comment
    array $foo = [];
    public \MyNamespace\MyClass $foo;
    public \MyNamespace /** comment *\/ comment */
    \MyClass /* comment */
    \Foo $foo;
    protected $varC = true;


    /* testMethodParam */
    protected bool $varC = true;

    /* testPropertyAfterMethod */
    protected ?Folder\ClassName $nullableClassType2;

    /* testMessyNullableType */
    private $varD = true;

    /* testNamespaceType */
    private array $varD = true;

    /* testNullableNamespaceType 1 */
    private
        /* testGroupPrivate 1 */
        $varO = true,
        /* testGroupPrivate 2 */
        $varP = array('a' => 'a', 'b' => 'b'),
        /* testGroupPrivate 3 */
        $varQ = 'string',
        /* testGroupPrivate 4 */
        $varR = 123,
        /* testGroupPrivate 5 */
        $varS = ONE / self::THREE,
        /* testGroupPrivate 6 */
        $varT = [
        'a' => 'a',
        'b' => 'b'
    ],
        /* testGroupPrivate 7 */
        $varU = __DIR__ . "/base";

    /* testNullableNamespaceType 2 */
    private ?ClassName $nullableClassType;

    /* testMultilineNamespaceType */

    public function methodName($param)
    {
        /* testImportedGlobal */
        global $importedGlobal = true;

        /* testLocalVariable */
        $localVariable = true;
    }

}

/* testGlobalVariable */
$globalVariable = true;

/* testNotAVariable */
return;

$a = ($foo == $bar ? new stdClass() :
    new class() {
        /* testNestedProperty 1 */
        public $var = true;

        /* testNestedMethodParam 1 */
        public function something($var = false)
        {
        }
    }
);

function_call('param', new class {
    /* testNestedProperty 2 */
    public $year = 2017;

    /* testNestedMethodParam 2 */
    public function __construct($open, $post_id)
    {
    }
}, 10, 2);

class PHP8Mixed
{
    /* testPHP8MixedTypeHint */
    public static miXed $mixed;

    /* testPHP8MixedTypeHintNullable */
    // Intentional fatal error - nullability is not allowed with mixed, but that's not the concern of the method.
    private ?mixed $nullableMixed;
}

class NSOperatorInType
{
    /* testNamespaceOperatorTypeHint */
    public ?namespace\Name $prop;
}

$anon = class(){
    /* testPHP8UnionTypesSimple */
    public int | float $unionTypeSimple;

    /* testPHP8UnionTypesTwoClasses */
    private MyClassA | \Package\MyClassB $unionTypesTwoClasses;

    /* testPHP8UnionTypesAllBaseTypes */
    protected array|bool | int | float | NULL | object | string $unionTypesAllBaseTypes;

    /* testPHP8UnionTypesAllPseudoTypes */
    // Intentional fatal error - mixing types which cannot be combined, but that's not the concern of the method.
    var false | mixed | self | parent | iterable | Resource $unionTypesAllPseudoTypes;

    /* testPHP8UnionTypesIllegalTypes */
    // Intentional fatal error - types which are not allowed for properties, but that's not the concern of the method.
    public callable|static|void $unionTypesIllegalTypes;

    /* testPHP8UnionTypesNullable */
    // Intentional fatal error - nullability is not allowed with union types, but that's not the concern of the method.
    public ?int | float $unionTypesNullable;

    /* testPHP8PseudoTypeNull */
    // Intentional fatal error - null pseudotype is only allowed in union types, but that's not the concern of the method.
    public null $pseudoTypeNull;

    /* testPHP8PseudoTypeFalse */
    // Intentional fatal error - false pseudotype is only allowed in union types, but that's not the concern of the method.
    public false $pseudoTypeFalse;

    /* testPHP8PseudoTypeFalseAndBool */
    // Intentional fatal error - false pseudotype is not allowed in combination with bool, but that's not the concern of the method.
    public bool | FALSE $pseudoTypeFalseAndBool;

    /* testPHP8ObjectAndClass */
    // Intentional fatal error - object is not allowed in combination with class name, but that's not the concern of the method.
    public object | ClassName $objectAndClass;

    /* testPHP8PseudoTypeIterableAndArray */
    // Intentional fatal error - iterable pseudotype is not allowed in combination with array or Traversable, but that's not the concern of the method.
    public iterable | array|Traversable $pseudoTypeIterableAndArray;

    /* testPHP8DuplicateTypeInUnionWhitespaceAndComment */
    // Intentional fatal error - duplicate types are not allowed in union types, but that's not the concern of the method.
    public int | string | /*comment*/
INT $duplicateTypeInUnion;
};

$anon = class
{
    /* testPHP8PropertySingleAttribute */
    #[PropertyWithAttribute]
    public string $foo;

    /* testPHP8PropertyMultipleAttributes */
    #[PropertyWithAttribute(foo: 'bar'), MyAttribute]
    protected ?int|float $bar;

    /* testPHP8PropertyMultilineAttribute */
    #[
        PropertyWithAttribute(/* comment */
            'baz')
    ]
    private mixed $baz;
};
