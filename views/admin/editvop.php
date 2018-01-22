<?php require_once (ROOT."/views/layouts/header_admin.php");?>

<?php require_once (ROOT."/views/layouts/login.php");?>
<form method="post">
    <label for="exampleFormControlInput1">Вопрос</label>
   <input class="form-control" type="text" name="vopros" value="<?=$vop['vopros']?>">
    <label for="exampleFormControlInput1">Варианты ответов</label>
        <?$i=0;
        foreach ($varotv as $itemVar):$i++;?>
            <?if($itemVar['prav']==1):?>
                <input name="prav[]" type="radio" class="radio" value="<?=$itemVar['id'];?>" checked>
                <?else:?>
                <input type="radio" class="radio" name="prav[]" value="<?=$itemVar['id'];?>">
            <?endif;?>
            <input class="form-control" type="hidden" name="idvar[]" value="<?=$itemVar['id'];?>">
            <input class="form-control" type="text" name="var[]" value="<?=$itemVar['otvet'];?>">
            <a href = "#" onclick="delpole(<?=$itemVar['id'];?>);">
                <i class="glyphicon glyphicon-minus btn btn-default btn" style="color: #2b669a">Удалить поле</i>
            </a>
            <div id="vrem"></div>

        <?endforeach;?>
    <input type="hidden" id="i" value="<?=$i?>">
    <div id="eshevar"></div>

    <br>
    <a href = "#" onclick="addpole();">
        <button type="button" class="btn btn-default btn-lg" style="color: #2a6496">
        <i class="glyphicon glyphicon-plus-sign" aria-hidden="true">Добавить поле</i>
        </button>
    </a>

<br><br><br>
    <input type="submit" name="submit" class="btn btn-primary" value="Сохранить">
</form>

<?php require_once (ROOT."/views/layouts/footer_admin.php");?>
