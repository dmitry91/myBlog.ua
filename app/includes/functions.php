<?php

    /**
     * Users found in the database
     * @param $email - user email (login)
     * @param $password - user password
     * @return array|null - return array data on the found user, or return null
     */
    function getUser($email, $password)
    {
        global $link;
        $sql="SELECT * FROM user WHERE email='".$email."' AND password='".$password."'";
        $result = mysqli_query($link,$sql);
        //return associative array
        return mysqli_fetch_assoc($result);
    }

    /**
     * Users found in the database
     * @param $email - user email (login)
     * @return array|null - return array data on the found user, or return null
     */
    function getUserOnEmail($email)
    {
        global $link;
        $sql="SELECT * FROM user WHERE email='".$email."' ";
        $result = mysqli_query($link,$sql);
        //return associative array
        return mysqli_fetch_assoc($result);
    }

    /**
     * Save new user to database
     * @param $name - user name
     * @param $surname - user surname
     * @param $birthday - user birthday
     * @param $gender - sex of a person
     * @param $city - city of residence
     * @param $about_user - story about itself
     * @param $email - user email address
     * @param $password - password to log in to the app
     * @return int|string - id saved user
     */
    function saveUser($name, $surname, $birthday, $gender, $city, $about_user, $email, $password)
    {
        global $link;
        $sql="INSERT INTO user (Name, Surname, Birthday, Gender, City, About_user, Email, Password) 
			VALUES('$name','$surname','$birthday','$gender','$city','$about_user','$email', '$password')";
        mysqli_query($link,$sql);
        //return id saved user
        return  mysqli_insert_id($link);
    }

    /**
     * Save image or photo to database
     * @param $user_id - user who saved image
     * @param $image - image for save
     * @param $image_name - image name
     * @return int|string
     */
    function savePhoto($user_id, $image, $image_name)
    {
        global $link;
        $sql = "INSERT INTO photo (User_id, Photo_byte, Name, Date) 
                  VALUES ('$user_id', '".addslashes($image)."', '".addslashes($image_name)."', NOW())";
        mysqli_query($link, $sql);
        //return id saved image
        return  mysqli_insert_id($link);
    }

    /**
     * Remove the image from the database
     * delete image in db
     * @param $id - id image in database
     */
    function deletePhoto($id)
    {
        global $link;
        $sql = "DELETE FROM photo WHERE id ='$id'";
        mysqli_query($link,$sql);
    }

    /**
     *
     * @param $user_id - user who saved img
     * @return bool|mysqli_result - return result query
     */
    function getPhoto($user_id)
    {
        global $link;
        $sql = "SELECT * FROM Photo WHERE User_id = $user_id";
        return mysqli_query($link, $sql);
    }
?>