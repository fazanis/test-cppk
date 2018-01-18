<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="form-group">
            <a class="navbar-brand" href="/">«Центр переподготовки, повышения квалификации кадров» Павлодар</a>
            </div>
        </div>
        <class="navbar-collapse collapse">
        <?if(User::isGest()):?>
            <form class="navbar-form navbar-right" role="form" method="post" action="login/">
                <div class="form-group">
                    <input type="text" name="login" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
                <input type="submit" name='log' class="btn btn-success" value="Войти">
            </form>
        <?else:?>
            <a href = "/admin/">Перейти в админ панель</a> <a href="/logout/">Выход</a>
        <?endif;?>
        </div><!--/.navbar-collapse -->
    </div>
</div>