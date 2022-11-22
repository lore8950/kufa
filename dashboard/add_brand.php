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
                            <h5 class="card-title">Add Brand</h5>
                        </div>
                        <div class="card-body">
                            <div class="example-container">
                                <form action="./brand_data.php" method="post" enctype="multipart/form-data">
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                                        <input type="text" name="brand_name" class="form-control"  aria-describedby="emailHelp">
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Brand Status</label>
                                        <select class="form-select" name="brand_status" aria-label="Default select example">
                                            <option selected value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Upload Image</label>
                                        <input type="file" name="brand_image" class="form-control" readonly  aria-describedby="emailHelp">
                                    </div>
                                    <button type="submit" name="add_brand" class="btn btn-primary m-3">Add Brand</button>
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