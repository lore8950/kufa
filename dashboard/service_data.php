<?php
require_once('../db_connect.php');
session_start();
$service_title = $_POST['service_title'];
$service_icon = $_POST['service_icon'];
$service_description = $_POST['service_description'];
$service_status = $_POST['service_status'];


$admin_query =   "INSERT INTO `services` (service_title, service_icon, 
service_description,service_status) VALUES ( '$service_title', '$service_icon', ' $service_description','$service_status')";
mysqli_query($db_connect,$admin_query);
$_SESSION['success'] = 'service added';
header('location:./service_add.php')

?>