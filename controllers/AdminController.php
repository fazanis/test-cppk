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
        $catList = Admin::getCatList();
        require_once (ROOT."/views/admin/cat.php");
        return true;
    }
}