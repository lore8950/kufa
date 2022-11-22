<?php
require_once('./includes/header.php');
require_once('./includes/icons.php');
// $tab_title = 'edit your profile';
?>
    <div class="col-8">
<div class="row">
    <div class="card">
        </div>
    </div>
</div>

    <div class="card-header">
            <h5 class="card-title">Add work</h5>
            <?php
            if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success" role="alert">
              <h4 class="alert-heading"><?=$_SESSION['success']?></h4>
            </div>
                <?php
            endif;
            unset($_SESSION['success']);
            $id = $_GET['id'];
            $work_query = "SELECT * FROM works WHERE id=$id ";
            $work_query_db = mysqli_query($db_connect, $work_query);
            $work = mysqli_fetch_assoc($work_query_db);
            ?>
            <div class="card-body">
                   <form action="./work_data.php" method="post" enctype="multipart/form-data">
                   </div>
                   <div class="example-container">
                    <input type="number" hidden value="<?=$id?>" name="update_id">
                        <label for=""> work title</label>
                        <div class="example-content">
                         <input type="text" class="form-control form-control-rounded m-b-sm" placeholder="service title" name="work_title" value="<?=$work['work_title']?>">
                        </div>
                        <label for=""> work heading</label>
                        <div class="example-content">
                         <input type="text" class="form-control form-control-rounded m-b-sm" placeholder="service title" name="work_heading" value="<?=$work['work_heading']?>">
                        </div>
                     <div class="example-content">
                     <label for="">work description</label>
                        <textarea cols="30" rows="3" class="form-control form-control-rounded m-b-sm" name="work_description"><?=$work['work_description']?></textarea>
                     </div>
                     <div class="example-content">
                     <label for="">work image</label>
                     <input type="file" class="form-control form-control-rounded m-b-sm" placeholder="service title" name="work_image">
                     </div>
                     <div class="example-content">
                     <label for="">works status</label>
                      <select name="work_status" class="form-control form-control-rounded m-b-sm">
                        <option value="active" <?=($work['work_status'] === 'active') ? 'selected' : ''?>>active</option>
                        <option value="inactive" <?=($work['work_status'] === 'inactive') ? 'selected' : ''?>>inactive</option>
                      </select>
                     </div>
                     <div class="example-content">
                     <button class="btn btn-success" name= "update_work">update work</button>
                     </div>
                   </form>
                 </div>
               </div>
            </div>

<?php
require_once('./includes/footer.php');
?>