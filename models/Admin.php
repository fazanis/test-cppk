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
            $testList[$i]['cat'] = $row['cat'];
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
        return $result->fetch(PDO::FETCH_ASSOC);
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

     public static function EditOldVarOtv($idvop,$vopros,$idarr,$prav,$var2=NULL){
        $db = Db::getConnection();
        foreach ($idarr as $key =>$value){
          $select ="UPDATE test_var_otv SET otvet = :value, prav = 0 WHERE id = :id";
            $result = $db->prepare($select);
            $result->bindParam(":id",$key,PDO::PARAM_INT);
            $result->bindParam(':value',$value,PDO::PARAM_STR);
            $result->execute();
         }
         if(isset($var2)){
         foreach ($var2 as $val) {
           $sql = "INSERT INTO test_var_otv (id_vop,otvet, prav) VALUE (:id_vop,:otvet,0)";
           $rez = $db->prepare($sql);
           $rez->bindParam(':id_vop', $idvop, PDO::PARAM_INT);
           $rez->bindParam(':otvet', $val, PDO::PARAM_STR);
           $rez->execute();

         }}
         $select2 ="UPDATE test_var_otv SET prav = 1 WHERE id = :id";
         $result2 = $db->prepare($select2);
         $result2->bindParam(":id",$prav,PDO::PARAM_INT);
         $result2->execute();

         $select3 ="UPDATE test_vopros SET vopros =:vopros  WHERE id = :id";
         $result3 = $db->prepare($select3);
         $result3->bindParam(":id",$idvop,PDO::PARAM_INT);
         $result3->bindParam(":vopros",$vopros,PDO::PARAM_STR);
         $result3->execute();


     }

     public static function addNewVop($otvet,$id_vop,$prav)
     {
         $db = Db::getConnection();
         /*$sql = "INSERT INTO test_var_otv (otvet,id_vop,prav) AS (:otvet,:id_vop,:prav)";
         $rez = $db->prepare($sql);
         $rez->bindParam(':otvet',$otvet, PDO::PARAM_STR);
         $rez->bindParam(':id_vop',$id_vop, PDO::PARAM_INT);
         $rez->bindParam(':prav',$prav, PDO::PARAM_INT);
         $rez->execute();*/
         //return true;
         echo $otvet.' '.$id_vop.' '.$prav.'<br>';
     }

     public static function dellPole($id){
         $db = Db::getConnection();
         $select = "DELETE FROM test_var_otv WHERE id=:id";
         $result = $db->prepare($select);
         $result ->bindParam(':id',$id,PDO::PARAM_INT);
         $result->execute();

     }
     public static function SaveTest($cat,$yaz,$vopros,$prav,$text)
     {

         $db = Db::getConnection();
         $sql = "INSERT INTO test_vopros (cat,vopros,yaz) VALUE (:cat,:vopros,:yaz)";
         $rez = $db->prepare($sql);
         $rez->bindParam(':cat', $cat, PDO::PARAM_INT);
         $rez->bindParam(':vopros', $vopros, PDO::PARAM_STR);
         $rez->bindParam(':yaz', $yaz, PDO::PARAM_STR);
         $rez->execute();

         $id = Admin::endid();
         Admin::SaveVarOtv($id,$prav,$text);

     }

     public static function endid(){

         $db = Db::getConnection();
         $sql = "SELECT id FROM test_vopros ORDER BY id DESC";
         $rez = $db->prepare($sql);
         $rez->execute();
         $row = $rez->fetch();
         return $row['id'];
     }

    public static function SaveVarOtv($id,$prav,$text)
    {

        $db = Db::getConnection();

        $i=1;
        foreach ($text as $t) {
            $i++;
            $new_arr = array_diff($t, array(0, null));
            for ($k=1;$k<=count($new_arr);$k++) {
                if($prav == $k){$p = 1;
                    }else{$p = 0;}
                $sql = "INSERT INTO test_var_otv (id_vop,otvet,prav) VALUE (:id,:otvet,:p)";
                $rez = $db->prepare($sql);
                $rez->bindParam(':id', $id, PDO::PARAM_STR);
                $rez->bindParam(':otvet', $new_arr[$k], PDO::PARAM_STR);
                $rez->bindParam(':p', $p, PDO::PARAM_INT);

                $rez->execute();
            }

        }

    }

    public static function DellTest($id)
    {
        $db = Db::getConnection();
        $sql = "DELETE FROM test_vopros WHERE id=:id";
        $rez = $db->prepare($sql);
        $rez->bindParam(':id', $id, PDO::PARAM_STR);
        $rez->execute();
        Admin::DellVar($id);
    }

    public static function DellVar($id)
    {
        $db = Db::getConnection();

         $sql = "DELETE FROM test_var_otv WHERE id_vop=:id";
                $rez = $db->prepare($sql);
                $rez->bindParam(':id', $id, PDO::PARAM_STR);
                $rez->execute();

    }

    public static function SelectAllGorup()
    {
        $db = Db::getConnection();

        $sql = "SELECT * FROM test_gruppa";
        $rez = $db->prepare($sql);
        $rez->execute();
        $i=0;
        while ($row = $rez->fetch()){
            $list[$i]['id']= $row['id'];
            $list[$i]['name']= $row['name'];
            $list[$i]['date']= $row['date'];
            $list[$i]['podkl']= $row['podkl'];

           // $list= $row;
            $i++;
        }

        return $list;
    }

    public static function OnOf($id)
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM test_gruppa WHERE id = :id";
        $rez = $db->prepare($sql);
        $rez->bindParam(':id', $id, PDO::PARAM_INT);
        $rez->execute();
        $row = $rez->fetch();
        if ($row['podkl']==1){
            $sql2 = "UPDATE test_gruppa SET podkl=0 WHERE id = :id";
            $rez2 = $db->prepare($sql2);
            $rez2->bindParam(':id', $id, PDO::PARAM_INT);
            $rez2->execute();
        }
        if ($row['podkl']==0){
            $sql3 = "UPDATE test_gruppa SET podkl=0";
            $rez3 = $db->prepare($sql3);
            $rez3->bindParam(':id', $id, PDO::PARAM_INT);
            $rez3->execute();

            $sql2 = "UPDATE test_gruppa SET podkl=1 WHERE id = :id";
            $rez2 = $db->prepare($sql2);
            $rez2->bindParam(':id', $id, PDO::PARAM_INT);
            $rez2->execute();

        }

    }

    public static function GetRez($id)
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM test_otvet WHERE gruupa=:id";
        $rez = $db->prepare($sql);
        $rez->bindParam(':id', $id, PDO::PARAM_INT);
        $rez->execute();
        $i = 0;
        while ($row = $rez->fetch()) {
            $list[$i]['id'] = $row['id'];
            $list[$i]['gruupa'] = $row['gruupa'];
            $list[$i]['cat'] = $row['cat'];
            $list[$i]['fio'] = $row['fio'];

            for ($n = 1; $n <= 30; $n++) {
                $list[$i]['otv' . $n] = $row['otv' . $n];
            }

            $i++;
        }
        return $list;

    }

    public static function GetOnePeople($id)
    {
        $db = Db::getConnection();

        $sql = "SELECT * FROM test_otvet WHERE id = :id";
        $rez = $db->prepare($sql);
        $rez->bindParam(':id', $id, PDO::PARAM_INT);
        $rez->execute();

        $row = $rez->fetch(PDO::FETCH_ASSOC);

        return $row;
    }
}