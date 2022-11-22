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
            <h5 class="card-title">Social links</h5>
            </div>
            <?php
            if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success" role="alert">
              <h4 class="alert-heading"><?=$_SESSION['success']?></h4>
            </div>
                <?php
            endif;
            unset($_SESSION['success']);
            ?>
           <div class="container">
            <div class="row">
                            <div class="col-8">
                            <div class="card-body">
                            <form action="./social_link_update.php" method="post">
                            <div class="example-container">
                             <label for="">facebook</label>
                            <div class="example-content">
                                 <input type="url" class="form-control form-control-rounded m-b-sm" placeholder="facebook link" name="facebook">
                                </div>
                            <div class="example-container"></div>
                            <label for="">twitter</label>
                            <div class="example-content">
                            <input type="url" class="form-control form-control-rounded m-b-sm" placeholder="twitter link" name="twitter">
                            </div>
                            <div  class="example-container">
                            <label for="">instagram</label>
                            <div class="example-content">
                            <input type="url" class="form-control form-control-rounded m-b-sm" placeholder="instagram link" name="instagram">
                                </div>
                            <div class="example-container">
                            <label for="">linked in</label>
                                <div class="example-content">
                                <input type="url" class="form-control form-control-rounded m-b-sm" placeholder="Linked in link" name="Linkedin">
                            
                            <div class="example-content">
                     <button class="btn btn-primary">Update social links</button>
                     </div>
                     </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
            
<?php
require_once('./includes/footer.php');
?>