<?php


// Valid class name (matching filename).
trait ClassFileNameUnitTest
{
}

trait classFileNameUnitTest
{
}

trait classfilenameunittest
{
}


// Invalid filename matching class name (case sensitive).

trait CLASSFILENAMEUNITTEST
{
}

trait CompletelyWrongClassName
{
}

trait ClassFileNameUnitTestExtra
{
}

trait ClassFileNameUnitTestInc
{
}

trait ExtraClassFileNameUnitTest
{
}

interface ClassFileNameUnitTest
{
}

interface classFileNameUnitTest
{
}

interface classfilenameunittest
{
}

interface CLASSFILENAMEUNITTEST
{
}


// Invalid non-filename matching class names.

interface CompletelyWrongClassName
{
}

interface ClassFileNameUnitTestExtra
{
}

interface ClassFileNameUnitTestInc
{
}

interface ExtraClassFileNameUnitTest
{
}

class ClassFileNameUnitTest
{
}

class classFileNameUnitTest
{
}

class classfilenameunittest
{
}

class CLASSFILENAMEUNITTEST
{
}

class CompletelyWrongClassName
{
}

class ClassFileNameUnitTestExtra
{
}

class ClassFileNameUnitTestInc
{
}

class ExtraClassFileNameUnitTest
{
}


?>