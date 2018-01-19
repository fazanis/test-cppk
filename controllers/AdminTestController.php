<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 19.01.2018
 * Time: 15:52
 */

class AdminTestController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();

        require_once (ROOT."/views/admin/test.php");
        return true;
    }

    public function actionEditTest()
    {

        self::checkAdmin();
        $cats = Admin::getCatAll();


        if (isset($_POST['submit'])){
            $cat = $_POST['cat2'];
            $yaz = $_POST['yaz'];

            $test = Admin::loadTest($cat,$yaz);

        }


        require_once (ROOT."/views/admin/addtest.php");
        return true;
    }

    public function actionEditTestOne($id)
    {
        self::checkAdmin();
        $title = "Редактирование Вопроса";

        $vop = Admin::GetTestOne($id);
        $varotv = Admin::GetVarOne($id);

        require_once (ROOT."/views/admin/editvop.php");
        return true;
    }

}