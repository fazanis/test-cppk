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
    <select class="form-control" name="yaz" id="yaz">
        <option></option>
        <option value="kz">Казахский</option>
        <option value="ru">Русский</option>
    </select><br>

    <label>Вопрос</label>
    <textarea class="form-control" name="vopros" id="vopros"></textarea><br>
    <label class="control-label col-xs-1">
        <input type="radio" name="prav" id="prav" value="1">
    </label>

    <div class="col-xs-11">
    <input class="form-control" name="otv[]" id="otv1">
    </div>
    <div id="eshevar"></div>
        <a href="#" onclick="addpoleadtest();" class="">
            <i class="glyphicon glyphicon-plus-sign btn" aria-hidden="true"></i>
        </a>
    <br><br><br><br>
    <input type="hidden" id="i" value="1">
    <div class="form-group">
        <input type="button" class="btn btn-primary" name="submit" value="Записать тест" onclick="addtest()">
    </div>
</form>
<div id="rez"></div>
<?php require_once (ROOT."/views/layouts/footer_admin.php");?>
