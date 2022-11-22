<?php
session_start();
require_once('../../db_connect.php');
$email = $_POST['email'];
$password =sha1($_POST['password']);
$email_password_check_query = "SELECT COUNT(*) AS 'result' FROM admins WHERE email = '$email' AND
 password = '$password'";
$email_password_check_db = mysqli_query($db_connect,$email_password_check_query);
$email_password_check_result =  mysqli_fetch_assoc($email_password_check_db);
$name_query = "SELECT id,name FROM admins WHERE email = '$email'";
$name_query_db = mysqli_query($db_connect,$name_query);
$name_query_result =  mysqli_fetch_assoc($name_query_db);
$name = $name_query_result['name'];
$id = $name_query_result['id'];

if ($email_password_check_result['result']) {
    $_SESSION['auth_mail'] = $email;
    $_SESSION['auth_name'] = $name;
    $_SESSION['auth_id'] = $id; 
    header('location:../home.php');
}else{
    $_SESSION['login_error']= 'email password does not match';
    header('location: ./signin.php');
}

// $flag = false;
// if(!$email){
//     $flag = true;
//     $_SESSION['email_error'] = 'email faild requird';
// }
// if(!$password){
//     $flag = true;
//     $_SESSION['password_error'] = 'password faild requird';

//  }
// if ($email_password_check_result['result']){
//     echo 'thik ache';

// }else {
//     $flag = true;
//     $_SESSION['login_error']='wrong email password ';
    
//     }

     

//      if($flag) {
        
//         header('location: ./signin.php');
        
//     }
    

// if (true) {
//     # code...
// }

?>