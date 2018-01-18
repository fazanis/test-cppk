<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.01.2018
 * Time: 12:26
 */

class AdminController
{
    public function actionIndex()
    {
        $title = "Кабинет администратора";

        require_once (ROOT."/views/admin/index.php");
        return true;
    }

    public function actionLogin()
    {
        $login = "";
        $password = "";

        if(isset($_POST['log'])){
            $login = $_POST['login'];
            $password = $_POST['password'];

            $errors = false;

            //валидация данных

            if(Admin::chekLogin($login)){

            }else{
                $errors[] = "Не верный формат логина";
            }

            if (Admin::chekPassword($password))
            {

            }else{
                $errors[] = "Не верный формат пароля";
            }


        }

        require_once (ROOT."/views/layouts/loginw.php");
        return true;
    }
}