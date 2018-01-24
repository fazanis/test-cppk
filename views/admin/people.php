<?php require_once (ROOT."/views/layouts/header_admin.php");?>
<body>
<?php require_once (ROOT."/views/layouts/login.php");?>
<br>

<p><a class="btn btn-primary btn-lg" id='onof' role="button" href="/admin">На главную</a><input class="btn btn-primary btn-lg" type="button" onclick="this.style='display: none'; print();" value="Распечатать карточку"/></p>
<p><b>ФИО:</b> <?=$people['fio']?></p>
<p><b>Дата:</b> <?=$people['data_prov']?></p>
<p><b>Всего вопросов: 30</b></p>
<?$r=0;
for($k=0;$k++<30;){
    if($people['otv'.$k]==1){$r++;}

}?>
<p><b>Из них правельных:</b> <?=$r?> - <?=round($r*100/30,0)?>%</p>
<p><b>Затрачено времени:</b> <?=$people['zatrat_vrem']?></p>



<?php require_once (ROOT."/views/layouts/footer_admin.php");?>
