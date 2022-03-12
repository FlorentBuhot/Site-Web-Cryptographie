<?php

class SomethingActions
{

    public static function y()
    {
        self::z();
        static::z();
        SomethingActions::z();
        static::_x();
        self::a();
        static::a();
    }

    public static function z()
    {
    }

    private static function _x()
    {
    }

    protected static function a()
    {
        self::a(); // recursion, yay!
        self::z();
        static::y();
        self::b();
        echo self::$_myVar;
        echo static::$yourVar;
    }
}

abstract class AbstractEditingScreenModeWidgetActions extends AbstractEditingModeWidgetActions
{

    public static function setHelpScreenTitle()
    {
        // This is allowed because we are in an abstract class.
        $screens = self::getScreens('');

    }//end getScreens()

    public static function getScreens($systemName)
    {

    }//end setHelpScreenTitle()

}//end class
?>
