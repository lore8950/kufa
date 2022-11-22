<?php
require_once('./includes/header.php');
// session_start();
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
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Education name</label>
                                        <input type="text" name="education_name" class="form-control"  aria-describedby="emailHelp">
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Education year</label>
                                        <input type="number" required name="education_year" class="form-control"  aria-describedby="emailHelp">
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Education credit value</label>
                                        <input type="number" required name="education_credit" class="form-control"  aria-describedby="emailHelp">
                                    </div>
                                    <div class="example-content">
                                        <label for="exampleInputEmail1" class="form-label">Education Status</label>
                                        <select class="form-select" name="education_status" aria-label="Default select example">
                                            <option selected value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="add_education" class="btn btn-primary m-3">Add Education</button>
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