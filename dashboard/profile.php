<?php
require_once('./includes/header.php');
// $tab_title = 'edit your profile';
?>
                <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="page-description">
                             <h1>PROFILE</h1>
                           </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                            <div class="card">
                                    <div class="card-body">
                                        <div class="example-container">
                                            <div class="example-content">
                                          <form action="./profile_data.php" method="post" enctype="multipart/form-data">
                                          <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="name" value="<?=$_SESSION['auth_name']?>">
                                                </div>
                                                <?php
                                                        if(isset($_SESSION['name_error'])) {?>
                                                            <p class="text-danger"><?=$_SESSION['name_error'];?></p> 
                                                            <?php
                                                        }
                                                        unset($_SESSION['name_error']);
                                                        ?>
                                                  <div class="input-group mb-3">
                                                    <span class= "input-group-text" id="basic-addon1">old password</span>
                                                    <input type="password" class="form-control" name="old_password">
                                                </div>
                                                <?php
                                                    if(isset($_SESSION['old_password_error'])) {?>
                                                        <p class="text-danger"><?=$_SESSION['old_password_error'];?></p> 
                                                        <?php
                                                    }
                                                    unset($_SESSION['old_password_error']);
                                                    ?> 
                                                <div class="input-group mb-3">
                                                <span class= "input-group-text" id="basic-addon1">new password</span>
                                                    <input type="password" class="form-control" name="new_password">
                                                </div>
                                                <?php
                                                if(isset($_SESSION['new_password_error'])) {?>
                                                    <p class="text-danger"><?=$_SESSION['new_password_error'];?></p> 
                                                    <?php
                                                }
                                                unset($_SESSION['new_password_error']);
                                                ?>
                                                <div class="input-group mb-3">
                                                <span class= "input-group-text" id="basic-addon1">confirm password</span>
                                                    <input type="password" class="form-control" name="confirm_password">
                                                </div>
                                                <?php
                                                if(isset($_SESSION['confirm_password_error'])) {?>
                                                    <p class="text-danger"><?=$_SESSION['confirm_password_error'];?></p> 
                                                    <?php
                                                }
                                                unset($_SESSION['confirm_password_error']);
                                                ?>
                                                <label for="">Upload profile</label>
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" name="profile_pic">
                                                </div>
                                                <label for="">Phone number</label>
                                                <div class="input-group mb-3">
                                                    <input type="tel" class="form-control" name="phone_number">
                                                </div>
                                                <button type="submit" class=" btn btn-success" name="update">update</button>
                                                <button type="submit" class=" btn btn-info" name="chang_password">chang password</button>
                                          </form>      
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