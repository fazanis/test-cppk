<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.01.2018
 * Time: 14:13
 */

class Admin
{
    public static function getCatList()
    {
        $db = Db::getConnection();

        $select = "SELECT test_cat_litle.name as name, test_cat_litle.id as idpodcat,test_cat_litle.id_cat,test_cat.id,test_cat.name as namecat FROM test_cat_litle, test_cat  WHERE test_cat.id=test_cat_litle.id_cat  ORDER BY idpodcat DESC";

        $result = $db->prepare($select);
        $result->execute();
        $i = 0;
        $list = [];
        while ($row = $result->fetch()){
            $list[$i]['idpodcat'] = $row['idpodcat'];
            $list[$i]['namecat'] = $row['namecat'];
            $list[$i]['name'] = $row['name'];
            $i++;
        }

        return $list;
    }

    public static function getCatAll()
    {
        $db = Db::getConnection();

        $select = "SELECT * FROM test_cat";
        $result = $db->prepare($select);
        $result ->execute();

        $i=0;
        $list = [];
        while($row = $result->fetch()){
            $list[$i]['id'] = $row['id'];
            $list[$i]['name'] = $row['name'];
            $i++;
        }
        return $list;
    }

    public static function AddCat($name,$id_cat)
    {
        $db = Db::getConnection();

        $insert = "INSERT INTO test_cat_litle (name, id_cat) VALUE (:name,:id_cat)";
        $result = $db->prepare($insert);
        $result->bindParam(':name',$name,PDO::PARAM_STR);
        $result->bindParam(':id_cat',$id_cat,PDO::PARAM_INT);
        $result->execute();
    }

    public static function getCat()
    {
        $db = Db::getConnection();

        $select = "SELECT * FROM test_cat";
        $result = $db->prepare($select);
        $result ->execute();

        $catlist = [];
        $i=0;
        while($row = $result ->fetch()){
            $catlist[$i]['id'] = $row['id'];
            $catlist[$i]['name'] = $row['name'];
            $i++;
        }
        return $catlist;
    }
    public static function getOneCat($id)
    {
        $db = Db::getConnection();
        $select = "SELECT * FROM test_cat_litle WHERE id = :id";
        $result = $db->prepare($select);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        $result->execute();
        $row = $result->fetch();

        return $row['name'];
    }

    public static function uploadCat($name,$cat,$id)
    {
        $db = Db::getConnection();

        $update = "UPDATE test_cat_litle SET name=:name, id_cat=:cat WHERE id=:id";
        $result = $db->prepare($update);
        $result ->bindParam(':name',$name,PDO::PARAM_STR);
        $result ->bindParam(':cat',$cat,PDO::PARAM_INT);
        $result ->bindParam(':id',$id,PDO::PARAM_INT);
        $result->execute();
    }

    public static function deleteCat($id)
    {
        $db = Db::getConnection();
        $select = "DELETE FROM test_cat_litle WHERE id=:id";
        $result = $db->prepare($select);
        $result ->bindParam(':id',$id,PDO::PARAM_INT);
        $result->execute();
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

    public static function GetTestOne($id)
    {
        $db = Db::getConnection();
        $select = "SELECT * FROM test_vopros WHERE id=:id";
        $result = $db->prepare($select);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        $result->execute();
        return $result->fetch();
    }
     public static function GetVarOne($id)
     {
         $db = Db::getConnection();
         $select = "SELECT * FROM test_var_otv WHERE id_vop = :id";
         $result = $db->prepare($select);
         $result->bindParam(':id',$id,PDO::PARAM_INT);
         $result->execute();

         $i=0;
         $list = [];
         while($row = $result->fetch()){
            $list[$i]['id'] = $row['id'];
            $list[$i]['otvet'] = $row['otvet'];
            $list[$i]['prav'] = $row['prav'];
            $i++;
         }
         return $list;
     }
}