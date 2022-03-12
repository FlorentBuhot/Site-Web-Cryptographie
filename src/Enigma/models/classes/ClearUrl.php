<?php

class ClearUrl
{
    public static function delUrl()
    {
        $manager = new UserManager();
        $manager->clearUrl();
    }
}