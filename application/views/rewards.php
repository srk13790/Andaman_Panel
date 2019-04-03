<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <?php
  include_once 'css-js-links-top.php';
  ?>
    
  <script language="Javascript" type="text/javascript">
 
        function onlyAlphabetsNumberschar(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || (charCode > 47 && charCode < 58) || (charCode > 32 && charCode < 39) || (charCode > 39 && charCode < 47) || (charCode > 57 && charCode < 65))
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }
 
    </script>

<script language="Javascript" type="text/javascript">
 
        function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }
 
    </script>
    
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include_once 'top.php';?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php
    include_once 'sidebar.php';
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 100vh;overflow:auto;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Rewards
<!--        <small>advanced tables</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Rewards</li>
      </ol>
    </section>
    <?php
    if(isset($_SESSION['errors'])){?>
    <div class="box-body">
    <div class="box " style="background-color: #dd4b39 !important;color: white; margin-bottom: 0px;margin-top: 20px;">
        <div class="box-header with-border">
            <h3 class="box-title" style="color: white;">Errors !</h3>

          <div class="box-tools pull-right">
            <button type="button" style="color: white;" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" style="color: white;" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <?php 
          echo $_SESSION['errors'];
          unset($_SESSION['errors']);
          ?>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <?php }
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <!----------------Model----------------------->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Add Rewards</h4>
                </div>
                <div class="modal-body">
                  <?php
                  $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                  echo form_open('Admin/add_rewards',$attributes);
                  ?>
                    <div class="form-group">
                      <label for="Date" class="control-label">Select an image:</label>
                      <input type="file" class="form-control" name="image" required>
                      <span>Image Should be 467 * 700</span>
                    </div>

                    <div class="form-group">
                      <label for="Date" class="control-label">Title:</label>
                      <input type="text" class="form-control" name="title" required>
                    </div>

                    <div class="form-group">
                      <label for="Date" class="control-label">Details:</label>
                      <input type="text" class="form-control" name="description" required>
                    </div>
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  <?php
                  echo form_close();
                  ?>
                </div>
                
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
          <!----------------Model End----------------------->

          <!----------------Update Model----------------------->
          <div class="modal fade" id="myModalBanner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Update Banner Images</h4>
                      </div>
                      <div class="modal-body">
                          <table class="table table-bordered">
                              <?php
                              echo validation_errors();
                              $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                              echo form_open('Admin/update_rewards_image', $attributes);
                              ?>
                              <?php
                                foreach ($rewards_image as $rewards_image) {
                              ?>
                              <tr>
                                  <th><label for="Title" class="control-label">Image:</label></th>
                                  <td><img src="<?php echo base_url();?>uploads/rewards_images/<?php echo $rewards_image['image_path'];?>" height="250px" width="450px"></td>
                              </tr>
                              <tr>
                                  <th><label for="Title" class="control-label">Details:</label></th>
                                  <td><?php echo $rewards_image['details'];?></td>
                              </tr>
                              <tr>
                                  <th><label for="Title" class="control-label">Please Select Image:</label></th>
                                  <td><input type="file" class="form-control" name="image" required></td>
                              </tr>

                              <tr>
                                 <td></td>
                              <td>
                              <?php
                              $encrypted_string = $this->encrypt->encode($rewards_image['image_id']);
                              ?>
                              <input type="hidden" name="image_id" value="<?php echo $encrypted_string;?>">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Submit</button>
                              </td>
                              </tr>
                            <?php }?>
                          </table>
                      </div>
          
                  </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
                      <!----------------Update Model End----------------------->


          <p class="text-right">
          <button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#myModalBanner">
            <i class="fa fa-pencil-square-o"> Update Rewards Banner Image</i> 
          </button>

          <button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"> Add Rewards</i> 
          </button>
           </p>
          <div class="box">
<!--            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                <tr>
                  <td>Sr.No</td>
                  <td>Reward</td>
                  <td>Title</td>
                  <td>Description</td>
                  <td>Action</td>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=0;
                foreach($rewards as $rewards){
                    $i++;
                ?>
                <tr>
                <td><?php echo $i;?></td>
                <td><img src="<?php echo base_url();?>uploads/rewards/<?php echo $rewards['image']?>" height = "50px" width = "50px"/></td>
                <td><?php echo $rewards['title']?></td>
                <td><?php echo $rewards['description']?></td>
                <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $rewards['rewards_id']?>"><i class="fa fa-eye"></i></button>
                <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalupdate<?php echo $rewards['rewards_id']?>"><i class="fa fa-fw fa-pencil-square-o"></i></button> -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModaldelete<?php echo $rewards['rewards_id']?>"><i class="fa fa-trash"></i></button>
                
                  <!----------------View Model Start----------------------->
                <div class="modal fade bs-example-modal-lg<?php echo $rewards['rewards_id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Rewards</h4>
                </div>
                <div class="modal-body center">
                    <img src="<?php echo base_url();?>uploads/rewards/<?php echo $rewards['image']?>" height = "350px" width = "350px"/>
                </div>
                  </div>
                </div>
              </div>
                <!----------------View Model End----------------------->
                
                
                <!----------------Update Model----------------------->
                <div class="modal fade" id="myModalupdate<?php echo $rewards['rewards_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Add rewards</h4>
                </div>
                <div class="modal-body">
                  
                  <table class="table table-bordered">
                    <?php
                      $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                      echo form_open('Admin/update_rewards',$attributes);
                    ?>
                      <tr>
                        <th><label for="Carousel" class="control-label">Reward Image:</label></th>
                        <td>
                          <input type="file" class="form-control" name="image" accept="image/jpg, image/jpeg, image/png">
                        </td>
                      </tr>
                      <tr>
                        <th><label for="Description" class="control-label">Title:</label></th>
                        <td><input type="text" class="form-control" name="description" value="<?php echo $rewards['title']?>">
                          </td>
                      </tr>
                      <tr>
                        <th><label for="Description" class="control-label">Description:</label></th>
                        <td><input type="text" class="form-control" name="description" value="<?php echo $rewards['description']?>">
                          </td>
                      </tr>
                     <tr>
                         <td></td>
                    <td>
                   <?php
                   $encrypted_string = $this->encrypt->encode($rewards['rewards_id']);
                   ?>
                  <input type="hidden" name="rewards_id" value="<?php echo $encrypted_string;?>">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </td>
                    </tr>
                    <?php
                  echo form_close();
                  ?>
                  </table>
                  
                </div>
                
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div>
                <!----------------Update Model End----------------------->
                
                <!----------------Delete Model----------------------->
                <div class="modal fade" id="myModaldelete<?php echo $rewards['rewards_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                      <h4 class="modal-title">Warning !</h4>
                    </div>
                    <?php
                        echo form_open('Admin/delete_rewards');
                        ?>
                    <div class="modal-body">
                      <h4>Are you sure, You want to delete this rewards ?</h4>
                    </div>
                    <div class="modal-footer">
                       <?php
                       $encrypted_string = $this->encrypt->encode($rewards['rewards_id']);
                       ?>
                      <input type="hidden" name="rewards_id" value="<?php echo $encrypted_string;?>">
      <!--                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>-->
                      <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                    <?php
                        echo form_close();
                        ?>
                  </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>
                <!----------------Delete Model End----------------------->
          
                </td>
                </tr>
                <?php }?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  include_once 'footer.php';
  ?>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  
<!-- ./wrapper -->
<?php
include_once 'css-js-links-bottom.php';
?>
</body>
<script type="text/javascript">
		document.getElementById('nav-rewards').className += " active";
	</script>
        
<!-----------------------Onload Popup-------------------->
    <?php
    if(isset($_SESSION['add_images'])){
    ?>
        <script>
        alert("Rewards has been added successfully !");
        </script>
    <?php unset($_SESSION['add_images']); }?>
    
    <?php
    if(isset($_SESSION['update_images'])){
    ?>
        <script>
        alert("Rewards has been updated successfully !");
        </script>
    <?php unset($_SESSION['update_images']); }?>
        
    <?php
    if(isset($_SESSION['delete_images'])){
    ?>
        <script>
        alert("Rewards has been deleted successfully !");
        </script>
    <?php unset($_SESSION['delete_images']); }?>

    <?php
    if(isset($_SESSION['wrong_img2'])){
    ?>
        <script>
        alert("Image size does not matching requirement !");
        </script>
    <?php unset($_SESSION['wrong_img2']); }?>
    <!--------------------------Popup end------------------->
</html>

