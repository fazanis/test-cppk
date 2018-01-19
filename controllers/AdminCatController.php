<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 19.01.2018
 * Time: 15:48
 */

class AdminCatController extends AdminBase
{
    public function actionCat()
    {
        self::checkAdmin();

        $title = "Радактирование направлений";
        $catList = Admin::getCatList();
        require_once (ROOT."/views/admin/cat.php");
        return true;
    }

    public function actionAddcat()
    {
        self::checkAdmin();

        $title = "Редатирование категорий";
        $cats = Admin::getCatAll();
        $name = '';

        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $cat = $_POST['cat'];
            $m = Admin::AddCat($name,$cat);
            header("Location: /admin/cat");
        }

        require_once (ROOT."/views/admin/add.php");
        return true;
    }

    public function actionEditCat($id)
    {
        self::checkAdmin();

        $title = "Редактирование категории";
        $name = Admin::getOneCat($id);
        $cats = Admin::getCatAll();
        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $cat = $_POST['cat'];
            Admin::uploadCat($name,$cat,$id);
            header("Location: /admin/cat");
        }
        require_once (ROOT."/views/admin/add.php");
        return true;
    }

    public function actionDeleteCat($id)
    {
        self::checkAdmin();

        Admin::deleteCat($id);
        header("Location: /admin/cat");
        return true;
    }
}