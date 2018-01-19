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

        $select = "SELECT test_cat_litle.name as name, test_cat_litle.id as idpodcat,test_cat_litle.id_cat,test_cat.id,test_cat.name as namecat FROM test_cat_litle, test_cat  WHERE test_cat.id=test_cat_litle.id_cat  ORDER BY id DESC";

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

        $select = "";
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

}