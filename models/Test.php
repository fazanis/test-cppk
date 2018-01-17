<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 11.01.2018
 * Time: 20:14
 */

class Test
{
    public static function getTypeTest()
    {
        $db = Db::getConnection();


        $sql = "SELECT * FROM test_cat";
        $result = $db->query($sql);
        $typeTest = [];
        $i = 0;
        while($row = $result->fetch()) {
            $typeTest[$i]['id'] = $row['id'];
            $typeTest[$i]['name'] = $row['name'];
            $i++;
        }

        return $typeTest;

    }

    public static function posDanTest(){
        echo $_POST['name'];
    }

    public static function chekName($name)
    {
        if(strlen($name)>=2){
            return true;
        }
        return false;
    }

    public static function chekCat($cat)
    {
        if($cat){
            return true;
        }
        return false;
    }

    public static function chekYaz($yaz)
    {
        if($yaz){
            return true;
        }
        return false;
    }

    public static function loadTest($cat,$yaz)
    {

        $db = Db::getConnection();

        $select = "SELECT * FROM test_vopros WHERE cat = :cat and yaz = :yaz";
        $result = $db->prepare($select);
        $result->bindParam(':cat', $cat, PDO::PARAM_INT);
        $result->bindParam(':yaz', $yaz, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        // Получение и возврат результатов
        $i = 1;
        $testList = array();

        while ($row = $result->fetch()) {
            $testList[$i]['id'] = $row['id'];
            $testList[$i]['vopros'] = $row['vopros'];
            for ($k=0; $k<=3; $k++) {
              $testList[$i]['otvet'] = Test::loadVopros($testList[$i]['id']);
            }
            $i++;
        }

        return $testList;

    }

    public static function loadVopros($id)
    {
        $db = Db::getConnection();
        $select = "SELECT * FROM test_var_otv WHERE id_vop = :id";
        $result = $db->prepare($select);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $i = 1;
        $vopList = array();
        while ($row = $result->fetch()) {
            $vopList[$i]['prav'] = $row['prav'];
            $vopList[$i]['otvet'] = $row['otvet'];
            $i++;
        }
        return $vopList;

    }

<<<<<<< HEAD
    public static function getDateTest()
    {
        $_monthsList = array(
            "1"=>"Январь","2"=>"Февраль","3"=>"Март",
            "4"=>"Апрель","5"=>"Май", "6"=>"Июнь",
            "7"=>"Июль","8"=>"Август","9"=>"Сентябрь",
            "10"=>"Октябрь","11"=>"Ноябрь","12"=>"Декабрь");
        $month = $_monthsList[date("n")];
        date_default_timezone_set('Asia/Omsk');
        $data = date('d '.$month.' Y');
        $h = date('H');
        $m = date('i');
        $s = date('s');
       return $data.' '.$h.':'.$m.':'.$s;
    }

    public static function saveTest()
    {

    }
=======

>>>>>>> origin/master

}