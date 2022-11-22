<?php

require_once('../db_connect.php');
session_start();
$name = $_POST['name'];
$id = $_SESSION['auth_id'];
// htmlspecialchars(trim())

$flag = false ;

if (isset($_POST['update'])) {
    $name = $_POST["name"];
    $phone_number = $_POST['phone_number'];
    if ($name) {
        $remove_name_space = str_replace(" ","",$name);
        if (!ctype_alpha($remove_name_space)) {
            $flag = true;
            $_SESSION['name_error'] = 'name num disco';
        }
    }else {
        $flag = true;
        $_SESSION['name_error'] = 'name daw nai';
        
    }
   if ($_FILES['profile_pic']['name'] !='') {
        $image_name = $_FILES['profile_pic']['name'];
     $explode_image_name = explode('.',$image_name);
     $extension = end($explode_image_name);
    $new_image_name = $id.'.'.$extension;
    $tem_path = $_FILES['profile_pic']['tmp_name'];
    $filepath = './uploads/profile/'.$new_image_name;
    move_uploaded_file($tem_path,$filepath);
    $profile_pic_update_query = "UPDATE admins SET profile_pic='$new_image_name' WHERE id='$id'";
    $profile_pic_update_db = mysqli_query($db_connect,$profile_pic_update_query);
    header('location:./profile.php');
   }
   if ($phone_number) {
    $phone_number_update_query = "UPDATE admins SET phone_number='$phone_number' WHERE id='$id'";
    $phone_number_update_db = mysqli_query($db_connect,$phone_number_update_query);
    header('location:./profile.php');
   }
}
if (isset($_POST['chang_password'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    if ($old_password) {
        $old_password_check_query = "SELECT password FROM admins WHERE id='$id'";
        $old_password_check_query_db = mysqli_query($db_connect,$old_password_check_query);
        $old_password_from_db = mysqli_fetch_assoc($old_password_check_query_db);
        if (sha1($old_password === $old_password_from_db['password'])) {
            if ($new_password) {
                if (preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$new_password)) {
                    if ($old_password === $new_password) {
                        $flag= true;
                        $_SESSION['new_password_error'] = 'new password old password same';
                    }else {
                        if ($confirm_password) {
                           if ($new_password === $confirm_password) {
                            $encode_pass = sha1($new_password);
                            $password_update_query = "UPDATE admins SET password='$encode_pass'  WHERE id='$id'";
                            $password_update_db = mysqli_query($db_connect,$password_update_query);
                            header('location:./profile.php');
                            echo 'ok';
                           }else {
                            $_SESSION['confirm_password_error'] = 'confirm password new password mile nai';
                           }
                        }else {
                            $flag = true;
                            $_SESSION['confirm_password_error'] = 'confirm password daw nai';
                        }
                    }
                }else {
                    $flag = true;
                    $_SESSION['new_password_error'] = 'new password strong na';
                }

            }else {
                $_SESSION['new_password_error'] = 'new password daw nai';
            }
        }else {
            $flag= true;
            $_SESSION['new_password_error'] = 'old password mile nai';

        }
        }else {
            $flag= true;
            $_SESSION['old_password_error'] = 'old password daw nai';
    }
}
if ($flag) {
    header('location:./profile.php');
}if (isset($_POST['update'])) 
 {
    $name_update_query = "UPDATE admins SET name='$name' WHERE id='$id'";
    $name_update_db = mysqli_query($db_connect,$name_update_query);
    $_SESSION['auth_name'] = $name;
    header('location:./profile.php');
}
?>