<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.01.2018
 * Time: 17:11
 */

class UserController
{


    public function actionLogin()
    {
        $login = "";
        $password = "";
        $errors = false;
        if(isset($_POST['log'])){
            $login = $_POST['login'];
            $password = $_POST['password'];



            //валидация данных

            if(User::chekLogin($login)){

            }else{
                $errors[] = "Не верный формат логина";
            }

            if (User::chekPassword($password))
            {

            }else{
                $errors[] = "Не верный формат пароля";
            }

            $userId = User::chekUserData($login,$password);

            if($userId == false){
                $errors[] = "Не верные двнные для входа";
            }else{
                User::auth($userId);
                header("Location: /admin/");
            }
        }
        $title = "Повторная авторизация";
        require_once (ROOT."/views/layouts/loginw.php");
        return true;
    }

    public function actionLogout()
    {
        User::logout();
        return true;
    }
}