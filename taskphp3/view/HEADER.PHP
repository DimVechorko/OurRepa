<nav class="navbar navbar-default navbar-inverse" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">TaskPHP</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><h4><a href="#"></a></h4></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <p class="navbar-text">-</p>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    Войти через
                                    <div class="social-buttons">
                                        <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                        <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
                                    </div>
                                    или
                                    <form class="form" role="form" method="post" action="../controller/login.php" accept-charset="UTF-8" id="login-nav">
                                        <div class="form-group">
                                            <label class="sr-only" for="username">Имя</label>
                                            <input type="text" class="form-control" id="exampleInputEmail2" name="username" placeholder="Имя" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="password">Пароль</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Пароль" required>
                                            <div class="help-block text-right"><a href="">Забыли пароль ?</a></div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block">Войти</button>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Запомнить меня
                                            </label>
                                        </div>
                                    </form>
                                </div>
                                <div class="bottom text-center">
                                    Новенький ?
                                                    <a href="../registration.php" data-toggle="modal" data-target="#signUp"><b>Присоединяйся</b></a>

                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
        <!-- /.navbar-collapse -->
</nav>
        <!-- Button trigger modal -->
        <div class="container" id=addmsg>
            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Добавить сообщение
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Введите ваше сообщение</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form" role="form" method="get" action="../controller/insertmsg.php" accept-charset="UTF-8" id="login-nav">
                                    <div class="form-group">
                                        <textarea rows="10" cols="90" id="msg" class="form-control" name="msg"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-primary btn-block">Добавить</button>
                                   </div>
                                </form>
                            </div>
                        </div>
                            <div class="modal-footer">
                            </div>
                    </div>
                </div>
            </div>
        </div>
<div class="modal fade" id="signUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Введите данные для регистрации</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form" role="form" method="post" action="../controller/signup.php" accept-charset="UTF-8" id="login-nav">
                            <div class="form-group">
                                <label class="sr-only" for="username">Имя</label>
                                <input type="text" class="form-control" id="exampleInputEmail2" name="username" placeholder="Имя" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="password">Пароль</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Пароль" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="repassword">Повторите пароль</label>
                                <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Повторите пароль" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Зарегистрироваться</button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- /.container-fluid -->


