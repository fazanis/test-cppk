<?require_once (ROOT."/views/layouts/header_admin.php");?>
<?require_once (ROOT."/views/layouts/login.php");?>
<br>
<a class="btn btn-primary btn-lg" id='onof' role="button" href="/admin/cat/add">Добавить категорию</a><br><br>
<table class="table">
    <tr><td>Название</td><td>Раздел</td><td>Редактирование</td></tr>
<?foreach ($catList as $cat):?>
    <tr><td><?=$cat['name']?></td><td><?=$cat['id_cat']?></td><td><?=$cat['id']?></td></tr>
<?endforeach;?>
</table>

<?require_once (ROOT."/views/layouts/footer_admin.php");?>
