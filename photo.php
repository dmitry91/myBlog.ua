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
    //save photo to db
    //selected file
    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        //max file size
        $max_image_size		= 2000 * 1024; //=2 мб
        //file types
        $valid_types 		=  array("gif","jpg", "png", "jpeg");
        //get image
        $image = $_FILES['image']['tmp_name'];
        //get image name
        $image_name = $_FILES['image']['name'];
        //for valid file type
        $v_type = substr($image_name,1 + strrpos($image_name, "."));
        //validate image
        if (filesize($image) > $max_image_size) {
            $message = 'Error: File size > 2mb.';
        } elseif (!in_array($v_type, $valid_types)) {
            $message = 'Error: Invalid file type.';
        } else {
            //save photo
            savePhoto($_SESSION['session_user_id'],file_get_contents($image),$image_name);
        }
    }

    //pressed button delete image
    if (isset($_POST["del_btn"]))
    {
        //get id or delete img
        $id_del = $_POST["del_btn"];
        deletePhoto($id_del);
    }
    ?>
    <div class="container">
        <div class="row">
            <? include ("app/includes/userdata.php") ?>
            <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12">
                <div id="content" class="content_output">
                    <h4 class="text-center" >Фото</h4>
                    <form id="photo_form" enctype="multipart/form-data" method="post" action="photo.php">
                        <strong>Ваше изображение. Не более 2mb</strong>
                        <input accept="image/jpeg" type="file" name="image" id="image" >
                        <input type="submit" value="Сохранить" name="submit">
                    </form>
                    <br>
                    <form method="post" action="photo.php">
                        <?
                        $result= getPhoto($_SESSION['session_user_id']);
                        while($row = mysqli_fetch_assoc($result)): ?>
                            <b><? echo pathinfo($row["Name"], PATHINFO_FILENAME) ?></b><br>
                            <img class="user_avatar" src="data:image/jpeg;base64, <? echo base64_encode($row['Photo_byte']) ?> "/> <br>
                            <button type="submit" class="btn btn-default " name="del_btn" value="<? echo $row["id"]?>">удалить</button><br><br>
                        <? endwhile; ?>
                    </form>
                </div>
            </div>
            <div class="col-lg-2 col-md-1 hidden-sm hidden-xs">
                <div style="height:800px" ></div>
            </div>
        </div>
        <div class="row">
            <?if ($message!=null):?>
            <h4 class="text-center"><?$message?></h4>
            <? endif;?>
        </div>
    </div>

    <?php
    include("app/includes/footer.php");
}
?>


