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
            <h5 class="card-title">Update service</h5>
            <?php
            if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success" role="alert">
              <h4 class="alert-heading"><?=$_SESSION['success']?></h4>
            </div>
                <?php
            endif;
            unset($_SESSION['success']);
            $id = $_GET['id'];
            $service_query = "SELECT * FROM services WHERE id=$id ";
            $service_query_db = mysqli_query($db_connect, $service_query);
            $service = mysqli_fetch_assoc($service_query_db);
            ?>
            <div class="card-body">
                   <form action="./service_update_data.php" method="post">
                   <div class="example-container">
                        <label for=""> service title</label>
                        <input hidden type="number" name="id" value="<?=$service['id']?>">
                        <div class="example-content">
                        <input type="text" class="form-control form-control-rounded m-b-sm" placeholder="service title" name="service_title" value="<?=$service['service_title']?>">
                        </div>
                        <div class="example-content">
                        <label readonly for="">service icon</label> <i class="<?=$service['service_icon']?>"></i>
                            <input type="text" class="form-control form-control-rounded m-b-sm" placeholder="service icon" name="service_icon" id="icon_value" value="<?=$service['service_icon']?>">
                        </div>
                        <div class="card text-white bg-light">
                          <div class="card-body" style="overflow-y:scroll ; height: 200px;">
                        <?php
                        
                        foreach ($fonts as $font) : ?>
                            <span class="card-text m-1 badge badge-dark" style="cursor: pointer;"><i class="<?=$font?> fs-5 icon_click" id="<?=$font?>" aria-hidden="true"></i></span>
                          <?php
                        endforeach
                        ?>
                        </div>
                        </div>
                     <div class="example-content">
                     <label for="">service description</label>
                        <textarea cols="30" rows="5" class="form-control form-control-rounded m-b-sm" name="service_description" value="<?=$service['service_description']?>">
                        </textarea>
                     </div>
                     <div class="example-content">
                     <label for="">service description</label>
                      <select name="service_status" class="form-control form-control-rounded m-b-sm">
                        <option value="active" <?=($service['service_status'] === 'active') ? 'selected' : ''?>>active</option>
                        <option value="inactive" <?=($service['service_status'] === 'inactive') ? 'selected' : ''?>>inactive</option>
                      </select>
                     </div>
                     <div class="example-content">
                     <button class="btn btn-primary">add service</button>
                     </div>
                   </form>
                 </div>
               </div>
            </div>

<?php
require_once('./includes/footer.php');
?>
      <script>
    $(document).ready(function(){
      $('.icon_click').click(function(){
        $('#icon_value').val($(this).attr('id'));
      })
    })
  </script>