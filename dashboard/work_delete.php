<?php
require_once('../db_connect.php');
$id =$_GET['id'];
$work_delete_query = "DELETE FROM works WHERE id=$id";
$work_delete_query_db = mysqli_query($db_connect, $work_delete_query);
                                                
header('location:./work_list.php');

?>