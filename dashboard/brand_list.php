<?php
require_once('./includes/header.php');
// brand insert query 
$db_brands_query = "SELECT * FROM brands ;";
$db_brands_result = mysqli_query($db_connect, $db_brands_query);
$convert_array = mysqli_fetch_assoc($db_brands_result);
?>
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">List of Brand</h5>
                        </div>
                        <div class="card-body">
                        <div class="example-container">
                            <div class="example-content">
                                <table class="table   table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Testimonial Name</th>
                                            <th scope="col">Testimonial Image</th>
                                            <th scope="col">Testimonial Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- table colmun  -->
                                        <?php 
                                        $colmun_id = 0;
                                        foreach ($db_brands_result as  $brand):
                                            $colmun_id++;
                                            ?>
                                            <tr>
                                            <th scope="row"><?=$colmun_id?></th>
                                            <td><?= $brand["name"]?></td>
                                            <td><img src="./img/brand-img/<?= $brand["Image"]?>" width="100px" alt=""></td>
                                            <td>
                                                <?php if($brand["status"] == "active"){
                                                    ?>
                                                    <span class="badge badge-success">
                                                        Active
                                                    </span>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <span class="badge badge-warning">
                                                        Inactive
                                                    </span>
                                                    <?php
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <div >
                                                    <a href="./brand_update.php?id=<?=$brand["id"] ?>" class="btn btn-sm btn-primary">Edit</a>
                                                    <a href="./delete_brand.php?id=<?= $brand["id"]?>" class="btn btn-sm btn-danger">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                            <?php
                                        endforeach
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                                 if(!$convert_array ==1){
                                    ?>
                                    <h3 class="my-3 text-center ">No Found Data</h3>
                                    <?php
                                }
                                ?>
                            </div>
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