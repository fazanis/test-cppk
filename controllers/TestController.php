<?php

class TestController extends SiteController
{
    public function actionIndex()
    {
        $name = "";
        $cat = '';
        $result = false;
        if(isset($_POST['gotest'])){
            $name = $_POST['name'];
            $cat = $_POST['cat'];
            $yaz = $_POST['yaz'];
            $errors = false;

            if(Test::chekName($name)) {

            }else{
                $errors[] = "Не верно заполенно поле ФИО";
            }

            if(Test::chekCat($cat)){

            }else{
                $errors[] = "Не выбранно поле тип организации";
            }
            if(Test::chekYaz($yaz)){

            }else{
                $errors[] = "Не выбран язык тестирования";
            }

            if($errors == false){
                $title = "Начало тестирования";
                $result = Test::loadTest($cat,$yaz);
                $datenach = Test::getDateTest();
                //Test::loadVopros(1);

            }
        }
        $title = "Заполнеение данных тестируемого";
        $cat = Test::getTypeTest();
        require_once(ROOT . '/views/test/index.php');
        return true;
    }

    public function actionEndtest(){
        $name = $_POST['name'];
        $obshhid = $_POST['obshhid'];
        $gruupa = $_POST['gruupa'];
        $cat = $_POST['cat'];
        for ($i = 1; $i<=30; $i++){
            echo $otvr1 = $_POST['otvr1'];
        }

        require_once(ROOT . '/views/test/end_test.php');
        return true;
    }
}