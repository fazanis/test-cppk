<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.01.2018
 * Time: 17:09
 */

class User
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

    public static function chekUserData($login,$password)
    {
        $db = Db::getConnection();

        $select = "SELECT * FROM test_user WHERE login = :login and parol = :password";
        $result = $db->prepare($select);
        $result -> bindParam(':login',$login,PDO::PARAM_STR);
        $result -> bindParam(':password', $password, PDO::PARAM_STR);
        $result ->execute();

        $user = $result->fetch();
        if($user){
            return $user['id'];
        }

        return false;

    }

    public static function auth($id)
    {

        $_SESSION['user'] = $id;

    }

    public static function chekUser()
    {
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }

        header("Location: /admin/");
    }
    public static function isGest()
    {
        if(isset($_SESSION['user'])){
            return false;
        }
        return true;
    }

    public static function logout()
    {
        unset($_SESSION['user']);
        header("Location: /");
    }

    public static function getUserById($id)
    {
        if($id) {
            $db = Db::getConnection();;
            $select = "SELECT * FROM test_user WHERE id = :id";
            $result = $db->prepare($select);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }

    public static function checkLogged()
    {
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
        header("Location: /login");
    }
}