<?php

class TestController extends SiteController
{
    public function actionIndex()
    {
        $name = "";
        $cat = '';
        $result = false;
        $groopa = Test::getGroup();
        if(isset($_POST['gotest'])){
            $name = $_POST['name'];
            $cat = $_POST['cat'];
            $cat2 = $_POST['cat2'];
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
                $cat2 = $_POST['cat2'];
                $result = Test::loadTest($cat2,$yaz);
                //$var = Test::loadVopros();
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
        echo $cat = $_POST['cat2'];
        $obshhid = $_POST['obshhid'];
        $vremproh = $_POST['vremproh'];
        $gruupa = Test::getGroup();

        for ($i = 1; $i<=30; $i++){
            $otv[]= $_POST['otvr'.$i];
        }
        //$otv = $otv[];

        $m = Test::saveTest($name,$obshhid,$gruupa,$cat,$otv,$vremproh);
        $title = 'Тест завершен';
        require_once(ROOT . '/views/test/end_test.php');
        return true;
    }

    public function actionAjaxCat()
    {

        $id = $_POST['code'];
        $litlecat = Test::LoadCat($id);

        foreach ($litlecat as $itlitlecat)
        {
            echo '<option value="'.$itlitlecat['id'].'">'.$itlitlecat['name'].'</option>';
        }

        return true;
    }
}