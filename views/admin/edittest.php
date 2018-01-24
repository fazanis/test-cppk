<?php require_once (ROOT."/views/layouts/header_admin.php");?>

<?php require_once (ROOT."/views/layouts/login.php");?>

<a class="btn btn-primary btn-lg" id='onof' role="button" href="/admin/test">Нзат</a>
<a class="btn btn-primary btn-lg" id='onof' role="button" href="/admin/test/edit">Редактировать тесты</a><br><br>

<form method="post" class="form-group">
    <div class="form-group">
        <label for="exampleFormControlInput1">Название категории</label>
        <select class="form-control" name="cat" id="cat">
            <option></option>
            <?foreach ($cats as $cat):?>
                <option value="<?=$cat['id']?>"><?=$cat['name']?></option>
            <?endforeach;?>
        </select>
    </div>
    <label for="inputEmail">Выберите напрвление</label>

    <select class="form-control" name="cat2" id="cat2">
        <option></option>
        <? foreach ($litlecat as $itemlitlecat):?>
            <option value="<?=$itemlitlecat['id']?>"><?=$itemlitlecat['name']?></option>
        <? endforeach;?>
    </select>
    <label for="inputEmail">Выберите язык</label>
    <select class="form-control" name="yaz">
        <option></option>
        <option value="kz">Казахский</option>
        <option value="ru">Русский</option>
    </select><br>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="submit" value="Загрузить тесты">
    </div>
</form>

<?if(isset($test)):$i=0;?>
    <?foreach ($test as $ItemTest):$i++;?>
        <a href="/admin/test/edit/<?=$ItemTest['id']?>">
            <i class="glyphicon glyphicon-edit" aria-hidden="true"></i>
        </a>
        <a href="/admin/test/dell/<?=$ItemTest['id']?>">
            <i class="glyphicon glyphicon-remove-sign" aria-hidden="true"></i>
        </a> <?=$i?>)
        <?=$ItemTest['vopros']?><br>
        <?foreach ($ItemTest['otvet'] as $itemVopros):?>
            <p><?=$itemVopros['otvet']?> <?if($itemVopros['prav']==1){echo "<span style='color:green;'>Правильный</span>";}?></p>
        <?endforeach;?><br>
    <?endforeach;?>
<?endif;?>


<?php require_once (ROOT."/views/layouts/footer_admin.php");?>
