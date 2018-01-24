<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.01.2018
 * Time: 12:26
 */

class AdminController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();

        $userId = User::chekUser();
        $title = "Кабинет администратора";
        $user = User::getUserById($userId);
        $grouplist = Admin::SelectAllGorup();
        require_once (ROOT."/views/admin/index.php");
        return true;
    }

    public function actionRezultat($id)
    {
        self::checkAdmin();

        $rez = Admin::GetRez($id);
        $title="Результаты тестирования";
        require_once (ROOT."/views/admin/rezultat.php");
        return true;
    }

    public function actionPeople($id)
    {
        $people =Admin::GetOnePeople($id);
        require_once (ROOT."/views/admin/people.php");
        return true;
    }


}