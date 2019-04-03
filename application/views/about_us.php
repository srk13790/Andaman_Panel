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

    function add_blog_title() {
        var d = document.getElementById('blog_desc').value;
            d = d.length;
            console.log(d);
        var a = document.getElementById('blog_desc_limit').innerHTML;
        if(d > 0 || d <=180){
            var c = 180-d;
            document.getElementById('blog_desc_limit').innerHTML = c;
        } else {
            alert('Description Character Limit Reached.');
            var str = desc_id;
            str = str.substring(0,180);
            document.getElementById('blog_desc').value = str;
        }
    }

    function update_blog_title() {
        var d = document.getElementById('ublog_desc').value;
            d = d.length;
            console.log(d);
        var a = document.getElementById('ublog_desc_limit').innerHTML;
        if(d > 0 || d <=180){
            var c = 180-d;
            document.getElementById('ublog_desc_limit').innerHTML = c;
        } else {
            alert('Description Character Limit Reached.');
            var str = desc_id;
            str = str.substring(0,180);
            document.getElementById('ublog_desc').value = str;
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
        About Us
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
                                <h4 class="modal-title">Add About Us Content</h4>
                            </div>
                            <div class="modal-body">
                                <?php
                                $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                                echo form_open('Admin/add_about_us_content',$attributes);
                                ?>
                                <div class="form-group">
                                  <label for="Title" class="control-label">Title:</label><?php echo form_error('title'); ?>
                                  <input type="text" class="form-control" id="title" onkeypress="return onlyAlphabetsNumberschar(event,this);" onkeyup="add_title(event)" name="title" required>
                                  <span>Text Limit: <b id="title_limit">30</b></span>
                                </div>
                    
                                <div class="form-group">
                                  <label for="Description" class="control-label">Description:</label><?php echo form_error('description'); ?>
                                  <?php
                                    echo $this->ckeditor->editor("textarea_name"," ");
                                  ?>
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

                <div class="modal fade" id="myModalBlog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Add Blog</h4>
                            </div>
                            <div class="modal-body">
                                <?php
                                $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                                echo form_open('Admin/add_blog',$attributes);
                                ?>
                                <div class="form-group">
                                  <label for="Image" class="control-label">Image:</label><?php echo form_error('title'); ?>
                                  <input type="file" class="form-control" name="image_path" required>
                                  <span><b id="title_limit">Image Should be 378 * 318</b></span>
                                </div>

                                <div class="form-group">
                                  <label for="Blog Title" class="control-label">Blog Title:</label><?php echo form_error('title'); ?>
                                  <input type="text" class="form-control" id="title" onkeypress="return onlyAlphabetsNumberschar(event,this);" name="title" required>
                                  <!-- <span>Text Limit: <b id="title_limit">30</b></span> -->
                                </div>

                                <div class="form-group">
                                  <label for="Title" class="control-label">Blog In Short:</label><?php echo form_error('title'); ?>
                                  <textarea class="form-control" id="blog_desc" onkeypress="return onlyAlphabetsNumberschar(event,this);" onkeyup="add_blog_title()" name="blog_desc" required></textarea>
                                  <span>Text Limit: <b id="blog_desc_limit">180</b></span>
                                </div>

                                <div class="form-group">
                                  <label for="Blog writer" class="control-label">Blog Writer:</label><?php echo form_error('title'); ?>
                                  <input type="text" class="form-control" id="title" onkeypress="return onlyAlphabetsNumberschar(event,this);" name="writer" required>
                                  <!-- <span>Text Limit: <b id="title_limit">30</b></span> -->
                                </div>

                                <div class="form-group">
                                  <label for="Blog writer" class="control-label">Blog Date:</label><?php echo form_error('title'); ?>
                                  <input type="date" class="form-control" id="title" name="blog_date" required>
                                  <!-- <span>Text Limit: <b id="title_limit">30</b></span> -->
                                </div>

                                <div class="form-group">
                                  <label for="Blog writer" class="control-label">Facebook Link:</label><?php echo form_error('title'); ?>
                                  <input type="text" class="form-control" id="title" name="blog_facebook">
                                  <!-- <span>Text Limit: <b id="title_limit">30</b></span> -->
                                </div>

                                <div class="form-group">
                                  <label for="Blog writer" class="control-label">Twitter Link:</label><?php echo form_error('title'); ?>
                                  <input type="text" class="form-control" id="title" name="blog_twitter">
                                  <!-- <span>Text Limit: <b id="title_limit">30</b></span> -->
                                </div>

                                <div class="form-group">
                                  <label for="Blog writer" class="control-label">Google Plus Link:</label><?php echo form_error('title'); ?>
                                  <input type="text" class="form-control" id="title" name="blog_google">
                                  <!-- <span>Text Limit: <b id="title_limit">30</b></span> -->
                                </div>
                    
                                <div class="form-group">
                                  <label for="Description" class="control-label">Description:</label><?php echo form_error('description'); ?>
                                  <textarea class="form-control ckeditor" id="editor20" onkeypress="return onlyAlphabetsNumberschar(event,this);" name="description" required></textarea>
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

                <!----------------Update Testimonial Model----------------------->
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
                                  echo form_open('Admin/update_testimonial_image', $attributes);
                                  ?>
                                  <?php
                                    foreach ($tbaner as $rewards_image) {
                                  ?>
                                  <tr>
                                      <th><label for="Title" class="control-label">Image:</label></th>
                                      <td><img src="<?php echo base_url();?>uploads/faq_images/<?php echo $rewards_image['image_path'];?>" height="250px" width="450px"></td>
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
                <!----------------Update Testimonial Model End----------------------->

                <!---------------------------FAQ Model-------------------------------->

                <div class="modal fade" id="myModalFAq" tabindex="-1" role="dialog" aria-labelledby="myModalLabelfaq">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Add FAQ</h4>
                            </div>
                            <div class="modal-body">
                                <?php
                                $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                                echo form_open('Admin/add_faq',$attributes);
                                ?>
                                <div class="form-group">
                                  <label for="Title" class="control-label">Question:</label><?php echo form_error('title'); ?>
                                  <input type="text" class="form-control" id="question" onkeypress="return onlyAlphabetsNumberschar(event,this);" name="question" required>
                                </div>
                    
                                <div class="form-group">
                                  <label for="Description" class="control-label">Answer:</label><?php echo form_error('description'); ?>
                                  <textarea class="form-control" onkeypress="return onlyAlphabetsNumberschar(event,this);" rows="5" cols="50" id="answer" name="answer" required></textarea>
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

                <!---------------------------Testimonial Model-------------------------------->

                <div class="modal fade" id="myModalTest" tabindex="-1" role="dialog" aria-labelledby="myModalLabelfaq">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Add Testimonial</h4>
                            </div>
                            <div class="modal-body">
                                <?php
                                $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                                echo form_open('Admin/add_testimonial',$attributes);
                                ?>
                                <div class="form-group">
                                  <label for="Image" class="control-label">Image:</label><?php echo form_error('title'); ?>
                                  <input type="file" class="form-control" name="image_path" required>
                                  <span><b id="title_limit">Image Should be 400 * 400</b></span>
                                </div>

                                <div class="form-group">
                                  <label for="Title" class="control-label">Name :</label><?php echo form_error('title'); ?>
                                  <input type="text" class="form-control" id="question" onkeypress="return onlyAlphabetsNumberschar(event,this);" name="name" required>
                                </div>

                                <div class="form-group">
                                  <label for="Title" class="control-label">Location :</label><?php echo form_error('title'); ?>
                                  <input type="text" class="form-control" id="question" onkeypress="return onlyAlphabetsNumberschar(event,this);" name="location" required>
                                </div>
                    
                                <div class="form-group">
                                  <label for="Description" class="control-label">Comment :</label><?php echo form_error('description'); ?>
                                  <textarea class="form-control" onkeypress="return onlyAlphabetsNumberschar(event,this);" rows="5" cols="50" id="answer" name="comment" required></textarea>
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
                <p class="text-right">
                    <button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#myModalBanner">
                    <i class="fa fa-fw fa-plus"></i> Update Testimonial Banner
                    </button>

                    <button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-fw fa-plus"></i> Add About Us Content
                    </button>

                    <button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#myModalFAq">
                    <i class="fa fa-fw fa-plus"></i> Add FAQ
                    </button>

                    <button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#myModalBlog">
                    <i class="fa fa-fw fa-plus"></i> Add Blog
                    </button>

                    <button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#myModalTest">
                    <i class="fa fa-fw fa-plus"></i> Add Testimonial
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
                                <li class="active"><a href="#tab_1" data-toggle="tab">About Us Images</a></li>
                                <li><a href="#tab_2" data-toggle="tab">About Us Content</a></li>
                                <li><a href="#tab_3" data-toggle="tab">FAQ</a></li>
                                <li><a href="#tab_4" data-toggle="tab">FAQ Images</a></li>
                                <li><a href="#tab_5" data-toggle="tab">Blog Images</a></li>
                                <li><a href="#tab_6" data-toggle="tab">Blogs</a></li>
                                <li><a href="#tab_7" data-toggle="tab">Testimonials</a></li>
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
                                            ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $banner['details']?></td>
                                                <td><img src="<?php echo base_url();?>uploads/about_us_images/<?php echo $banner['image_path']?>" width="50px" height="50px"></td>
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
                                                                  echo form_open('Admin/update_aboutus_images', $attributes);
                                                                  ?>
                                                                    
                                                                    <tr>
                                                                      <th><label for="Carousel" class="control-label">Carousel:</label></th>
                                                                      <td>
                                                                        <img src="<?php echo base_url();?>uploads/about_us_images/<?php echo $banner['image_path']?>" width="150px" height="150px"> 
                                                                        <input type="file" class="form-control" name="image_path" accept="image/jpg, image/jpeg, image/png">
                                                                      </td>
                                                                    </tr>
                                                                    <?php
                                                                        if($banner['image_id'] == 1){
                                                                    ?>
                                                                    <tr>
                                                                      <th><label for="Description" class="control-label">Description:</label></th>
                                                                      <td>
                                                                        <textarea class="form-control" onkeypress="return onlyAlphabetsNumberschar(event,this);" onkeyup="add_image_title(event)" id="image_title" name="description" required rows="3" cols="40"><?php echo $banner['description']?></textarea>
                                                                            <span>Text Limit: <b id="image_title_limit">30</b></span>
                                                                        </td>
                                                                    </tr>
                                                                    <?php }?>
                                                                    
                                                                   <tr>
                                                                       <td></td>
                                                                  <td>
                                                                 <?php
                                                                 $encrypted_string = $this->encrypt->encode($banner['image_id']);
                                                                 ?>
                                                                <input type="hidden" name="image_id" value="<?php echo $encrypted_string;?>">
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
                                            <?php }?>
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
                                            foreach($content as $content){
                                                $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $content['title']?></td>
                                                <td><?php echo $content['description']?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalCoontent<?php echo $content['content_id']?>"><i class="fa fa-fw fa-pencil-square-o"></i></button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalCoontentDelete<?php echo $content['content_id']?>"><i class="fa fa-trash"></i></button>
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
                                                                  echo form_open('Admin/update_about_us_content', $attributes);
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
                                                                        <textarea class="form-control ckeditor" id="editor<>" onkeyup="update_description(event)" rows="10" cols="50" name="description" required><?php echo $content['description']?></textarea>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                   <tr>
                                                                       <td></td>
                                                                  <td>
                                                                 <?php
                                                                 $encrypted_string = $this->encrypt->encode($content['content_id']);
                                                                 ?>
                                                                <input type="hidden" name="content_id" value="<?php echo $encrypted_string;?>">
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
                                                          <div class="modal fade" id="myModalCoontentDelete<?php echo $content['content_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                              <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">×</span></button>
                                                                <h4 class="modal-title">Warning !</h4>
                                                              </div>
                                                              <?php
                                                                  echo form_open('Admin/delete_about_us_content');
                                                                  ?>
                                                              <div class="modal-body">
                                                                <h4>Are you sure, You want to delete this About Us Content ?</h4>
                                                              </div>
                                                              <div class="modal-footer">
                                                                <?php
                                                                 $encrypted_string = $this->encrypt->encode($content['content_id']);
                                                                 ?>
                                                                <input type="hidden" name="content_id" value="<?php echo $encrypted_string;?>">
                                                <!--                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>-->
                                                                <button type="submit" class="btn btn-primary">Yes</button>
                                                              </div>
                                                              <?php
                                                                  echo form_close();
                                                                  ?>
                                                            </div><!-- /.modal-content --><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div>
                      
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->
<!------------------------------FAQ Start------------------------------------------------------>
                                <div class="tab-pane" id="tab_3">
                                    <table class="table table-bordered example2">
                                        <thead>
                                            <tr>
                                                <td>Sr.No</td>
                                                <td>Question</td>
                                                <td>Answer</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=0;
                                            foreach($faq as $faq){
                                                $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $faq['question']?></td>
                                                <td><?php echo $faq['answer']?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalfaqupdate<?php echo $faq['faq_id']?>"><i class="fa fa-fw fa-pencil-square-o"></i></button>

                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalfaqdelete<?php echo $faq['faq_id']?>"><i class="fa fa-fw fa-trash"></i></button>
                                                    <!----------------Update Model----------------------->
                                                    <div class="modal fade" id="myModalfaqupdate<?php echo $faq['faq_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                  <h4 class="modal-title">Update FAQ</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered">
                                                                  <?php
                                                                  echo validation_errors();
                                                                  $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                                                                  echo form_open('Admin/update_faq', $attributes);
                                                                  ?>
                                                                    <tr>
                                                                      <th><label for="Title" class="control-label">Question:</label></th>
                                                                      <td><input type="text" class="form-control" id="ufaq" name="question" value="<?php echo $faq['question']?>" required>
                                                                    </td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                      <th><label for="Description" class="control-label">Answer:</label></th>
                                                                      <td>
                                                                        <textarea class="form-control" id="uanswer" rows="10" cols="50" name="answer" required><?php echo $faq['answer']?></textarea>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                   <tr>
                                                                       <td></td>
                                                                  <td>
                                                                 <?php
                                                                 $encrypted_string = $this->encrypt->encode($faq['faq_id']);
                                                                 ?>
                                                                <input type="hidden" name="faq_id" value="<?php echo $encrypted_string;?>">
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
                                                        <div class="modal fade" id="myModalfaqdelete<?php echo $faq['faq_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span></button>
                                                              <h4 class="modal-title">Warning !</h4>
                                                            </div>
                                                            <?php
                                                                echo form_open('Admin/delete_faq');
                                                                ?>
                                                            <div class="modal-body">
                                                              <h4>Are you sure, You want to delete this FAQ ?</h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                              <?php
                                                               $encrypted_string = $this->encrypt->encode($faq['faq_id']);
                                                               ?>
                                                              <input type="hidden" name="faq_id" value="<?php echo $encrypted_string;?>">
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

                                <div class="tab-pane" id="tab_4">
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
                                            foreach($ifaq as $ifaq){
                                                $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $ifaq['details']?></td>
                                                <td><img src="<?php echo base_url();?>uploads/faq_images/<?php echo $ifaq['image_path']?>" width="50px" height="50px"></td>
                                                <td><?php echo $ifaq['description']?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalupdatefaq<?php echo $ifaq['image_id']?>"><i class="fa fa-fw fa-pencil-square-o"></i></button>
                                                    <!----------------Update Model----------------------->
                                                    <div class="modal fade" id="myModalupdatefaq<?php echo $ifaq['image_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                                                  echo form_open('Admin/update_faq_images', $attributes);
                                                                  ?>
                                                                    
                                                                    <tr>
                                                                      <th><label for="Carousel" class="control-label">Carousel:</label></th>
                                                                      <td>
                                                                        <img src="<?php echo base_url();?>uploads/faq_images/<?php echo $ifaq['image_path']?>" width="150px" height="150px"> 
                                                                        <input type="file" class="form-control" name="image_path" accept="image/jpg, image/jpeg, image/png">
                                                                      </td>
                                                                    </tr>
                                                                    <?php
                                                                        if($ifaq['image_id'] == 1){
                                                                    ?>
                                                                    <tr>
                                                                      <th><label for="Description" class="control-label">Description:</label></th>
                                                                      <td>
                                                                        <textarea class="form-control" onkeypress="return onlyAlphabetsNumberschar(event,this);" onkeyup="add_image_title(event)" id="image_title" name="description" required rows="3" cols="40"><?php echo $ifaq['description']?></textarea>
                                                                            <span>Text Limit: <b id="image_title_limit">30</b></span>
                                                                        </td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                    
                                                                   <tr>
                                                                       <td></td>
                                                                  <td>
                                                                 <?php
                                                                 $encrypted_string = $this->encrypt->encode($ifaq['image_id']);
                                                                 ?>
                                                                <input type="hidden" name="image_id" value="<?php echo $encrypted_string;?>">
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
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                              <!-- /.tab-pane -->

                              <div class="tab-pane" id="tab_5">
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
                                            foreach($iblog as $iblog){
                                                $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $iblog['details']?></td>
                                                <td><img src="<?php echo base_url();?>uploads/faq_images/<?php echo $iblog['image_path']?>" width="50px" height="50px"></td>
                                                <td><?php echo $iblog['description']?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalupdateblog<?php echo $iblog['image_id']?>"><i class="fa fa-fw fa-pencil-square-o"></i></button>
                                                    <!----------------Update Model----------------------->
                                                    <div class="modal fade" id="myModalupdateblog<?php echo $iblog['image_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                                                  echo form_open('Admin/update_blog_images', $attributes);
                                                                  ?>
                                                                    
                                                                    <tr>
                                                                      <th><label for="Carousel" class="control-label">Carousel:</label></th>
                                                                      <td>
                                                                        <img src="<?php echo base_url();?>uploads/faq_images/<?php echo $iblog['image_path']?>" width="150px" height="150px"> 
                                                                        <input type="file" class="form-control" name="image_path" accept="image/jpg, image/jpeg, image/png">
                                                                      </td>
                                                                    </tr>
                                                                    <?php
                                                                        if($iblog['image_id'] == 1){
                                                                    ?>
                                                                    <tr>
                                                                      <th><label for="Description" class="control-label">Description:</label></th>
                                                                      <td>
                                                                        <textarea class="form-control" onkeypress="return onlyAlphabetsNumberschar(event,this);" onkeyup="add_image_title(event)" id="image_title" name="description" required rows="3" cols="40"><?php echo $iblog['description']?></textarea>
                                                                            <span>Text Limit: <b id="image_title_limit">30</b></span>
                                                                        </td>
                                                                    </tr>
                                                                    <?php } ?>
                                                                    
                                                                   <tr>
                                                                       <td></td>
                                                                  <td>
                                                                 <?php
                                                                 $encrypted_string = $this->encrypt->encode($iblog['image_id']);
                                                                 ?>
                                                                <input type="hidden" name="image_id" value="<?php echo $encrypted_string;?>">
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
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                              <!-- /.tab-pane -->

                              <div class="tab-pane" id="tab_6">
                                    <table id="example1" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td>Sr.No</td>
                                                <td>Image</td>
                                                <td>Title</td>
                                                <td>Short Description</td>
                                                <td>Writer</td>
                                                <td>Date</td>
                                                <td>Facebook</td>
                                                <td>Twitter</td>
                                                <td>Google</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=0;
                                            foreach($blog as $blog){
                                                $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><img src="<?php echo base_url();?>uploads/faq_images/<?php echo $blog['image_path']?>" width="50px" height="50px"></td>
                                                <td><?php echo $blog['title']?></td>
                                                <td><?php echo $blog['blog_desc']?></td>
                                                <td><?php echo $blog['writer']?></td>
                                                <td><?php echo $blog['blog_date']?></td>
                                                <td><?php echo $blog['blog_facebook']?></td>
                                                <td><?php echo $blog['blog_twitter']?></td>
                                                <td><?php echo $blog['blog_google']?></td>
                                                <td><?php echo $blog['description']?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalupdateblog1<?php echo $blog['blog_id']?>"><i class="fa fa-fw fa-pencil-square-o"></i></button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalupdateblog2<?php echo $blog['blog_id']?>"><i class="fa fa-trash"></i></button>
                                                    <!----------------Update Model----------------------->
                                                    <div class="modal fade" id="myModalupdateblog1<?php echo $blog['blog_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                                                  echo form_open('Admin/update_blog', $attributes);
                                                                  ?>
                                                                    
                                                                    <tr>
                                                                      <th><label for="Carousel" class="control-label">Image:</label></th>
                                                                      <td>
                                                                        <img src="<?php echo base_url();?>uploads/faq_images/<?php echo $blog['image_path']?>" width="150px" height="150px"> 
                                                                        <input type="file" class="form-control" name="image_path" accept="image/jpg, image/jpeg, image/png">
                                                                        <span><b>Image Should Be 378 * 318</b></span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <th><label for="title" class="control-label">Title:</label></th>
                                                                      <td>
                                                                        <input type="text" class="form-control" onkeypress="return onlyAlphabetsNumberschar(event,this);" onkeyup="add_image_title(event)" id="image_title" name="title" required value="<?php echo $blog['title']?>">
                                                                            <!-- <span>Text Limit: <b id="image_title_limit">30</b></span> -->
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <th><label for="Description" class="control-label">Short Description:</label></th>
                                                                      <td>
                                                                        <textarea class="form-control" onkeypress="return onlyAlphabetsNumberschar(event,this);" onkeyup="update_blog_title(event)" id="ublog_desc" name="blog_desc" required rows="3" cols="40"><?php echo $blog['blog_desc']?></textarea>
                                                                            <span>Text Limit: <b id="ublog_desc_limit">180</b></span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <th><label for="title" class="control-label">Writer:</label></th>
                                                                      <td>
                                                                        <input type="text" class="form-control" onkeypress="return onlyAlphabetsNumberschar(event,this);" id="image_title" name="writer" required value="<?php echo $blog['writer']?>">
                                                                            <!-- <span>Text Limit: <b id="image_title_limit">30</b></span> -->
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <th><label for="title" class="control-label">Blog Date:</label></th>
                                                                      <td>
                                                                        <span style="margin-bottom: 10px"><b><?php echo $blog['blog_date']?></b></span><br/>
                                                                        Change: <input type="date" class="form-control" onkeypress="return onlyAlphabetsNumberschar(event,this);" id="image_title" name="blog_date">
                                                                            <!-- <span>Text Limit: <b id="image_title_limit">30</b></span> -->
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                      <th><label for="title" class="control-label">Facebook Link:</label></th>
                                                                      <td>
                                                                        <input type="text" class="form-control" onkeypress="return onlyAlphabetsNumberschar(event,this);" id="image_title" name="blog_facebook" value="<?php echo $blog['blog_facebook']?>">
                                                                            <!-- <span>Text Limit: <b id="image_title_limit">30</b></span> -->
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <th><label for="title" class="control-label">Twitter Link:</label></th>
                                                                      <td>
                                                                        <input type="text" class="form-control" onkeypress="return onlyAlphabetsNumberschar(event,this);" id="image_title" name="blog_twitter" value="<?php echo $blog['blog_twitter']?>">
                                                                            <!-- <span>Text Limit: <b id="image_title_limit">30</b></span> -->
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <th><label for="title" class="control-label">Google Plus Link:</label></th>
                                                                      <td>
                                                                        <input type="text" class="form-control" onkeypress="return onlyAlphabetsNumberschar(event,this);" id="image_title" name="blog_google" value="<?php echo $blog['blog_google']?>">
                                                                            <!-- <span>Text Limit: <b id="image_title_limit">30</b></span> -->
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <th><label for="Description" class="control-label">Short Description:</label></th>
                                                                      <td>
                                                                        <textarea class="form-control ckedito" onkeypress="return onlyAlphabetsNumberschar(event,this);" onkeyup="update_blog_title(event)" id="editor<?php echo $i?>" name="description" required rows="3" cols="40"><?php echo $blog['description']?></textarea>
                                                                            <!-- <span>Text Limit: <b id="ublog_desc_limit">180</b></span> -->
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                   <tr>
                                                                       <td></td>
                                                                  <td>
                                                                 <?php
                                                                 $encrypted_string = $this->encrypt->encode($blog['blog_id']);
                                                                 ?>
                                                                <input type="hidden" name="blog_id" value="<?php echo $encrypted_string;?>">
                                                                <input type="hidden" name="bd" value="<?php echo $blog['blog_date']?>">
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

                                                <div class="modal fade" id="myModalupdateblog2<?php echo $blog['blog_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                              <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">×</span></button>
                                                                <h4 class="modal-title">Warning !</h4>
                                                              </div>
                                                              <?php
                                                                  echo form_open('Admin/delete_blog');
                                                                  ?>
                                                              <div class="modal-body">
                                                                <h4>Are you sure, You want to delete this Blog ?</h4>
                                                              </div>
                                                              <div class="modal-footer">
                                                                <?php
                                                                 $encrypted_string = $this->encrypt->encode($blog['blog_id']);
                                                                 ?>
                                                                <input type="hidden" name="blog_id" value="<?php echo $encrypted_string;?>">
                                                <!--                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>-->
                                                                <button type="submit" class="btn btn-primary">Yes</button>
                                                              </div>
                                                              <?php
                                                                  echo form_close();
                                                                  ?>
                                                            </div><!-- /.modal-content --><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                              <!-- /.tab-pane -->

                              <div class="tab-pane" id="tab_7">
                                    <table class="table table-bordered example2">
                                        <thead>
                                            <tr>
                                                <td>Sr.No</td>
                                                <td>Image</td>
                                                <td>Name</td>
                                                <td>Location</td>
                                                <td>Comment</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=0;
                                            foreach($test as $faq){
                                                $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><img src="<?php echo base_url();?>uploads/faq_images/<?php echo $faq['image_path']?>" width="150px" height="150px"></td>
                                                <td><?php echo $faq['name']?></td>
                                                <td><?php echo $faq['location']?></td>
                                                <td><?php echo $faq['comment']?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModaltestimonialupdate<?php echo $faq['testimonial_id']?>"><i class="fa fa-fw fa-pencil-square-o"></i></button>

                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModaltestimonialdelete<?php echo $faq['testimonial_id']?>"><i class="fa fa-fw fa-trash"></i></button>
                                                    <!----------------Update Model----------------------->
                                                    <div class="modal fade" id="myModaltestimonialupdate<?php echo $faq['testimonial_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                  <h4 class="modal-title">Update Testimonial</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered">
                                                                  <?php
                                                                  echo validation_errors();
                                                                  $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                                                                  echo form_open('Admin/update_testimonial', $attributes);
                                                                  ?>
                                                                    <tr>
                                                                      <th><label for="Carousel" class="control-label">Image:</label></th>
                                                                      <td>
                                                                        <img src="<?php echo base_url();?>uploads/faq_images/<?php echo $faq['image_path']?>" width="150px" height="150px"> 
                                                                        <input type="file" class="form-control" name="image_path" accept="image/jpg, image/jpeg, image/png"><br/>
                                                                        <span><b>Image Should be 400 * 400</b></span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <th><label for="Title" class="control-label">Name:</label></th>
                                                                      <td><input type="text" class="form-control" id="ufaq" name="name" value="<?php echo $faq['name']?>" required>
                                                                    </td>
                                                                    </tr>

                                                                    <tr>
                                                                      <th><label for="Title" class="control-label">Location:</label></th>
                                                                      <td><input type="text" class="form-control" id="ufaq" name="location" value="<?php echo $faq['location']?>" required>
                                                                    </td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                      <th><label for="Description" class="control-label">Comment:</label></th>
                                                                      <td>
                                                                        <textarea class="form-control" id="uanswer" rows="10" cols="50" name="comment" required><?php echo $faq['comment']?></textarea>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                   <tr>
                                                                       <td></td>
                                                                  <td>
                                                                 <?php
                                                                 $encrypted_string = $this->encrypt->encode($faq['testimonial_id']);
                                                                 ?>
                                                                <input type="hidden" name="testimonial_id" value="<?php echo $encrypted_string;?>">
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
                                                        <div class="modal fade" id="myModaltestimonialdelete<?php echo $faq['testimonial_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span></button>
                                                              <h4 class="modal-title">Warning !</h4>
                                                            </div>
                                                            <?php
                                                                echo form_open('Admin/delete_testimonial');
                                                                ?>
                                                            <div class="modal-body">
                                                              <h4>Are you sure, You want to delete this Testimonial ?</h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                              <?php
                                                               $encrypted_string = $this->encrypt->encode($faq['testimonial_id']);
                                                               ?>
                                                              <input type="hidden" name="testimonial_id" value="<?php echo $encrypted_string;?>">
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
        document.getElementById('nav-news').className += " active";
    </script>
        
<!-----------------------Onload Popup-------------------->
    <?php
    if(isset($_SESSION['Update_images'])){
    ?>
        <script>
        alert("About Us Images has been updated successfully !");
        </script>
    <?php unset($_SESSION['Update_images']); }?>
    <?php
    if(isset($_SESSION['Update_blog_images'])){
    ?>
        <script>
        alert("Blog Images has been updated successfully !");
        </script>
    <?php unset($_SESSION['Update_blog_images']); }?>
    
    <?php
    if(isset($_SESSION['add_content'])){
    ?>
        <script>
        alert("About Us Content has been added successfully !");
        </script>
    <?php unset($_SESSION['add_content']); }?>

    <?php
    if(isset($_SESSION['add_test'])){
    ?>
        <script>
        alert("Testimonial has been added successfully !");
        </script>
    <?php unset($_SESSION['add_test']); }?>

    <?php
    if(isset($_SESSION['update_test_content'])){
    ?>
        <script>
        alert("Testimonial has been updated successfully !");
        </script>
    <?php unset($_SESSION['update_test_content']); }?>
    <?php
    if(isset($_SESSION['delete_test'])){
    ?>
        <script>
        alert("Testimonial has been deleted successfully !");
        </script>
    <?php unset($_SESSION['delete_test']); }?>

    <?php
    if(isset($_SESSION['add_blog'])){
    ?>
        <script>
        alert("Blog has been added successfully !");
        </script>
    <?php unset($_SESSION['add_blog']); }?>

    <?php
    if(isset($_SESSION['Update_blog'])){
    ?>
        <script>
        alert("Blog has been updated successfully !");
        </script>
    <?php unset($_SESSION['Update_blog']); }?>
        
    <?php
    if(isset($_SESSION['update_content'])){
    ?>
        <script>
        alert("About Us Content has been updated successfully !");
        </script>
    <?php unset($_SESSION['update_content']); }?>

    <?php
    if(isset($_SESSION['Update_test'])){
    ?>
        <script>
        alert("Testimonial Banner has been updated successfully !");
        </script>
    <?php unset($_SESSION['Update_test']); }?>

    <?php
    if(isset($_SESSION['Update_ot'])){
    ?>
        <script>
        alert("Our Tour Title has been updated successfully !");
        </script>
    <?php unset($_SESSION['Update_ot']); }?>

    <?php
    if(isset($_SESSION['add_faq'])){
    ?>
        <script>
        alert("FAQ has been added successfully !");
        </script>
    <?php unset($_SESSION['add_faq']); }?>

    <?php
    if(isset($_SESSION['update_faq'])){
    ?>
        <script>
        alert("FAQ has been updated successfully !");
        </script>
    <?php unset($_SESSION['update_faq']); }?>

    <?php
    if(isset($_SESSION['delete_faq'])){
    ?>
        <script>
        alert("FAQ has been deleted successfully !");
        </script>
    <?php unset($_SESSION['delete_faq']); }?>
    <?php
    if(isset($_SESSION['delete_blog'])){
    ?>
        <script>
        alert("Blog has been deleted successfully !");
        </script>
    <?php unset($_SESSION['delete_blog']); }?>

    <?php
    if(isset($_SESSION['wrong_img2'])){
    ?>
        <script>
        alert("Image size does not matching requirement !");
        </script>
    <?php unset($_SESSION['wrong_img2']); }?>

    <!--------------------------Popup end------------------->
</html>
