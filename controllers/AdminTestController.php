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
        $title = "Работа с тестами";
        require_once (ROOT."/views/admin/test.php");
        return true;
    }

    public function actionEditTest()
    {

        self::checkAdmin();
        $cats = Admin::getCatAll();

        if (isset($_SESSION['cat']) and isset($_SESSION['yaz'])){
            $cat = $_SESSION['cat'];
            $yaz = $_SESSION['yaz'];
            $test = Admin::loadTest($cat,$yaz);
        }

        if (isset($_POST['submit'])){
            $cat = $_POST['cat2'];
            $yaz = $_POST['yaz'];
            $_SESSION['cat'] = $cat;
            $_SESSION['yaz'] = $yaz;
                $test = Admin::loadTest($cat,$yaz);
        }

        require_once (ROOT."/views/admin/edittest.php");
        return true;
    }

    public function actionEditTestOne($id)
    {
        self::checkAdmin();
        $title = "Редактирование Вопроса";

        $vop = Admin::GetTestOne($id);
        $varotv = Admin::GetVarOne($id);

        if(isset($_POST['submit'])){
            $prav=array_shift($_POST['prav']);
            $var =$_POST['var'];
            $idvar = $_POST['idvar'];
            $oldvar = array_combine($idvar,$var);
            $vopros = $_POST['vopros'];

            if(isset($_POST['var2'])){

            $var2 = $_POST['var2'];
                Admin::EditOldVarOtv($id,$vopros,$oldvar,$prav,$var2);
            }else{
                Admin::EditOldVarOtv($id, $vopros, $oldvar, $prav);

            }



            header("Location: test/edit");
        }
        require_once (ROOT."/views/admin/editvop.php");
        return true;
    }

    public function actionAjaxPole(){

        $id = $_POST['code'];
        Admin::dellPole($id);
    }

    public function actionAddTest()
    {

        self::checkAdmin();
        $cats = Admin::getCatAll();
        //echo Admin::SaveTest('1','2','3','4');


        require_once (ROOT."/views/admin/addtest.php");
        return true;
    }

    public function actionAjaxAddTest()
    {
        self::checkAdmin();
        $t = $_POST['t'];
        $cat = $_POST['cat'];
        $yaz = $_POST['yaz'];
        $vopros = $_POST['vopros'];
        $prav = $_POST['prav'];
        Admin::SaveTest($cat,$yaz,$vopros,$prav,$t);

    }

    public function actionDellTest($id)
    {
        self::checkAdmin();
        Admin::DellTest($id);
        header("Location: /admin/test/edit");
    }

    public function actionAjaxOnOf()
    {
        self::checkAdmin();
        $id = $_POST['code'];
        Admin::OnOf($id);

    }
}