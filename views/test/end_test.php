<?php require_once (ROOT."/views/layouts/header.php");?>
<div class="container">

								<center><h1>Поздравляем: <?=$name?></h1>
<h1>Правильных ответов: <?=$obshhid?> из 30 - <b><?echo round($obshhid*100/30, 0);?>%</b>  </h1>
<h1>Дата прохождения теста: <?=date('d.m.Y')?></h1>
<h1>Время затраченое на тестирование: <?echo $zatrat_vrem="00:".date('i:s',strtotime('00:15:00')-strtotime($_POST['vremproh']))?></h1>


</center>


<?
/*$result = mysql_query ("INSERT INTO test_otvet (gruupa,cat,fio,otv1,otv2,otv3,otv4,otv5,otv6,otv7,otv8,otv9
								,otv10,otv11,otv12,otv13,otv14,otv15,otv16,otv17,otv18,otv19,otv20,otv21,otv22,otv23,otv24,otv25,otv26,otv27
								,otv28,otv29,otv30,	zatrat_vrem,data_prov)
														VALUES
													  ('".$_POST['gruupa']."','".$_POST['cat']."','".$_POST['name']."',
													  '".$_POST['otvr1']."','".$_POST['otvr2']."','".$_POST['otvr3']."','".$_POST['otvr4']."',
													  '".$_POST['otvr5']."','".$_POST['otvr6']."','".$_POST['otvr7']."','".$_POST['otvr8']."',
													  '".$_POST['otvr9']."','".$_POST['otvr10']."','".$_POST['otvr11']."','".$_POST['otvr12']."',
													  '".$_POST['otvr13']."','".$_POST['otvr14']."','".$_POST['otvr15']."','".$_POST['otvr16']."',
													  '".$_POST['otvr17']."','".$_POST['otvr18']."','".$_POST['otvr19']."','".$_POST['otvr20']."',
													  '".$_POST['otvr21']."','".$_POST['otvr22']."','".$_POST['otvr23']."','".$_POST['otvr24']."',
													  '".$_POST['otvr25']."','".$_POST['otvr26']."','".$_POST['otvr27']."','".$_POST['otvr28']."',
													  '".$_POST['otvr29']."','".$_POST['otvr30']."','".$zatrat_vrem."','".date('d.m.Y')."')");*/


?>


<?php require_once (ROOT."/views/layouts/footer.php");?>