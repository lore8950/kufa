<?php
require_once('./includes/header.php');
require_once('../db_connect.php');
$id = $_GET["id"];
// service select query  with id 
$db_testimonial_query = "SELECT * FROM testimonials  WHERE ID=$id;";
$db_testimonial_result = mysqli_query($db_connect, $db_testimonial_query);
$testimonial_query_convert_array = mysqli_fetch_assoc($db_testimonial_result); 
?>
<div class="app-content">  
    <div class="content-wrapper ">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Update Testimonial</h5>
                        </div>
                        <div class="card-body">
                            <div class="example-container">
                                <form action="./testimonial_data.php" method="post" enctype="multipart/form-data">
                                <input type="number" value="<?=$id ?>" name="testimonial_id" hidden >
                                    
                                <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Testimonial Name</label>
                                        <input type="text" value="<?= $testimonial_query_convert_array["Name"]?$testimonial_query_convert_array["Name"]: "" ?>" name="testimonial_name" class="form-control"  aria-describedby="emailHelp">
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Testimonial Position</label><span id="showIconService"></span>
                                        <input value="<?= $testimonial_query_convert_array["Position"]?$testimonial_query_convert_array["Position"]: "" ?>"  id="iconValueService" type="text" name="testimonial_position" class="form-control" aria-describedby="emailHelp">
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Testimonial Status</label>
                                        <select class="form-select" name="testimonial_status" aria-label="Default select example">
                                            <option
                                            
                                            <?= $testimonial_query_convert_array["Status"] === "active" ? "selected" : "" ?>
                                            
                                            value="active">Active</option>
                                            <option 
                                            <?= $testimonial_query_convert_array["Status"]=== "inactive"? "selected": ""?> 
                                            value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Testimonial Message</label>
                                        <textarea class="form-control" name="testimonial_message"  id="floatingTextarea2" style="height: 100px">
                                        <?= $testimonial_query_convert_array["Message"]?$testimonial_query_convert_array["Message"]: "" ?>
                                        </textarea>
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Upload Image</label>
                                        <input type="file" name="testimonial_image" class="form-control" aria-describedby="emailHelp">
                                    </div>
                                    <button type="submit" name="update_testimonial" class="btn btn-primary m-3">Update Testimonial</button>
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

