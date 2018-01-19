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
        $userId = User::chekUser();
        $title = "Кабинет администратора";
        $user = User::getUserById($userId);

        require_once (ROOT."/views/admin/index.php");
        return true;
    }

    public function actionCat()
    {
        $title = "Радактирование направлений";
        $catList = Admin::getCatList();
        require_once (ROOT."/views/admin/cat.php");
        return true;
    }

    public function actionAddcat()
    {
        $title = "Редатирование категорий";
        $cats = Admin::getCatList();
        $name = '';

        if (isset($_POST['submit'])){
            echo $name = $_POST['name'];
            echo $cat = $_POST['cat'];


            //header("Location: /admin/cat");
        }

        require_once (ROOT."/views/admin/add.php");
        return true;
    }
}