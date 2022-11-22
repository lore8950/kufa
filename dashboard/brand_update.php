<?php
require_once('./includes/header.php');
require_once('../db_connect.php');
$id = $_GET["id"];
// brand select query  with id 
$db_brand_query = "SELECT * FROM brands  WHERE ID=$id;";
$db_brand_result = mysqli_query($db_connect, $db_brand_query);
$brand_query_convert_array = mysqli_fetch_assoc($db_brand_result); 
?>


<div class="app-content">  
    <div class="content-wrapper ">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Update Brand</h5>
                        </div>
                        <div class="card-body">
                            <div class="example-container">
                                <form action="./brand_data.php" method="post" enctype="multipart/form-data">
                                <input type="number" value="<?=$id ?>" name="brand_id" hidden >
                                    
                                <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                                        <input type="text" value="<?= $brand_query_convert_array["name"]?$brand_query_convert_array["name"]: "" ?>" name="brand_name" class="form-control"  aria-describedby="emailHelp">
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Brand Status</label>
                                        <select class="form-select" name="brand_status" aria-label="Default select example">
                                            <option
                                            
                                            <?= $brand_query_convert_array["status"] === "active" ? "selected" : "" ?>
                                            
                                            value="active">Active</option>
                                            <option 
                                            <?= $brand_query_convert_array["status"]=== "inactive"? "selected": ""?> 
                                            value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Upload Image</label>
                                        <input type="file" name="brand_image" class="form-control" aria-describedby="emailHelp">
                                    </div>
                                    <button type="submit" name="update_brand" class="btn btn-primary m-3">Update Brand</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once('./includes/header.php');
?>

