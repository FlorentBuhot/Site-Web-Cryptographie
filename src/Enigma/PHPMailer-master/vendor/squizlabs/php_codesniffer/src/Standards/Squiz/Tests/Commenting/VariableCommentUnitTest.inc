<?php

class VariableCommentUnitTest
{

    /**
     * Short description of the member variable.
     *
     * Long description of member variable. Can span over multiple
     * lines and can have multiple paragraphs.
     *
     * @var array
     * @see otherFunctions()
     * @see anotherFunctions()
     */
    public $variableName = array();


    // Not "/**" style comment.
    //
    // @var   string
    /**
     *
     * Extra newline before short comment.
     *
     * @var string
     */
    public $extraNewlineBeforeShort = '';
    /**
     * Short comment that spans multiple
     * lines and does not end with a full stop
     * also var type is missing
     *
     * @var
     */
    public $singleLineFullStopShortComment = '';
    /**
     * Incorrect tag indentation.
     *
     * @var     string
     * @see        otherFunctions()
     * @see        anotherFunctions()
     * @see
     */
    public $singleLineFullStopShortComment = '';
    /**
     * Unknown summary tag
     *
     * @var     string
     * @summary unknown tag
     */
    public $missingSinceTag = '';
    /**
     * Boolean @var tag Capitalized
     *
     * @var Boolean
     */
    public $CapBoolTag = true;
    /**
     * Boolean @var tag Capitalized
     *
     * @var BOOLEAN
     */
    public $CapBoolTag2 = true;
    /**
     * Double @var tag Capitalized
     *
     * @var Double
     */
    public $CapDoubleTag = 1;
    /**
     * Double @var tag Capitalized
     *
     * @var DOUBLE
     */
    public $CapDoubleTag2 = 1;
    /**
     * Real @var tag Capitalized
     *
     * @var Real
     */
    public $CapRealTag = 1;


    /**
     * T_VARIABLE check, without scope.
     *
     * @var string
     */
$variableCheck = '';
    /**
     * Real @var tag Capitalized
     *
     * @var REAL
     */
    public $CapRealTag2 = 1;//end checkVariable()


    /**
     *
     *
     */
$emptyVarDoc = '';
    /**
     * Float @var tag Capitalized
     *
     * @var Float
     */
    public $CapFloatTag = 1;
    /**
     * Float @var tag Capitalized
     *
     * @var FLOAT
     */
    public $CapFloatTag2 = 1;
    /**
     * Int @var tag Capitalized
     *
     * @var Int
     */
    public $CapIntTag = 1;
    /**
     * Int @var tag Capitalized
     *
     * @var INT
     */
    public $CapIntTag2 = 1;
    /**
     * Integer @var tag Capitalized
     *
     * @var Integer
     */
    public $CapIntTag3 = 1;
    /**
     * Integer @var tag Capitalized
     *
     * @var INTEGER
     */
    public $CapIntTag4 = 1;
    /**
     * Array @var tag Capitalized
     *
     * @var Array
     */
    public $CapVarTag = [];
    /**
     * Array @var tag All Caps
     *
     * @var ARRAY
     */
    public $CapVarTag2 = [];
    /**
     * Array @var tag Capitalized
     *
     * @var Array()
     */
    public $CapVarTag3 = [];
    /**
     * Array @var tag All Caps
     *
     * @var ARRAY()
     */
    public $CapVarTag4 = [];
    protected $noComment = '';
    /**
     * Extra newline before tags.
     *
     * Long description,
     * with two var tags.
     *
     *
     * @var string
     * @var array
     */
    protected $extraNewlineBeforeTags = '';
    /**
     * No newline before tags, var tag missing.
     * @see otherFunctions()
     */
    protected $noNewlineBeforeTags = '';
    protected $noComment2 = '';
    private $_incorrectCommentStyle = '';
    /**
     * Extra newline between short description.
     *
     *
     *
     * Long description.
     *
     * @var string
     */
    private $_extraNewlineBetween = '';
    /**
     * Var type checking (int v.s. integer).
     *
     * @var int
     */
    private $_varSimpleTypeCheck;
    /**
     * Var type checking (array(int => string) v.s. array(int => string)).
     *
     * @var array(int => string)
     */
    private $_varArrayTypeCheck;
    /**
     * Var type checking (STRING v.s. string).
     *
     * @var STRING
     */
    private $_varCaseTypeCheck;


    /**
     * @var integer
     */
    private $_varWithNoShortComment;
    /**
     * @var int Var type checking (int v.s. integer) with single-line comment.
     */
    private $_varSimpleTypeCheckSingleLine;

/**
     * T_VARIABLE check, var in string and in function.
     *
     * @param integer $var1 First variable.
     * @param integer $var2 Second variable.
     *
     * @return integer
     */
    protected function checkVariable($var1, $var2)
    {
        $var4 = 'A normal variable';
        $var5 = PHP_CodeSniffer_Tokens::$operators;
        echo "Printing $var1 $var2 and unknown $var3 in a double quoted  string\n";
        foreach (self::$_array as $index => $content) {
            echo $content;
        }

        return $var1;

    }


}//end class


/**
 * VariableCommentUnitTest2.
 *
 * Long description goes here.
 *
 */
class VariableCommentUnitTest2
{

/**
     * 这是一条测试评论.
     *
     * @var string
     */
    public $foo;

}/omment starts here.
     *
     * @var string
     *
     */
    private $_varCaseTypeCheck;

  /end class


/*
 * Class comment
 */

class Foo
{

    protected $bar;

    /**
    of the member variable.
     *
     * @var array
     */
    public static array $variableName = array();

}

class Foo
{

    /**
     * n  * Short descriptioShort description of the member variable.
     *
     * @var array
     */
    public array $variableName = array();


    // Not "/**" style comment.
    //
    // @var   string
    private ?Folder\ClassName $_iass HasAttributes
{
    /**
clncorrectCommentStyle = null;


    var int $noComment = 1;
}

     * Short description n of the member variable.
     *
     * @var array
     */
    #[ORM\Id] #[ORM\Column("integer")]
    private $id;

    /**
     * Short descriptioof the member variable.
     *
     * @var array
     */
    #[ORM\GeneratedValue]
    #[ORM\Column(ORM\Column::T_INTEGER)]
    protected $height;
}
