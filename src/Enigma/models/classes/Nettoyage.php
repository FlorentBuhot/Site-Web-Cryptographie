<?php

class Nettoyage
{
    public static function clearString($val)
    {
        return filter_var($val, FILTER_SANITIZE_STRING);
    }

    public static function clearInt($val)
    {
        return filter_var($val, FILTER_VALIDATE_INT);
    }

    public static function clearEmail($val)
    {
        return filter_var($val, FILTER_SANITIZE_EMAIL);
    }

    public static function SupExt($file_name)
    {
        $trouve_moi = ".";
        $position = strpos($file_name, $trouve_moi);
        return substr($file_name, 0, $position);
    }

    public static function GetExt($file_name)
    {

    }
}