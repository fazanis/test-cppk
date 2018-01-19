<?require_once (ROOT."/views/layouts/header_admin.php");?>
<?require_once (ROOT."/views/layouts/login.php");?>
<br>
<a class="btn btn-primary btn-lg" id='onof' role="button" href="/admin/cat/add">Добавить категорию</a><br><br>
<table class="table">
    <tr><td><b>Название</b></td><td><b>Раздел</b></td><td><b>Редактирование</b></td></tr>
<?foreach ($catList as $cat):?>
    <tr><td><?=$cat['name']?></td><td><?=$cat['namecat']?></td><td><?=$cat['idpodcat']?></td></tr>
<?endforeach;?>
</table>

<?require_once (ROOT."/views/layouts/footer_admin.php");?>
