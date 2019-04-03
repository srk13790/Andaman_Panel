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
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || (charCode > 47 && charCode < 58) || (charCode >= 32 && charCode < 39) || (charCode > 39 && charCode < 47) || (charCode > 57 && charCode < 65))
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

<script>

    function add_title(event){
        var x = event.keyCode;
        if (x == 13) {
        var t = document.getElementById('title').value;
        t = t + "<br/>";
        document.getElementById('title').value = t;
        }
        var d = document.getElementById('title').value;
            d = d.length;
        var a = document.getElementById('title_limit').innerHTML;
        if(a > 0 || d <=30){
            var c = 30-d;
            document.getElementById('title_limit').innerHTML = c;
        } else {
            alert('Description Character Limit Reached.');
            var str = desc_id;
            str = str.substring(0,30);
            document.getElementById('title').value = str;
        }
    }

    function update_title(event){
        var x = event.keyCode;
        if (x == 13) {
        var t = document.getElementById('utitle').value;
        t = t + "<br/>";
        document.getElementById('utitle').value = t;
        }
        var d = document.getElementById('utitle').value;
            d = d.length;
        var a = document.getElementById('utitle_limit').innerHTML;
        if(a > 0 || d <=30){
            var c = 30-d;
            document.getElementById('utitle_limit').innerHTML = c;
        } else {
            alert('Description Character Limit Reached.');
            var str = desc_id;
            str = str.substring(0,30);
            document.getElementById('utitle').value = str;
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
        Tours - Honeymoon Packages
<!--        <small>advanced tables</small>-->
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol> -->
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
                                <h4 class="modal-title">Add Packages</h4>
                            </div>
                            <div class="modal-body">
                                <?php
                                $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                                echo form_open('Admin/add_honeymoon_package',$attributes);
                                ?>
                                <div class="form-group">
                                  <label for="Title" class="control-label">Title:</label><?php echo form_error('title'); ?>
                                  <input type="text" class="form-control" id="title" onkeypress="return onlyAlphabetsNumberschar(event,this);" onkeyup="add_title(event)" name="title" required>
                                  <span>Text Limit: <b id="title_limit">30</b></span>
                                </div>

                                <div class="form-group">
                                  <label for="image" class="control-label">Image:</label><?php echo form_error('image'); ?>
                                  <input type="file" class="form-control" name="image" required>
                                  <span><b>Image Should be 443 * 303</b></span>
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
                                  echo form_open('Admin/update_honeymoon_image', $attributes);
                                  ?>
                                  <?php
                                    foreach ($banner as $rewards_image) {
                                  ?>
                                  <tr>
                                      <th><label for="Title" class="control-label">Image:</label></th>
                                      <td><img src="<?php echo base_url();?>uploads/honeymoon_images/<?php echo $rewards_image['image_path'];?>" height="250px" width="450px"></td>
                                  </tr>
                                  <tr>
                                      <th><label for="Title" class="control-label">Details:</label></th>
                                      <td><?php echo $rewards_image['details'];?></td>
                                  </tr>
                                  <tr>
                                      <th><label for="Title" class="control-label">Please Select Image:</label></th>
                                      <td><input type="file" class="form-control" name="image_path"></td>
                                  </tr>

                                  <tr>
                                      <th><label for="Title" class="control-label">Description:</label></th>
                                      <td><input type="text" class="form-control" name="description" value="<?php echo $rewards_image['description'];?>"></td>
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
                                <?php echo form_close(); ?>
                              </table>
                          </div>

                      </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <!----------------Update Model End----------------------->

                <!----------------Update Content Model----------------------->
                <div class="modal fade" id="myModalContent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Update Content</h4>
                          </div>
                          <div class="modal-body">
                              <table class="table table-bordered">
                                  <?php
                                  echo validation_errors();
                                  $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                                  echo form_open('Admin/update_honeymoon_content', $attributes);
                                  ?>
                                  <?php
                                    foreach ($content2 as $rewards_image) {
                                  ?>
                                  <tr>
                                      <th><label for="Title" class="control-label">Title:</label></th>
                                      <td><input type="text" class="form-control" name="title" value="<?php echo $rewards_image['title'];?>"></td>
                                  </tr>

                                  <tr>
                                      <th><label for="Description" class="control-label">Description:</label></th>
                                      <td><textarea class="form-control ckeditor" id="editor" name="description"><?php echo $rewards_image['description'];?></textarea></td>
                                  </tr>
                                  <tr>
                                     <td></td>
                                  <td>
                                  <?php
                                  $encrypted_string = $this->encrypt->encode($rewards_image['content_id']);
                                  ?>
                                  <input type="hidden" name="content_id" value="<?php echo $encrypted_string;?>">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                  </td>
                                  </tr>
                                <?php }?>
                                <?php echo form_close(); ?>
                              </table>
                          </div>

                      </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <!----------------Update Content Model End----------------------->

                <p class="text-right">
                    <button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#myModalBanner">
                        <i class="fa fa-pencil-square-o"> Update Banner Image</i> 
                    </button>

                    <button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#myModalContent">
                        <i class="fa fa-pencil-square-o"> Update Content</i> 
                    </button>

                    <button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-fw fa-plus"></i> Add Packages
                    </button>
                </p>
                <div class="box">
<!--            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>-->
            <!-- /.box-header -->
                    <div class="box-body">
                        <div class="nav-tabs-custom">
                            <div class="tab-content">
<!-----------------------------------------Carousel Start--------------------------------------------->
                                <div class="tab-pane active" id="tab_1">
                                    <table id="example1" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td>Sr.No</td>
                                                <td>Title</td>
                                                <td>Image</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=0;
                                            foreach($content as $content){
                                                $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><a href="package/<?php echo $content['package_name'];?>"><?php echo $content['title']?></a></td>
                                                <td><img src="<?php echo base_url();?>uploads/honeymoon_package/<?php echo $content['image']?>" height="100" width="100"/></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalupdate<?php echo $content['package_id']?>"><i class="fa fa-fw fa-pencil-square-o"></i></button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModaldelete<?php echo $content['package_id']?>"><i class="fa fa-trash"></i></button>
                                                    <!----------------Update Model----------------------->
                                                    <div class="modal fade" id="myModalupdate<?php echo $content['package_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                  <h4 class="modal-title">Update Package</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered">
                                                                  <?php
                                                                  echo validation_errors();
                                                                  $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                                                                  echo form_open('Admin/update_honeymoon_package', $attributes);
                                                                  ?>
                                                                    <tr>
                                                                      <th><label for="Title" class="control-label">Title:</label></th>
                                                                      <td><input type="text" class="form-control" name="title" value="<?php echo $content['title']?>" required>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                      <th><label for="Title" class="control-label">Image:</label></th>
                                                                      <td><input type="file" class="form-control" name="image">
                                                                      <span><b> Image Should be 443 * 303</b></span>
                                                                        </td>
                                                                    </tr>
                                                                   <tr>
                                                                       <td></td>
                                                                      <td>
                                                                         <?php
                                                                         $encrypted_string = $this->encrypt->encode($content['package_id']);
                                                                         ?>
                                                                        <input type="hidden" name="package_id" value="<?php echo $encrypted_string;?>">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                                      </td>
                                                                  </tr>
                                                                </table>
                                                                    
                                                                  <?php
                                                                  echo form_close();
                                                                  ?>
                                                                </div>
                                                                
                                                              </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                          </div>
                                                <!----------------Update Model End----------------------->

                                                <!----------------Delete Model----------------------->
                                                    <div class="modal fade" id="myModaldelete<?php echo $content['package_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                          <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">×</span></button>
                                                            <h4 class="modal-title">Warning !</h4>
                                                          </div>
                                                          <?php
                                                              echo form_open('Admin/delete_honeymoon_package');
                                                              ?>
                                                          <div class="modal-body">
                                                            <h4>Are you sure, You want to delete this Package ?</h4>
                                                          </div>
                                                          <div class="modal-footer">
                                                            <?php
                                                             $encrypted_string = $this->encrypt->encode($content['package_id']);
                                                             ?>
                                                            <input type="hidden" name="package_id" value="<?php echo $encrypted_string;?>">
                                                            <!-- <input type="hidden" name="type" value="<?php echo $content['type'];?>"> -->
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
                            </div><!-- /.tab-content -->
                        </div><!-- nav-tabs-custom -->
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
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
        document.getElementById('nav-tours').className += " active";
</script>
<script type="text/javascript">
        document.getElementById('nav-honeymoon').className += " active";
</script>
        
<!-----------------------Onload Popup-------------------->
    
    <?php
    if(isset($_SESSION['add_images'])){
    ?>
        <script>
        alert("Honeymoon Package has been added successfully !");
        </script>
    <?php unset($_SESSION['add_images']); }?>
        
    <?php
    if(isset($_SESSION['update_images'])){
    ?>
        <script>
        alert("Honeymoon Package has been updated successfully !");
        </script>
    <?php unset($_SESSION['update_images']); }?>

    <?php
    if(isset($_SESSION['delete_images'])){
    ?>
        <script>
        alert("Honeymoon Package has been deleted successfully !");
        </script>
    <?php unset($_SESSION['delete_images']); }?>

    <?php
    if(isset($_SESSION['update_image_content'])){
    ?>
        <script>
        alert("Honeymoon Package Content has been deleted successfully !");
        </script>
    <?php unset($_SESSION['update_image_content']); }?>

    <?php
    if(isset($_SESSION['wrong_img2'])){
    ?>
        <script>
        alert("Image size does not matching requirement !");
        </script>
    <?php unset($_SESSION['wrong_img2']); }?>

    <!--------------------------Popup end------------------->
</html>

