<?php
require_once('../db_connect.php');
$id =$_GET['id'];
$delete_brand_query = "DELETE FROM brands WHERE id=$id";
$delete_brand_query_db = mysqli_query($db_connect, $delete_brand_query);
                                                
header('location:./add_brand.php');

?>