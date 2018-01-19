<?require_once (ROOT."/views/layouts/header_admin.php");?>
<?require_once (ROOT."/views/layouts/login.php");?>
<a class="btn btn-primary btn-lg" id='onof' role="button" href="/admin/cat">Назат</a><br>
<form method="post" class="form-group">
    <div class="form-group">
        <label for="exampleFormControlInput1">Название категории</label>
    <input name="name" class="form-control" value="<?=$name?>">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Название направления</label>
    <select class="form-control" name="cat">
        <option></option>
        <?foreach ($cats as $cat):?>
            <option value="<?=$cat['id']?>"><?=$cat['name']?></option>
        <?endforeach;?>
    </select>
    </div>
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="submit" value="Сохранить">
    </div>
</form>
<?require_once (ROOT."/views/layouts/footer_admin.php");?>
