<link href="../templates/css/bootstrap.min.css" rel="stylesheet">
<div class="col-md-6 navbar-center" style="border: 1px solid red">
<ul>
<?foreach ($errors as $error):?>
    <li><?=$error?></li>
<?endforeach;?>
    <form class="navbar-form navbar-center" role="form" method="post" action="login/">
        <div class="form-group">
            <input type="text" name="login" placeholder="Email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Password" class="form-control">
        </div>
        <input type="submit" name='log' class="btn btn-success" value="Войти">
    </form>
</ul>
</div>
