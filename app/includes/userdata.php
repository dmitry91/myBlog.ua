<?
$email = $_SESSION['session_email'];
$password = $_SESSION['session_password'];
$user = getUser($email, $password);
?>
<div class="col-lg-2 col-md-1 hidden-sm hidden-xs">
    <div style="height:800px" ></div>
</div>
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div>
        <p>
            <strong style="font-size:12pt">
                <? echo $user['Name'];?>
                <? echo $user['Surname'];?>
            </strong>
        </p>
    </div>
    <div class="user_photo">
        <img class="user_avatar" src="../../public/img/no_photo.jpg" alt="no photo" />
    </div>
    <div style="overflow: auto; margin-bottom:8px">
        <div class="border_btm">
            <div>дата рождения:  <? echo $user['Birthday'];?></div>
            <div>пол:  <? echo $user['Gender'];?></div>
            <div>город:  <? echo $user['City'];?></div>
        </div>
        <p>
            <strong>
                О себе:
            </strong>
        </p>
        <div class="border_btm">
            <? echo $user['About_user'];?>
        </div>

    </div>
</div>