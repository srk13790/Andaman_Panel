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
    function add_image_title(event){
        var x = event.keyCode;
        if (x == 13) {
        var t = document.getElementById('image_title').value;
        t = t + "<br/>";
        document.getElementById('image_title').value = t;
        }
        var t = document.getElementById('image_title').value;
            t = t.length;
        var a = document.getElementById('image_title_limit').innerHTML;
        if(a >0 || t <=30){
            var c = 30-t;
            document.getElementById('image_title_limit').innerHTML = c;
        } else {
            alert('Title Character Limit Reached.');
            var str = title_id;
            str = str.substring(0,30);
            document.getElementById('image_title').value = str;
        }
    }

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

    function add_description(event){
        var x = event.keyCode;
        if (x == 13) {
        var t = document.getElementById('description').value;
        t = t + "<br/>";
        document.getElementById('description').value = t;
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

    function update_description(event){
        var x = event.keyCode;
        if (x == 13) {
        var t = document.getElementById('udescription').value;
        t = t + "<br/>";
        document.getElementById('udescription').value = t;
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
        <a href="<?php echo base_url();?>Admin/activities">Activity</a> - <?php echo str_replace("_", " ", $type);?>
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
                                <h4 class="modal-title">Add Activity Content</h4>
                            </div>
                            <div class="modal-body">
                                <?php
                                $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                                echo form_open('Admin/add_activity_content',$attributes);
                                ?>
                                <div class="form-group">
                                  <label for="Title" class="control-label">Title:</label><?php echo form_error('title'); ?>
                                  <input type="text" class="form-control" id="title" onkeypress="return onlyAlphabetsNumberschar(event,this);" onkeyup="add_title(event)" name="title" required>
                                  <span>Text Limit: <b id="title_limit">30</b></span>
                                </div>
                    
                                <div class="form-group">
                                  <label for="Description" class="control-label">Description:</label><?php echo form_error('description'); ?>
                                  <textarea class="form-control ckeditor" onkeypress="return onlyAlphabetsNumberschar(event,this);" onkeyup="add_image_title(event)" id="editor1" name="description" required rows="3" cols="40"></textarea>
                                </div>

                                <div class="modal-footer">
                                    <input type="hidden" name="activity_type" value="<?php echo $type;?>">
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


                <div class="modal fade" id="myModalGallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Add Gallery Images</h4>
                            </div>
                            <div class="modal-body">
                                <?php
                                $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                                echo form_open('Admin/add_gallery_image',$attributes);
                                ?>
                                <div class="form-group">
                                  <label for="Title" class="control-label">Please Select Image:</label><?php echo form_error('title'); ?>
                                  <input type="file" class="form-control" name="image" required>
                                  <span><b>Image should be 500 * 343</b></span>
                                </div>
                    
                                <div class="modal-footer">
                                    <input type="hidden" name="activity_type" value="<?php echo $type;?>">
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
                <p class="text-right">
                    <button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-fw fa-plus"></i> Add Content
                    </button>

                    <button type="button" class="btn bg-navy margin" style="background-color: #3d9970;" data-toggle="modal" data-target="#myModalGallery">
                    <i class="fa fa-fw fa-plus"></i> Add Gallery Image
                    </button>
                </p>
                <div class="box">
<!--            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>-->
            <!-- /.box-header -->
                    <div class="box-body">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab">Banner Image</a></li>
                                <li><a href="#tab_2" data-toggle="tab">Content</a></li>
                                <li><a href="#tab_3" data-toggle="tab">Gallery</a></li>
                            </ul>
                            <div class="tab-content">
<!-----------------------------------------Carousel Start--------------------------------------------->
                                <div class="tab-pane active" id="tab_1">
                                    <table id="example1" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td>Sr.No</td>
                                                <td>Details</td>
                                                <td>Image</td>
                                                <td>Description</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=0;
                                            foreach($banner as $banner){
                                                $i++;
                                                if($i <= 2) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $banner['details']?></td>
                                                <td><img src="<?php echo base_url();?>uploads/gallery_images/<?php echo $banner['image_path']?>" width="50px" height="50px"></td>
                                                <td><?php echo $banner['description']?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalupdate<?php echo $banner['image_id']?>"><i class="fa fa-fw fa-pencil-square-o"></i></button>
                                                    <!----------------Update Model----------------------->
                                                    <div class="modal fade" id="myModalupdate<?php echo $banner['image_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                  <h4 class="modal-title">Update Image</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered">
                                                                  <?php
                                                                  echo validation_errors();
                                                                  $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                                                                  echo form_open('Admin/update_activity_images', $attributes);
                                                                  ?>
                                                                    
                                                                    <tr>
                                                                      <th><label for="Carousel" class="control-label">Image:</label></th>
                                                                      <td>
                                                                        <img src="<?php echo base_url();?>uploads/gallery_images/<?php echo $banner['image_path']?>" width="150px" height="150px"> 
                                                                        <input type="file" class="form-control" name="image_path" accept="image/jpg, image/jpeg, image/png">
                                                                      </td>
                                                                    </tr>
                                                                    <?php
                                                                        if($i == 1){
                                                                    ?>
                                                                    <tr>
                                                                      <th><label for="Description" class="control-label">Description:</label></th>
                                                                      <td>
                                                                        <textarea class="form-control" onkeypress="return onlyAlphabetsNumberschar(event,this);" onkeyup="add_image_title(event)" id="image_title" name="description" required rows="3" cols="40"><?php echo $banner['description']?></textarea>
                                                                            <span>Text Limit: <b id="image_title_limit">30</b></span>
                                                                        </td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                   <tr>
                                                                       <td></td>
                                                                  <td>
                                                                 <?php
                                                                 $encrypted_string = $this->encrypt->encode($banner['image_id']);
                                                                 ?>
                                                                <input type="hidden" name="image_id" value="<?php echo $encrypted_string;?>">
                                                                <input type="hidden" name="activity_type" value="<?php echo $type;?>">
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
                                                </td>
                                            </tr>
                                            <?php } }?>
                                        </tbody>
                                    </table>
                                </div>
<!------------------------------Carousel End------------------------------------------------------>
                                <div class="tab-pane" id="tab_2">
                                    <table class="table table-bordered example2">
                                        <thead>
                                            <tr>
                                                <td>Sr.No</td>
                                                <td>Title</td>
                                                <td>Description</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=0;
                                            foreach($content2 as $content){
                                                $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $content['title']?></td>
                                                <td><?php echo $content['description']?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalCoontent<?php echo $content['content_id']?>"><i class="fa fa-fw fa-pencil-square-o"></i></button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalfaqdelete<?php echo $content['content_id']?>"><i class="fa fa-fw fa-trash"></i></button>
                                                    <!----------------Update Model----------------------->
                                                    <div class="modal fade" id="myModalCoontent<?php echo $content['content_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                                                  echo form_open('Admin/update_activity_content', $attributes);
                                                                  ?>
                                                                    <tr>
                                                                      <th><label for="Title" class="control-label">Title:</label></th>
                                                                      <td><input type="text" class="form-control" id="utitle" onkeyup="update_title(event)" name="title" value="<?php echo $content['title']?>" required>
                                                                        <span>Text Limit: <b id="utitle_limit">30</b></span>
                                                                    </td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                      <th><label for="Description" class="control-label">Description:</label></th>
                                                                      <td>
                                                                        <textarea class="form-control ckeditor" id="editor" onkeyup="update_description(event)" rows="10" cols="50" name="description" required><?php echo $content['description']?></textarea>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                   <tr>
                                                                       <td></td>
                                                                  <td>
                                                                 <?php
                                                                 $encrypted_string = $this->encrypt->encode($content['content_id']);
                                                                 ?>
                                                                <input type="hidden" name="content_id" value="<?php echo $encrypted_string;?>">
                                                                <input type="hidden" name="activity_type" value="<?php echo $type;?>">
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
                                                        <div class="modal fade" id="myModalfaqdelete<?php echo $content['content_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span></button>
                                                              <h4 class="modal-title">Warning !</h4>
                                                            </div>
                                                            <?php
                                                                echo form_open('Admin/delete_activity_content');
                                                                ?>
                                                            <div class="modal-body">
                                                              <h4>Are you sure, You want to delete this Content ?</h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                              <?php
                                                               $encrypted_string = $this->encrypt->encode($content['content_id']);
                                                               ?>
                                                              <input type="hidden" name="content_id" value="<?php echo $encrypted_string;?>">
                                                              <input type="hidden" name="activity_type" value="<?php echo $type;?>">
                                                            <!--                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>-->
                                                              <button type="submit" class="btn btn-primary">Yes</button>
                                                            </div>
                                                            <?php
                                                                echo form_close();
                                                                ?>
                                                            </div><!-- /.modal-content -->
                                                            </div><!-- /.modal-dialog -->
                                                        </div>
                      
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                              <!-- /.tab-pane -->

                              <div class="tab-pane" id="tab_3">
                                    <table class="table table-bordered example2">
                                        <thead>
                                            <tr>
                                                <td>Sr.No</td>
                                                <td>Image</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=0;
                                            foreach($gallery as $gallery){
                                                $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><img src="<?php echo base_url();?>uploads/gallery/<?php echo $gallery['image']?>" height="50px" width="50px"/></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalGal<?php echo $gallery['gallery_id']?>"><i class="fa fa-fw fa-pencil-square-o"></i></button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModaldelete<?php echo $gallery['gallery_id']?>"><i class="fa fa-trash"></i></button>
                                                    <!----------------Update Model----------------------->
                                                    <div class="modal fade" id="myModalGal<?php echo $gallery['gallery_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title">Update Gallery Images</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered">
                                                                        <?php
                                                                        echo validation_errors();
                                                                        $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                                                                        echo form_open('Admin/update_gallery', $attributes);
                                                                        ?>
                                                                        <tr>
                                                                            <th><label for="Title" class="control-label">Please Select Image:</label></th>
                                                                            <td>
                                                                                <input type="file" class="form-control" name="image" required>
                                                                                <span><b>Image should be 500 * 343</b></span>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                           <td></td>
                                                                        <td>
                                                                        <?php
                                                                        $encrypted_string = $this->encrypt->encode($gallery['gallery_id']);
                                                                        ?>
                                                                        <input type="hidden" name="gallery_id" value="<?php echo $encrypted_string;?>">
                                                                        <input type="hidden" name="activity_type" value="<?php echo $type;?>">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                                        </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                    
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                                <!----------------Update Model End----------------------->
                                                    <!----------------Delete Model----------------------->
                                                    <div class="modal fade" id="myModaldelete<?php echo $gallery['gallery_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span></button>
                                                          <h4 class="modal-title">Warning !</h4>
                                                        </div>
                                                        <?php
                                                            echo form_open('Admin/delete_gallery');
                                                            ?>
                                                        <div class="modal-body">
                                                          <h4>Are you sure, You want to delete this Image ?</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                           <?php
                                                           $encrypted_string = $this->encrypt->encode($gallery['gallery_id']);
                                                           ?>
                                                          <input type="hidden" name="gallery_id" value="<?php echo $encrypted_string;?>">
                                          <!--                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>-->
                                                          <a type="button" href="<?php echo base_url();?>Admin/delete_gallery/<?php echo $type?>/<?php echo $gallery['gallery_id']?>" class="btn btn-primary">Yes</a>
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
                              <!-- /.tab-pane -->
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
$nav = str_replace(" ", "_", $type);
?>
</body>
<script type="text/javascript">
		document.getElementById('nav-activity').className += " active";
	</script>
<script type="text/javascript">
        document.getElementById('nav-<?php echo $nav ?>').className += " active";
    </script>
        
<!-----------------------Onload Popup-------------------->
    <?php
    if(isset($_SESSION['Update_images'])){
    ?>
        <script>
        alert("Activity Images has been updated successfully !");
        </script>
    <?php unset($_SESSION['Update_images']); }?>
    
    <?php
    if(isset($_SESSION['add_images'])){
    ?>
        <script>
        alert("Gallery Image has been added successfully !");
        </script>
    <?php unset($_SESSION['add_images']); }?>
        
    <?php
    if(isset($_SESSION['update_content'])){
    ?>
        <script>
        alert("Activity Content has been updated successfully !");
        </script>
    <?php unset($_SESSION['update_content']); }?>

    <?php
    if(isset($_SESSION['blank_images'])){
    ?>
        <script>
        alert("Please select atleast 1 image !");
        </script>
    <?php unset($_SESSION['blank_images']); }?>

    <?php
    if(isset($_SESSION['delete_content'])){
    ?>
        <script>
        alert("Activity Content has been deleted successfully !");
        </script>
    <?php unset($_SESSION['delete_content']); }?>

    <?php
    if(isset($_SESSION['delete_images'])){
    ?>
        <script>
        alert("Gallery Image has been deleted successfully !");
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

