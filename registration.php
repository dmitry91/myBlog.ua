<?php
    include("app/includes/database.php");
    include ("app/includes/functions.php");
?>

<?php
    if(isset($_POST['register']))
    {
        //verify that all fields are filled
        if (!empty($_POST['name_input']) && !empty($_POST['surname_input']) && !empty($_POST['birthday_input']) &&
            !empty($_POST['gender_input']) && !empty($_POST['city_input']) && !empty($_POST['about_user_input']) &&
            !empty($_POST['input_email']) &&!empty($_POST['input_password']))
        {
            $name = $_POST['name_input'];
            $surname = $_POST['surname_input'];
            $birthday = $_POST['birthday_input'];
            $gender = $_POST['gender_input'];
            $city = $_POST['city_input'];
            $about_user = $_POST['about_user_input'];
            $email = $_POST['input_email'];
            $password = $_POST['input_password'];

            $numrows = getUserOnEmail($email);
            if($numrows == 0)
            {
                //save user to database
                saveUser($name,$surname,$birthday,$gender,$city,$about_user,$email,$password);
            }
            else
            {
                echo "email иже используется";
            }
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

            <form class="form-horizontal" id="register" action="registration.php" method="post">
                <div class="form-group row">
                    <label class="control-label col-sm-2">Имя</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" placeholder="Введите имя" name="name_input" id="name_input">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-sm-2">Фамилия</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" placeholder="Введите фамилию" name="surname_input" id="surname_input">
                    </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-sm-2">Дата рождения</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="date" min="1900-01-01" max="2016-01-01" name="birthday_input" id="birthday_input">
                  </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-sm-2">Пол</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="gender_input" id="gender_input" >
                           <option>Мужской</option>
                           <option>Женский</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-sm-2">Город</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" placeholder="Введите город" name="city_input" id="city_input">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-sm-2">О себе</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="about_user_input" id="about_user_input" rows="3"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="control-label col-sm-2">Фото</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" accept="image/jpeg,image/png,image/gif" name="photo_InputFile" id="photo_InputFile" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">
                            Выберите фото для вашей страницы.
                        </small>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="control-label col-sm-2">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="input_email" id="input_email" aria-describedby="emailHelp" placeholder="Введите email">
                        <small id="emailHelp" class="form-text text-muted">Введите ваш email, он будет использован в качестве логина.</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-sm-2">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="input_password" id="input_password" placeholder="Введите пароль">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
                    <div class="offset-sm-2 col-sm-10"S>
                        <button type="submit" name="register" id="register" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </body>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="public/js/bootstrap.js "></script>
</body>
</html>