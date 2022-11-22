<?php
session_start();
require_once('../db_connect.php');
// store the input value in variable 
$testimonial_name = htmlspecialchars(trim($_POST["testimonial_name"])); 
$testimonial_position = htmlspecialchars(trim($_POST["testimonial_position"])); 
$testimonial_status= htmlspecialchars($_POST["testimonial_status"]); 
$testimonial_message = htmlspecialchars(trim($_POST["testimonial_message"]));
$testimonial_image = $_FILES["testimonial_image"]["name"];
$user_id = $_SESSION["auth_id"];
$add_flag = false;
$update_flag = false;
//  input field validation 
if(isset($_POST["add_testimonial"])){
    if( !$testimonial_name  || !$testimonial_position || !$testimonial_status || !$testimonial_message || !$testimonial_image){
        $add_flag =true;
        $_SESSION["testimonial_error"] = "Input Field Is Required!";
    }else{
        $explod_file = explode(".", $testimonial_image); 
        $extension = end($explod_file);
        if($extension ==="png" || $extension ==="jpg" || $extension ==="jpeg"){
            if($_FILES["testimonial_image"]["size"] > 2000000){
                $add_flag =true;
                $_SESSION["testimonial_image_error"] = "File less then 2 mb!";
            }else {
                $new_image_name = $user_id."_".time().".".$extension;
                $file_tmp = $_FILES["testimonial_image"]["tmp_name"];
                $new_file_path = "../img/testimonial-img/".$new_image_name;
                move_uploaded_file($file_tmp,$new_file_path);
                $db_query = "INSERT INTO `testimonials` (Name, Image, Status, Message, Position) VALUES ('$testimonial_name', '$new_image_name', '$testimonial_status' ,'$testimonial_message', '$testimonial_position')";
                mysqli_query($db_connect, $db_query);
                $_SESSION["success_message"] = "Successfuly added testimonial";
                header('location:./testimonial_add.php');
            }
        }else{
            $add_flag = true;
            $_SESSION["testimonial_image_error"] = "Choose valid image!";
        }

    }
}


// update testimonial 
if(isset($_POST["update_testimonial"])){
    $testimonial_id = $_POST["testimonial_id"];
    if(!isset($_POST["testimonial_id"]) ||!$testimonial_name  || !$testimonial_position || !$testimonial_status || !$testimonial_message || !$testimonial_image){
        $update_flag =true;
        $_SESSION["testimonial_error"] = "Input Field Is Required!";
    }else{
        $explod_file = explode(".", $testimonial_image); 
        $extension = end($explod_file);
        if($extension ==="png" || $extension ==="jpg" || $extension ==="jpeg"){
            if($_FILES["testimonial_image"]["size"] > 2000000){
                $update_flag =true;
                $_SESSION["testimonial_image_error"] = "File less then 2 mb!";
            }else{
             // delete image 
            $load_image_query = "SELECT `Image` FROM testimonials WHERE ID=$testimonial_id";
            $db_image = mysqli_query($db_connect, $load_image_query);
            $db_image_result = mysqli_fetch_assoc($db_image);
            unlink("../dashboard/uploads/images.jpg".$db_image_result['Image']);
            //update testimonial data
            $new_image_name = $user_id."_".time().".".$extension;
            $file_tmp = $_FILES["testimonial_image"]["tmp_name"];
            $new_file_path = "../dashboard/uploads/images.jpg".$new_image_name;
            move_uploaded_file($file_tmp,$new_file_path);
            $db_query = "UPDATE testimonials SET Name='$testimonial_name', Position='$testimonial_position', Status='$testimonial_status', Message='$testimonial_message', Image='$new_image_name' WHERE ID=$testimonial_id";
            mysqli_query($db_connect, $db_query);
            header('location:./testimonial_list.php');
            }
            
        }else{
            $update_flag = true;
            $_SESSION["testimonial_image_error"] = "choose valid image!";
        }
    }

}


if($add_flag){
    header("location:./testimonial_add.php");
}
if($update_flag){
    header("location:./testimonial_list.php");
}






?>