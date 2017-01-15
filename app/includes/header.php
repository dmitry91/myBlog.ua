<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>my blog</title>

    <!-- Bootstrap -->
    <link href="../../public/css/bootstrap.css" rel="stylesheet">
    <!-- my style -->
    <link href="../../public/css/index-style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a href="http://myblog.ua" class="logo navbar-brand" >
                <img class="img-logo"
                     src="public/img/logo.jpg">
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
                <span class="sr-only">Открыть навигацию</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse " id="responsive-menu">
            <ul class="nav navbar-nav ">
                <li><a id="main_pages_btn" href="/index.php" class="button-responsive">Главная</a> </li>
                <li><a id="message_btn" href="/messages.php" class="button-responsive">Сообшения</a> </li>
                <li><a id="photo_btn" href="/images.php" class="button-responsive">Фото</a> </li>
                <li><a id="videos_btn" href="/videos.php" class="button-responsive">Видео</a> </li>
            </ul>

            <div class="navbar-right">

                <ul class="nav navbar-nav">
                    <li style="margin-right: 10px">  <button type="submit" class="btn btn-default btn-lg"  >
                            <i class="glyphicon glyphicon-cog" ></i>
                        </button></li>
                    <li>  <button type="submit" class="btn btn-default btn-lg" onclick="location.href='?is_exit=1'">
                            <i class="glyphicon glyphicon-log-out"></i> Выход
                        </button>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>