<?php require_once (ROOT."/views/layouts/header_admin.php");?>

<?php require_once (ROOT."/views/layouts/login.php");?>
<form method="post">
    <label for="exampleFormControlInput1">Вопрос</label>
   <input class="form-control" type="text" name="vopros" value="<?=$vop['vopros']?>">
    <label for="exampleFormControlInput1">Варианты ответов</label>
        <?$i=0;
        foreach ($varotv as $itemVar):$i++;?>
            <?if($itemVar['prav']==1):?>
                <input type="checkbox" class="checkbox" checked>
                <?else:?>
                <input type="checkbox" class="checkbox">
            <?endif;?>
            <input class="form-control" type="text" name="id_var<?=$i?>" value="<?=$itemVar['id'];?>">
            <input class="form-control" type="text" name="var<?=$i?>" value="<?=$itemVar['otvet'];?>">
        <?endforeach;?>
    <div id="i"><?=$i?></div>
    <div id="eshevar"></div>

    <br>
    <a href = "#" onclick="addpole();">
        <i class="glyphicon glyphicon-plus-sign" aria-hidden="true"></i>
    </a>
</form>

<?php require_once (ROOT."/views/layouts/footer_admin.php");?>
