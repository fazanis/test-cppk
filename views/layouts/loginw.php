<?php require_once (ROOT."/views/layouts/header_admin.php");?>
<?php require_once (ROOT."/views/layouts/login.php");?>

<div class="col-md-12 navbar-center">
    <?if(isset($errors) && is_array($errors)): ?>
<ul class="" style="text-align: center; color: red; ">
<?foreach ($errors as $error):?>
    <li style="list-style-type: none;"><?=$error?></li>
<?endforeach;?>
</ul>
    <?endif;?>
<div style="width: 180px; margin: 0 auto;">
    <form class="navbar-form navbar-center" role="form" method="post" action="/login">
        <div class="form-group">
            <input type="text" name="login" placeholder="Email" class="form-control">
        </div><br>
        <div class="form-group">
            <input type="password" name="password" placeholder="Password" class="form-control">
        </div><br>
        <input type="submit" name='log' class="btn btn-success" value="Войти">
    </form>
</div>
 </div>

<?php require_once (ROOT."/views/layouts/footer_admin.php");?>