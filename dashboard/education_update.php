<?php
require_once('./includes/header.php');
// session_start();
$education_id = $_GET["id"];
// education select query  with id 
$db_education_query = "SELECT * FROM educations  WHERE ID=$education_id;";
$db_education_result = mysqli_query($db_connect, $db_education_query);
$education_query_convert_array = mysqli_fetch_assoc($db_education_result); 
?>


<div class="app-content">  
    <div class="content-wrapper ">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Add Education</h5>
                        </div>
                        <div class="card-body">
                            <div class="example-container">
                                <form action="./education_data.php" method="post">
                                    <input type="number" hidden value="<?=$education_id?>" name="education_id">
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Education name</label>
                                        <input type="text" value="<?= $education_query_convert_array["name"]?>" name="education_name" class="form-control"  aria-describedby="emailHelp">
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Education year</label>
                                        <input type="number" value="<?= $education_query_convert_array["year"]?>" required name="education_year" class="form-control"  aria-describedby="emailHelp">
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Education credit value</label>
                                        <input type="number" value="<?= $education_query_convert_array["credit"]?>" required name="education_credit" class="form-control"  aria-describedby="emailHelp">
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Brand Status</label>
                                        <select class="form-select" name="education_status" aria-label="Default select example">
                                            <option
                                            
                                            <?= $education_query_convert_array["status"] === "active" ? "selected" : "" ?>
                                            
                                            value="active">Active</option>
                                            <option 
                                            <?= $education_query_convert_array["status"]=== "inactive"? "selected": ""?> 
                                            value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="update_education" class="btn btn-primary m-3">Update Education</button>
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