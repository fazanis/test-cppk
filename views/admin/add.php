<?require_once (ROOT."/views/layouts/header_admin.php");?>
<?require_once (ROOT."/views/layouts/login.php");?>
<form method="post" class="form-group">
    <div class="form-group">
        <label for="exampleFormControlInput1">Название категории</label>
    <input name="name" class="form-control" value="<?=$name?>">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Название категории</label>
    <select class="form-control" name="cat">
        <?print_r($cats);?>
        <?foreach ($cats as $cat):?>
            <option ><?=$cat['id']?><?=$cat['name']?></option>
        <?endforeach;?>
    </select>
    </div>
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="submit" value="Сохранить">
    </div>
</form>
<?require_once (ROOT."/views/layouts/footer_admin.php");?>
