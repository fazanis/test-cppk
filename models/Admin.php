<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.01.2018
 * Time: 14:13
 */

class Admin
{
    public static function chekLogin($login)
    {
        if(strlen($login)>=2)
        {
            return true;
        }
        return false;

    }

    public static function chekPassword($password)
    {
        if(strlen($password)>=2)
        {
            return true;
        }
        return false;
    }

}