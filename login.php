<?php
session_start();
include("app/includes/database.php");
include("app/includes/functions.php");
?>
<?php
    if(isset($_SESSION["session_email"])){
        header("location:index.php");
    }

    if(isset($_POST["login"])){
        if(!empty($_POST['email']) && !empty($_POST['password'])) {
            $user_email=$_POST['email'];
            $user_password=$_POST['password'];

            $numrows= getUser($user_email, $user_password);
            if($numrows!=0)
            {
                    $db_user_email = $numrows['Email'];
                    $db_password = $numrows['Password'];
                    $db_user_id = $numrows['id'];
                if($user_email == $db_user_email && $user_password == $db_password)
                {
                    $_SESSION['session_email']=$user_email;
                    $_SESSION['session_password']=$user_password;
                    $_SESSION['session_user_id']=$db_user_id;
                    /* Redirect browser */
                    header("Location:index.php");
                }
            } else {
                $message =  "Неправильное имя пользователя или пароль!";
            }

        } else {
            $message = "Все поля обязательны для заполнения";
        }
    }
    ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>my blog</title>

    <!-- Bootstrap -->
    <link href="public/css/bootstrap.css" rel="stylesheet">
    <!-- my style -->
    <link href="public/css/index-style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
        <div class="container">
              <div class="container navbar navbar-inverse">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="http://myblog.ua" class="navbar-brand"  >
                             <img style="max-width:100px; margin-top: -11px;"
                                 src="public/img/logo.jpg">
                            </a>        
                        </div>
                    </div>
              </div>
            <div class="login_message">
            <?php
            if ($message!=null)
                echo $message;
            else
                echo '<br>';
            ?>
            </div>
          <form class="form-horizontal" name="loginform" id="loginform" action="" method="POST">
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Email:</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" placeholder="Введите email">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="password">Пароль:</label>
              <div class="col-sm-10">          
                <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль">
              </div>
            </div>
            <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                  <label><input type="checkbox"> Запомнить меня</label>
                </div>
              </div>
            </div>
            <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" name="login" class="btn btn-primary" value="Войти" />
              </div>
            </div>
          </form>
    
          <form class="form-horizontal">
            <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-10">
                <button type="button" class="btn btn-primary" onclick="location.href='registration.php'">Регистрация</button>
              </div>
            </div>
          </form>
              
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="public/js/bootstrap.js "></script>
</body>
</html>
        
