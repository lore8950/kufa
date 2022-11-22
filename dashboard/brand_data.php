<?php
session_start();
require_once('../db_connect.php');
// store the input value in variable 
$brand_name = htmlspecialchars(trim($_POST["brand_name"])); 
$brand_status= htmlspecialchars($_POST["brand_status"]); 
$brand_image = $_FILES["brand_image"]["name"];
$user_id = $_SESSION["auth_id"];
$add_flag = false;
$update_flag = false;
//  input field validation 
if(isset($_POST["add_brand"])){
    if( !$brand_name  || !$brand_image || !$brand_status){
        $add_flag =true;
        $_SESSION["brand_error"] = "Input Field Is Required!";
    }else{
        $explod_file = explode(".", $brand_image); 
        $extension = end($explod_file);
        if($extension ==="png" || $extension ==="jpg" || $extension ==="jpeg"){
            if($_FILES["brand_image"]["size"] > 2000000){
                $add_flag =true;
                $_SESSION["brand_image_error"] = "File less then 2 mb!";
            }else {
                $new_image_name = $user_id."_".time().".".$extension;
                $file_tmp = $_FILES["brand_image"]["tmp_name"];
                $new_file_path = "../img/brand-img/".$new_image_name;
                move_uploaded_file($file_tmp,$new_file_path);
                $db_query = "INSERT INTO `brands`( `Name`, `Image`, `Status`) VALUES ('$brand_name','$new_image_name','$brand_status')";
                mysqli_query($db_connect, $db_query);
                $_SESSION["success_message"] = "Successfuly added brand";
                header('location:./add_brand.php');
            }
        }else{
            $add_flag = true;
            $_SESSION["brand_image_error"] = "Choose valid image!";
        }

    }
}


// update testimonial 
if(isset($_POST["update_brand"])){
    $brand_id = $_POST["brand_id"];
    if(!isset($_POST["brand_id"]) ||!$brand_name  || !$brand_image || !$brand_status){
        $update_flag =true;
        $_SESSION["brand_error"] = "Input Field Is Required!";
    }else{
        $explod_file = explode(".", $brand_image); 
        $extension = end($explod_file);
        if($extension ==="png" || $extension ==="jpg" || $extension ==="jpeg"){
            if($_FILES["brand_image"]["size"] > 2000000){
                $update_flag =true;
                $_SESSION["brand_image_error"] = "File less then 2 mb!";
            }else{
             // delete image 
            $load_image_query = "SELECT `Image` FROM brands WHERE ID=$brand_id";
            $db_image = mysqli_query($db_connect, $load_image_query);
            $db_image_result = mysqli_fetch_assoc($db_image);
            unlink("../img/brand-img/".$db_image_result['Image']);
            //update brand data
            $new_image_name = $user_id."_".time().".".$extension;
            $file_tmp = $_FILES["brand_image"]["tmp_name"];
            $new_file_path = "../img/brand-img/".$new_image_name;
            move_uploaded_file($file_tmp,$new_file_path);
            $db_query = "UPDATE brands SET Name='$brand_name', Image='$new_image_name', Status='$brand_status' WHERE ID=$brand_id";
            mysqli_query($db_connect, $db_query);
            header('location:./brand_list.php');
            }
            
        }else{
            $update_flag = true;
            $_SESSION["brand_image_error"] = "choose valid image!";
        }
    }

}


if($add_flag){
    header("location:./add_brand.php");
}
if($update_flag){
    $brand_id = $_POST["brand_id"];
    header("location:./brand_update.php?id=$brand_id");
}

?>