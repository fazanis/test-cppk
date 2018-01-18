<?php require_once (ROOT."/views/layouts/header_admin.php");?>
<body>
<?php require_once (ROOT."/views/layouts/login.php");?>
<div class="container">
Приветствуем Вас, <?=$user['login'];?><br>
    <a class="btn btn-primary btn-lg" id='onof' role="button" href="#">Включить</a>
</div>
<?php require_once (ROOT."/views/layouts/footer_admin.php");?>