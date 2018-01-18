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

        $select = "SELECT * FROM test_cat_litle ORDER BY id DESC";

        $result = $db->prepare($select);
        $result->execute();
        $i = 0;
        $list = [];
        while ($row = $result->fetch()){
            $list[$i]['id'] = $row['id'];
            $list[$i]['id_cat'] = $row['id_cat'];
            $list[$i]['name'] = $row['name'];
            $i++;
        }

        return $list;
    }

    
}