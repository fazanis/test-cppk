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

    <label>Вопрос</label>
    <textarea class="form-control" name="vopros" id="vopros"></textarea>
    <input class="form-control" name="otv[]" id="otv[]">
    <div class="form-group">
        <input type="button" class="btn btn-primary" name="submit" value="Записать тест" onclick="addtest()">
    </div>
</form>


<?php require_once (ROOT."/views/layouts/footer_admin.php");?>
