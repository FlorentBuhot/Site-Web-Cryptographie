<?php

class MyClass
{
    static $var = null;
    public $var = null;
    var $var = null;
$var = null;
public var $var = null;
    public $_var = null;
        public $foo, $bar, $var = null; // Parse error.
    public $foo,
        $bar,
        $var = null;
    protected $var = null;
    protected $_var = null;
    protected
        $foo,
        $bar;
    private $var = null;
    private $_var = null;
}

class foo
{
    const bar = <<<BAZ
qux
BAZ;
}

class ABC
{
    public static $propA;
    static public $propD;
    protected static $propB;
    static
    protected
        $propE;
    private static $propC;
    static private    /*comment*/
        $propF;
}

class MyClass
{
    static int $var = null;
    public string $var = null;
    var int $var = null;
    public $foo, $bar, $var = null;
    public ?string $foo,
        $bar,
        $var = null;
    protected ?Folder\ClassName $var = null;
    protected
    array
        $foo,
        $bar;
    private int $_var = null;
}

class MyClass
{
    public static int/*comment*/
        $var = null;
    public string $var = null;
    public int $var = null;
    protected ?Folder\ClassName
        $var = null;
}
