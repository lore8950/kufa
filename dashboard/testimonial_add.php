<?php
require_once('./includes/header.php');
?>

<div class="app-content">  
    <div class="content-wrapper ">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Add Testimonial</h5>
                        </div>
                        <div class="card-body">
                            <div class="example-container">
                                <form action="./testimonial_data.php" method="post" enctype="multipart/form-data">
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Testimonial Name</label>
                                        <input type="text" name="testimonial_name" class="form-control"  aria-describedby="emailHelp">
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Testimoial Position</label><span id="showIconService"></span>
                                        <input  id="iconValueService" type="text" name="testimonial_position" class="form-control" aria-describedby="emailHelp">
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Testimonial Status</label>
                                        <select class="form-select" name="testimonial_status" aria-label="Default select example">
                                            <option selected value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Testimonial Message</label>
                                        <textarea class="form-control" name="testimonial_message"  id="floatingTextarea2" style="height: 100px"></textarea>
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Upload Image</label>
                                        <input type="file" name="testimonial_image" class="form-control" readonly  aria-describedby="emailHelp">
                                    </div>
                                    <button type="submit" name="add_testimonial" class="btn btn-primary m-3">Add Testimonial</button>
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
require_once('./includes/footer.php');
?>