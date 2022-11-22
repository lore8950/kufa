<?php
session_start();
require_once('../../db_connect.php');
$name =htmlspecialchars(trim($_POST['user_name']));
$email = htmlspecialchars(trim($_POST['user_email']));
$password = htmlspecialchars(trim($_POST['user_password']));
$user_confirm_password = htmlspecialchars(trim($_POST['user_confirm_password']));

// email check database
$email_check_query = "SELECT COUNT(*) AS 'result' FROM admins WHERE email = '$email'";
$email_check_db = mysqli_query($db_connect,$email_check_query);
$email_check_result = mysqli_fetch_assoc($email_check_db);

$flag = false;

if ($name) {
    $remove_name_space = str_replace(" ","",$name);
    if (ctype_alpha($remove_name_space)) {
        $_SESSION["old_name"]= $name;
    }else {
        $flag = true;
        $_SESSION['name_error'] = 'name given number';
        
    }
}else{
    $flag = true;
    $_SESSION['name_error'] = 'name not given';
}
if ($email) { 
        if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
            if ($email_check_result['result']) {
                $flag = true;
                $_SESSION['email_error'] = 'have email';
            }
            $_SESSION["old_email"]= $email;
         }else {
            $flag = true;
            $_SESSION['email_error'] = 'email not valid';
            
        }
}else{
    $flag = true;
     $_SESSION['email_error'] = 'email not provided';
}

if ($password) {
    if (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password)) {
        $flag = true;
     $_SESSION['password_error'] = 'password is not correct';
      }

}else {
    $flag = true;
     $_SESSION['password_error'] = 'password not provided';
}
if ($user_confirm_password) {
    if (!($password === $user_confirm_password)) {
        $flag = 'true';
    $_SESSION['confirm_password_error'] = 'confirm_password does not match';
        
    }
}else{
    $flag = 'true';
    $_SESSION['confirm_password_error'] = 'confirm_password not given';
}

if ($flag) {
    header('location:./signup.php');
}else {
    // $salt = rand(100,999);
    $password_encode = sha1($password);
   $admin_query =   "INSERT INTO `admins` (name, email, password) VALUES ( '$name', '$email', ' $password_encode')";
   mysqli_query($db_connect,$admin_query);
   $_SESSION['signin_status'] = "hello $name";
   header('location: ./signin.php');

}