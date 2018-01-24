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

    public static function Gruppa()
    {
        $db = Db::getConnection();
        $select = "SELECT * FROM test_gruppa WHERE podkl=1";
        $result = $db->prepare($select);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $row = $result->fetch();

        return $row['id'];
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

    public static function saveTest($name,$obshhid,$gruupa,$cat,$otv,$vremproh)
    {
        $db = Db::getConnection();
        $i = 0;

        foreach ($otv as $otvet) {
            $i++;
            if($otvet==''){$otvet = 0;}
            $endotvet[] = $otvet;
            $otvper[] = 'otv'.$i;
        }
        $endotvet_s = implode(',',$endotvet);
        $otvetper_s = implode(',',$otvper);

       $zatrat_vrem="00:".date('i:s',strtotime('00:15:00')-strtotime($vremproh));
       $sql = 'INSERT INTO test_otvet (`gruupa`,`cat`,`fio`,zatrat_vrem,data_prov,'.$otvetper_s.') VALUES("'.$gruupa.'","'.$cat.'","'.$name.'","'.$zatrat_vrem.'","'.date('d.m.Y').'",'.$endotvet_s.')';
        $result = $db->prepare($sql);
        return $result->execute();
    }

    public static function LoadCat($id){
        $db = Db::getConnection();
        $select = "SELECT * FROM test_cat_litle WHERE id_cat = :id";
        $result = $db->prepare($select);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        $i = 1;
        $vopList = array();
        while ($row = $result->fetch()) {
            $vopList[$i]['id'] = $row['id'];
            $vopList[$i]['name'] = $row['name'];
            $i++;
        }
        return $vopList;
    }

    public static function getGroup()
    {
        $db = Db::getConnection();

        $select = "SELECT * FROM test_gruppa WHERE podkl=1";
        $result = $db->prepare($select);
        $result ->execute();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row['id'];



    }

}