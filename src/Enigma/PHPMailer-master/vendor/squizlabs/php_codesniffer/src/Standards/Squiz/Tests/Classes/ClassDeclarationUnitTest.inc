<?php


interface MyInterface
{

}

class ClassDeclaration
{

}

abstract class CorrectClassDeclarationWithExtends extends correctClassDeclaration
{

}


// Incorrect placement of opening/closing braces, including indent.

final  class CorrectClassDeclarationWithImplements implements correctClassDeclaration
{

}

class IncorrectBracePlacement
{
}

class IncorrectBracePlacementWithExtends extends correctClassDeclaration
{
}

class IncorrectBracePlacementWithImplements implements correctClassDeclaration
{
}//end class


// Incorrect code placement for opening/closing brace.

class IncorrectIndentedClass
{

}//end class

class IncorrectCodeAfterOpeningBrace
{
echo phpinfo();

}

echo phpinfo();

class IncorrectCodeAfterClosingBrace
{

}

class IncorrectCodeBeforeClosingBrace
{

echo phpinfo();
}

class IncorrectIndentedClass
{

}//end class

class ClassOne implements ClassTwo, ClassThree
{
}//end class

class ClassOne implements ClassFour, ClassFive, ClassSix
{
}

class CorrectClassDeclarationWithExtends extends correctClassDeclaration

{

}//end class

class CorrectClassDeclarationWithExtends extends correctClassDeclaration
{

}//end class

class   CorrectClassDeclaration
{

} // phpcs:enable Standard.Category.Sniff

class CorrectClassDeclaration extends CorrectClassDeclaration2 implements ICorrectClassDeclaration
{

}

class File implements \Zend_Auth_Storage_Interface, \Zend_Auth_Storage, \Zend_Foo
{
}

?>

<?php

class MyClass2
{
    var $x;
}


/**
 * No error.
 */
function example()
{
}

class CorrectClassDeclaration
{

}//end class

// Class comment here, but wrong comment type.
class testing
{
} /* end class */
echo 'hi';

class IncorrectCodeBeforeClosingBrace
{

echo phpinfo();
}
