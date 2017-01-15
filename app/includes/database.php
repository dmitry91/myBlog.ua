<?php
//подключаемся с БД
/*
 * user-'root'
 * password-''
 * base-'my_blog'
 */
 $link = mysqli_connect('localhost','root','','my_blog');

if(mysqli_connect_errno())
{
    echo mysqli_connect_errno().' ошибка подключения БД '.mysqli_connect_error();
    exit();
}
?>