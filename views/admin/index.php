<?php require_once (ROOT."/views/layouts/header_admin.php");?>
<body>
<?php require_once (ROOT."/views/layouts/login.php");?>
<div class="container">
Приветствуем Вас, <?=$user['login'];?><br>
    <a class="btn btn-primary btn-lg" id='onof' role="button" href="/admin/cat">Катигории тестов</a>
    <a class="btn btn-primary btn-lg" id='onof' role="button" href="/admin/test">Тесты</a>
</div>
    <table class="table table-cell-padding">
        <tr><td>Название группы</td><td>Дата проведения</td><td>Настройки</td></tr>
        <?foreach ($grouplist as $group):?>
            <tr>
                <td>
                    <a href="/admin/rezultat/<?=$group['id']?>"><?=$group['name']?></a>
                </td><td><?=$group['date']?></td>
                <td>
                    <?if($group['podkl']!=1):?>
                        <a class="btn btn-primary btn-lg" id='onof' role="button" onclick='onof("<?=$group['id']?>")' href="#">Включить</a>
                    <?else:?>
                        <a class="btn btn-primary2 btn-lg" id='onof' role="button" onclick='onof("<?=$group['id']?>")' href="#">Отключить</a>
                    <?endif;?>
                </td>
            </tr>
        <?endforeach;?>
    </table>
<?php require_once (ROOT."/views/layouts/footer_admin.php");?>