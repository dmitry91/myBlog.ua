<?php
session_start();
include("app/includes/database.php");
include ("app/includes/functions.php");
if (isset($_GET["is_exit"])) { //If you press the exit button
    if ($_GET["is_exit"] == 1) {
        $_SESSION = array(); //Clear the session
        session_destroy(); //destroy session
    }
}
if(!isset($_SESSION["session_email"]))
{
    //if the user is not authorized
    header("Location:login.php");
}else {
    //include html head
    include("app/includes/header.php");
?>
    <div class="container">
        <div class="row">
            <? include ("app/includes/userdata.php") ?>
            <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12">
                <div id="content" class="content_output">
                    <h4 class="text-center" >Сообщения</h4>
                    <p>hello!</p>
                </div>
            </div>
            <div class="col-lg-2 col-md-1 hidden-sm hidden-xs">
                <div style="height:800px" ></div>
            </div>
        </div>
    </div>

    <?php
    include("app/includes/footer.php");
}
?>