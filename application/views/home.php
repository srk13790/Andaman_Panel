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
    function carousel_title_limit(title_id,event){
        var x = event.keyCode;
        if (x == 13) {
        var t = document.getElementById('title').value;
        t = t + "<br/>";
        document.getElementById('title').value = t;
        }
        var t = document.getElementById('title').value;
            t = t.length;
        var a = document.getElementById('title_limit').innerHTML;
        if(a >0 || t <=35){
            var c = 35-t;
            document.getElementById('title_limit').innerHTML = c;
        } else {
            alert('Title Character Limit Reached.');
            var str = title_id;
            str = str.substring(0,35);
            document.getElementById('title').value = str;
        }
    }

    function carousel_description_limit(desc_id,event){
        var x = event.keyCode;
        if (x == 13) {
        var t = document.getElementById('description').value;
        t = t + "<br/>";
        document.getElementById('description').value = t;
        }
        var d = document.getElementById('description').value;
            d = d.length;
        var a = document.getElementById('desc_limit').innerHTML;
        if(a > 0 || d <=30){
            var c = 30-d;
            document.getElementById('desc_limit').innerHTML = c;
        } else {
            alert('Description Character Limit Reached.');
            var str = desc_id;
            str = str.substring(0,30);
            document.getElementById('description').value = str;
        }
    }


    //---------------Update---------------------

    function carousel_title_limit_update(title_id,event){
        var x = event.keyCode;
        if (x == 13) {
        var t = document.getElementById('title_update').value;
        t = t + "<br/>";
        document.getElementById('title_update').value = t;
        }
        var t = document.getElementById('title_update').value;
            t = t.length;
        var a = document.getElementById('title_limit_update').innerHTML;
        if(a >0 || t <=25){
            var c = 25-t;
            document.getElementById('title_limit_update').innerHTML = c;
        } else {
            alert('Title Character Limit Reached.');
            var str = title_id;
            str = str.substring(0,25);
            document.getElementById('title_update').value = str;
        }
    }

    function carousel_description_limit_update(desc_id,event){
        var x = event.keyCode;
        if (x == 13) {
        var t = document.getElementById('description_update').value;
        t = t + "<br/>";
        document.getElementById('description_update').value = t;
        }
        var d = document.getElementById('description_update').value;
            d = d.length;
        var a = document.getElementById('desc_limit_update').innerHTML;
        if(a > 0 || d <=30){
            var c = 30-d;
            document.getElementById('desc_limit_update').innerHTML = c;
        } else {
            alert('Description Character Limit Reached.');
            var str = desc_id;
            str = str.substring(0,30);
            document.getElementById('description_update').value = str;
        }
    }

    //-------------------------------Update Content-----------------------------------------------

    function content_title_limit_update(event){
        var x = event.keyCode;
        if (x == 13) {
        var t = document.getElementById('title_update_content').value;
        t = t + "<br/>";
        document.getElementById('title_update_content').value = t;
        }
        var t = document.getElementById('title_update_content').value;
            t = t.length;
        var a = document.getElementById('title_limit_update_content').innerHTML;
        if(a >0 || t <=50){
            var c = 50-t;
            document.getElementById('title_limit_update_content').innerHTML = c;
        } else {
            alert('Title Character Limit Reached.');
            var str = title_id;
            str = str.substring(0,50);
            document.getElementById('title_update_content').value = str;
        }
    }

    function content_description_limit_update(event){
        var x = event.keyCode;
        if (x == 13) {
        var t = document.getElementById('description_update_content').value;
        t = t + "<br/>";
        document.getElementById('description_update_content').value = t;
        }
        var d = document.getElementById('description_update_content').value;
            d = d.length;
        var a = document.getElementById('desc_limit_update_content').innerHTML;
        if(a > 0 || d <=750){
            var c = 750-d;
            document.getElementById('desc_limit_update_content').innerHTML = c;
        } else {
            alert('Description Character Limit Reached.');
            var str = desc_id;
            str = str.substring(0,750);
            document.getElementById('description_update_content').value = str;
        }

        //--------------------Our Tour------------------------------------

        function our_tour_update(event){
        var x = event.keyCode;
        if (x == 13) {
        var t = document.getElementById('otd_update').value;
        t = t + "<br/>";
        document.getElementById('otd_update').value = t;
        }
        var t = document.getElementById('otd_update').value;
            t = t.length;
        var a = document.getElementById('ot_limit_update').innerHTML;
        if(a >0 || t <=90){
            var c = 90-t;
            document.getElementById('ot_limit_update').innerHTML = c;
        } else {
            alert('Title Character Limit Reached.');
            var str = title_id;
            str = str.substring(0,90);
            document.getElementById('otd_update').value = str;
        }
    }

    function otd_title_limit_update(event){
        var x = event.keyCode;
        if (x == 13) {
        var t = document.getElementById('otd_title_update').value;
        t = t + "<br/>";
        document.getElementById('otd_title_update').value = t;
        }
        var d = document.getElementById('otd_title_update').value;
            d = d.length;
        var a = document.getElementById('otd_title_limit_update').innerHTML;
        if(a > 0 || d <=20){
            var c = 20-d;
            document.getElementById('otd_title_limit_update').innerHTML = c;
        } else {
            alert('Title Character Limit Reached.');
            var str = desc_id;
            str = str.substring(0,20);
            document.getElementById('otd_title_update').value = str;
        }
    }

    //------------About Andaman-------------------------------------

    function aa_content(event){
        var x = event.keyCode;
        if (x == 13) {
        var t = document.getElementById('aa').value;
        t = t + "<br/>";
        document.getElementById('aa').value = t;
        }
        var d = document.getElementById('aa').value;
            d = d.length;
        var a = document.getElementById('aa_limit').innerHTML;
        if(a > 0 || d <=150){
            var c = 150-d;
            document.getElementById('aa_limit').innerHTML = c;
        } else {
            alert('Title Character Limit Reached.');
            var str = desc_id;
            str = str.substring(0,150);
            document.getElementById('aa').value = str;
        }
    }

    //------------Activities-------------------------------------

    function ac_content(event){
        var x = event.keyCode;
        if (x == 13) {
        var t = document.getElementById('ac').value;
        t = t + "<br/>";
        document.getElementById('ac').value = t;
        }
        var d = document.getElementById('ac').value;
            d = d.length;
        var a = document.getElementById('ac_limit').innerHTML;
        if(a > 0 || d <=150){
            var c = 150-d;
            document.getElementById('ac_limit').innerHTML = c;
        } else {
            alert('Title Character Limit Reached.');
            var str = desc_id;
            str = str.substring(0,150);
            document.getElementById('ac').value = str;
        }
    }

    //--------------------Our Events------------------------------------

        function our_events_update(event){
        var x = event.keyCode;
        if (x == 13) {
        var t = document.getElementById('oed_update').value;
        t = t + "<br/>";
        document.getElementById('oed_update').value = t;
        }
        var t = document.getElementById('oed_update').value;
            t = t.length;
        var a = document.getElementById('oe_limit_update').innerHTML;
        if(a >0 || t <=90){
            var c = 90-t;
            document.getElementById('oe_limit_update').innerHTML = c;
        } else {
            alert('Title Character Limit Reached.');
            var str = title_id;
            str = str.substring(0,90);
            document.getElementById('oed_update').value = str;
        }
    }

    function oed_title_limit_update(event){
        var x = event.keyCode;
        if (x == 13) {
        var t = document.getElementById('oed_title_update').value;
        t = t + "<br/>";
        document.getElementById('oed_title_update').value = t;
        }
        var d = document.getElementById('oed_title_update').value;
            d = d.length;
        var a = document.getElementById('oed_title_limit_update').innerHTML;
        if(a > 0 || d <=20){
            var c = 20-d;
            document.getElementById('oed_title_limit_update').innerHTML = c;
        } else {
            alert('Title Character Limit Reached.');
            var str = desc_id;
            str = str.substring(0,20);
            document.getElementById('oed_title_update').value = str;
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
        Home Page
<!--        <small>advanced tables</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
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
                                <h4 class="modal-title">Add Carousel</h4>
                            </div>
                            <div class="modal-body">
                                <?php
                                $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                                echo form_open('Admin/add_carousel',$attributes);
                                ?>
                                <div class="form-group">
                                    <label for="Carousel" class="control-label">Category:</label><?php echo form_error('carousel'); ?>
                                    <input type="file" class="form-control" name="image_path" accept="image/jpg, image/jpeg, image/png" required>
                                </div>
                                <div class="form-group">
                                  <label for="Title" class="control-label">Title:</label><?php echo form_error('title'); ?>
                                  <!-- <input type="text" class="form-control" onkeypress="return onlyAlphabetsNumberschar(event,this);" onkeyup="carousel_title_limit(this.value,event)" name="title" required> -->
                                    <?php
                                        //echo $this->ckeditor->editor("textarea_title1","");
                                    ?>
                                    <textarea class="form-control" rows="5" cols="65" name="textarea_title1"></textarea>
                                    <span><b>Note: Add <code>br</code> tag to break the line</b></span><br/>
                                    <span>Text Limit Should Be <b id="title_limit">50 alphabets</b></span>
                                </div>
                    
                                <div class="form-group">
                                  <label for="Description" class="control-label">Description:</label><?php echo form_error('description'); ?>
                                  <!-- <input type="text" class="form-control" onkeypress="return onlyAlphabetsNumberschar(event,this);" onkeyup="carousel_description_limit(this.value,event)" name="description" required> -->
                                    <?php
                                        //echo $this->ckeditor->editor("textarea_description1","");
                                    ?>
                                    <textarea class="form-control" rows="5" cols="65" name="textarea_description1"></textarea>
                                    <span><b>Note: Add <code>br</code> tag to break the line</b></span><br/>
                                  <span>Text Limit Should Be <b id="desc_limit">30 alphabets</b></span>
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
                    <button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-fw fa-image"></i> Add Carousel
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
                                <li class="active"><a href="#tab_1" data-toggle="tab">Carousel Images</a></li>
                                <li><a href="#tab_2" data-toggle="tab">About Content</a></li>
                                <li><a href="#tab_3" data-toggle="tab">Our Tours</a></li>
                                <li><a href="#tab_4" data-toggle="tab">About Andaman</a></li>
                                <li><a href="#tab_5" data-toggle="tab">Activities</a></li>
                                <li><a href="#tab_6" data-toggle="tab">Trip Planner</a></li>
                                <li><a href="#tab_7" data-toggle="tab">Our Events</a></li>
                            </ul>
                            <div class="tab-content">
<!-----------------------------------------Carousel Start--------------------------------------------->
                                <div class="tab-pane active" id="tab_1">
                                    <table id="example1" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td>Sr.No</td>
                                                <td>Image</td>
                                                <td>Title</td>
                                                <td>Description</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=0;
                                            foreach($carousel as $carousel){
                                                $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><img src="<?php echo base_url();?>uploads/carousel/<?php echo $carousel['image_path']?>" width="50px" height="50px"></td>
                                                <td><?php echo $carousel['title']?></td>
                                                <td><?php echo $carousel['description']?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $carousel['carousel_id']?>"><i class="fa fa-eye"></i></button>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalupdate<?php echo $carousel['carousel_id']?>"><i class="fa fa-fw fa-pencil-square-o"></i></button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModaldelete<?php echo $carousel['carousel_id']?>"><i class="fa fa-trash"></i></button>

                                      <!----------------View Model Start----------------------->
                                                    <div class="modal fade bs-example-modal-lg<?php echo $carousel['carousel_id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title">Carousel</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered table-hover">
                                                                        <tr>
                                                                            <th><label for="Category" class="control-label">Carousel:</label></th>
                                                                            <td><img src="<?php echo base_url();?>uploads/carousel/<?php echo $carousel['image_path']?>" width="150px" height="150px"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><label for="Title" class="control-label">Title:</label></th>
                                                                            <td><?php echo $carousel['title']?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><label for="Description" class="control-label">Description:</label></th>
                                                                            <td><?php echo $carousel['description']?></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                            <!----------------View Model End----------------------->
                            
                            
                            <!----------------Update Model----------------------->
                                                    <div class="modal fade" id="myModalupdate<?php echo $carousel['carousel_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                  <h4 class="modal-title">Update Carousel</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered">
                                                                  <?php
                                                                  echo validation_errors();
                                                                  $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                                                                  echo form_open('Admin/update_carousel', $attributes);
                                                                  ?>
                                                                    
                                                                    <tr>
                                                                      <th><label for="Carousel" class="control-label">Carousel:</label></th>
                                                                      <td>
                                                                        <img src="<?php echo base_url();?>uploads/carousel/<?php echo $carousel['image_path']?>" width="150px" height="150px"> 
                                                                        <input type="file" class="form-control" name="image_path" accept="image/jpg, image/jpeg, image/png">
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <th><label for="Title" class="control-label">Title:</label></th>
                                                                      <td>
                                                                        <!-- <input type="text" class="form-control" id="title_update" onkeypress="return onlyAlphabetsNumberschar(event,this);" onkeyup="carousel_title_limit_update(this.value,event)" name="title" value="<?php echo $carousel['title']?>" required> -->
                                                                        <?php
                                                                           // echo $this->ckeditor->editor("textarea_title",$carousel['title']);
                                                                        ?>
                                                                        <textarea class="form-control" rows="5" cols="65" name="textarea_title"><?php echo $carousel['title'];?></textarea>
                                                                        <span><b>Note: Add <code>br</code> tag to break the line</b></span><br/>
                                                                        <span>Text Limit Should Be <b id="title_limit_update2">50 alphabets</b></span>
                                                                        <!-- <button type="button" class="btn bg-purple margin" onclick="up_carousel()">Check</button> -->
                                                                        <!-- <span><b id="war1"></b></span> -->
                                                                        <!-- <script type="text/javascript">
                                                                            function up_carousel() {
                                                                                var x = document.getElementsByName("textarea_title")[0].value;
                                                                                len = 50 - (x.length);
                                                                                check = (x.length) - 50;
                                                                                console.log(x);
                                                                                document.getElementById('title_limit_update2').innerHTML = len;
                                                                                if (check > 0) {
                                                                                document.getElementById('war1').innerHTML = "You have exceded text limit by "+check;
                                                                                }
                                                                            }
                                                                        </script> -->
                                                                    </td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                      <th><label for="Description" class="control-label">Description:</label></th>
                                                                      <td>
                                                                        <!-- <input type="text" class="form-control" onkeypress="return onlyAlphabetsNumberschar(event,this);" onkeyup="carousel_description_limit_update(this.value,event)" id="description_update" name="description" value="<?php echo $carousel['description']?>" required> -->
                                                                        <?php
                                                                            //echo $this->ckeditor->editor("textarea_description",$carousel['description']);
                                                                        ?>
                                                                        <textarea class="form-control" rows="5" cols="60" name="textarea_description"><?php echo $carousel['description'];?></textarea>
                                                                        <span><b>Note: Add <code>br</code> tag to break the line</b></span><br/>
                                                                            <span>Text Limit Should Be <b id="title_limit_update2">30 alphabets</b></span>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                   <tr>
                                                                       <td></td>
                                                                  <td>
                                                                 <?php
                                                                 $encrypted_string = $this->encrypt->encode($carousel['carousel_id']);
                                                                 ?>
                                                                <input type="hidden" name="carousel_id" value="<?php echo $encrypted_string;?>">
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
                                                                <div class="modal fade" id="myModaldelete<?php echo $carousel['carousel_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                              <div class="modal-content">
                                                              <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">×</span></button>
                                                                <h4 class="modal-title">Warning !</h4>
                                                              </div>
                                                              <?php
                                                                  echo form_open('Admin/delete_carousel');
                                                                  ?>
                                                              <div class="modal-body">
                                                                <h4>Are you sure, You want to delete this Image ?</h4>
                                                              </div>
                                                              <div class="modal-footer">
                                                                 <?php
                                                                 $encrypted_string = $this->encrypt->encode($carousel['carousel_id']);
                                                                 ?>
                                                                <input type="hidden" name="carousel_id" value="<?php echo $encrypted_string;?>">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
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
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $content['home_about_content_id']?>"><i class="fa fa-eye"></i></button>&nbsp;
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalupdate<?php echo $content['home_about_content_id']?>"><i class="fa fa-fw fa-pencil-square-o"></i></button>

                                      <!----------------View Model Start----------------------->
                                                    <div class="modal fade bs-example-modal-lg<?php echo $content['home_about_content_id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title">About Us Content</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered table-hover">
                                                                        <tr>
                                                                            <th><label for="Title" class="control-label">Title:</label></th>
                                                                            <td><?php echo $content['title']?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th><label for="Description" class="control-label">Description:</label></th>
                                                                            <td><?php echo $content['description']?></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                            <!----------------View Model End----------------------->
                            
                            
                            <!----------------Update Model----------------------->
                                                    <div class="modal fade" id="myModalupdate<?php echo $content['home_about_content_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                                                  echo form_open('Admin/update_content', $attributes);
                                                                  ?>
                                                                    <tr>
                                                                      <th><label for="Title" class="control-label">Title:</label></th>
                                                                      <td>
                                                                        <?php
                                                                            echo $this->ckeditor->editor("textarea_title2",$content['title']);
                                                                        ?>
                                                                        <span>Text Limit Should Be <b id="title_limit_update2">40 alphabets</b></span>
                                                                    </td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                      <th><label for="Description" class="control-label">Description:</label></th>
                                                                      <td>
                                                                        <textarea class="form-control ckeditor" id="editor" onkeyup="content_description_limit_update(event)" rows="10" cols="80" name="description" required><?php echo $content['description']?></textarea>
                                                                        
                                                                            <!-- <span>Text Limit: <b id="desc_limit_update_content">700</b></span> -->
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                   <tr>
                                                                       <td></td>
                                                                  <td>
                                                                 <?php
                                                                 $encrypted_string = $this->encrypt->encode($content['home_about_content_id']);
                                                                 ?>
                                                                <input type="hidden" name="home_about_content_id" value="<?php echo $encrypted_string;?>">
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
                                <div class="tab-pane" id="tab_3">
                                    <table class="table table-bordered">
                                        <tr>
                                                <th>Our Tour Title</th>
                                                <?php
                                                foreach($our_tour as $our_tour){
                                                ?>
                                                <td><?php echo $our_tour['content']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalotd<?php echo $our_tour['tid']?>"><i class="fa fa-fw fa-pencil-square-o"></i></button>

                                                    <div class="modal fade" id="myModalotd<?php echo $our_tour['tid']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                  <h4 class="modal-title">Update Our Tour Title</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered">
                                                                  <?php
                                                                  echo validation_errors();
                                                                  $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                                                                  echo form_open('Admin/update_our_tour', $attributes);
                                                                  ?>
                                                                    <tr>
                                                                      <th><label for="Description" class="control-label">Content:</label></th>
                                                                      <td>
                                                                        <?php
                                                                            echo $this->ckeditor->editor("textarea_content",$our_tour['content']);
                                                                        ?>
                                                                        <!-- <input type="text" class="form-control" onkeypress="return onlyAlphabetsNumberschar(event,this);" onkeyup="our_tour_update(event)" id="ot_update" name="content" value="<?php echo $our_tour['content']?>" required> -->
                                                                            <span>Text Limit Should Be <b id="ot_limit_update">90 Alphabets</b></span>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                   <tr>
                                                                       <td></td>
                                                                  <td>
                                                                 <?php
                                                                 $encrypted_string = $this->encrypt->encode($our_tour['tid']);
                                                                 ?>
                                                                <input type="hidden" name="tid" value="<?php echo $encrypted_string;?>">
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
                                            <?php }?>
                                            </tr>
                                    </table>
                                    <table class="table table-bordered example2">
                                        <thead>
                                            <tr>
                                                <td>Sr.No</td>
                                                <td>Details</td>
                                                <td>Image</td>
                                                <td>Title</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=0;
                                            foreach($otd as $otd){
                                                $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $otd['details']?></td>
                                                <td><img src="<?php echo base_url();?>uploads/home_our_tour/<?php echo $otd['image_path']?>" width="50px" height="50px"></td>
                                                <td><?php echo $otd['title']?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myotd<?php echo $otd['otd_id']?>"><i class="fa fa-fw fa-pencil-square-o"></i></button>
                                                <!----------------Update Model----------------------->
                                                    <div class="modal fade" id="myotd<?php echo $otd['otd_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                  <h4 class="modal-title">Update Our Tour Images</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered">
                                                                  <?php
                                                                  echo validation_errors();
                                                                  $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                                                                  echo form_open('Admin/otd_update', $attributes);
                                                                  ?>
                                                                    
                                                                    <tr>
                                                                      <th><label for="Carousel" class="control-label">Image:</label></th>
                                                                      <td>
                                                                        <img src="<?php echo base_url();?>uploads/home_our_tour/<?php echo $otd['image_path']?>" width="150px" height="150px"> 
                                                                        <input type="file" class="form-control" name="image_path" accept="image/jpg, image/jpeg, image/png">
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <th><label for="Title" class="control-label">Title:</label></th>
                                                                      <td><input type="text" class="form-control" id="otd_title_update" onkeypress="return onlyAlphabetsNumberschar(event,this);" onkeyup="otd_title_limit_update(this.value,event)" name="title" value="<?php echo $otd['title']?>" required>
                                                                        <!-- <span>Text Limit: <b id="otd_title_limit_update">90</b></span> -->
                                                                    </td>
                                                                    </tr>
                                                                   <tr>
                                                                       <td></td>
                                                                  <td>
                                                                 <?php
                                                                 $encrypted_string = $this->encrypt->encode($otd['otd_id']);
                                                                 ?>
                                                                <input type="hidden" name="otd_id" value="<?php echo $encrypted_string;?>">
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

                                <div class="tab-pane" id="tab_4">
                                    <table class="table table-bordered example2">
                                        <thead>
                                            <tr>
                                                <td>Sr.No</td>
                                                <td>Image</td>
                                                <td>Content</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=0;
                                            foreach($aa as $aa){
                                                $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><img src="<?php echo base_url();?>uploads/about_andaman/<?php echo $aa['image_path']?>" width="50px" height="50px"></td>
                                                <td><?php echo $aa['content']?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#aa<?php echo $aa['aa_id']?>"><i class="fa fa-fw fa-pencil-square-o"></i></button>
                                                <!----------------Update Model----------------------->
                                                    <div class="modal fade" id="aa<?php echo $aa['aa_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                  <h4 class="modal-title">Update About Andaman</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered">
                                                                  <?php
                                                                  echo validation_errors();
                                                                  $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                                                                  echo form_open('Admin/aa_update', $attributes);
                                                                  ?>
                                                                    
                                                                    <tr>
                                                                      <th><label for="Carousel" class="control-label">Image:</label></th>
                                                                      <td>
                                                                        <img src="<?php echo base_url();?>uploads/about_andaman/<?php echo $aa['image_path']?>" width="150px" height="150px" style = "margin-bottom: 5px"> <br/>
                                                                        <input type="file" class="form-control" name="image_path" accept="image/jpg, image/jpeg, image/png"><br/>
                                                                        <span><b>Image should be 1920 * 716</b></span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <th><label for="Title" class="control-label">Content:</label></th>
                                                                      <td>
                                                                        <!-- <input type="text" class="form-control" id="aa" onkeypress="return onlyAlphabetsNumberschar(event,this);" onkeyup="aa_content(this.value,event)" name="content" value="<?php echo $aa['content']?>" required> -->
                                                                        <?php
                                                                            echo $this->ckeditor->editor("textarea_content2",$aa['content']);
                                                                        ?>
                                                                        <span>Text Limit Should Be <b id="aa_limit">150 Alphabets</b></span>
                                                                    </td>
                                                                    </tr>
                                                                   <tr>
                                                                       <td></td>
                                                                  <td>
                                                                 <?php
                                                                 $encrypted_string = $this->encrypt->encode($aa['aa_id']);
                                                                 ?>
                                                                <input type="hidden" name="aa_id" value="<?php echo $encrypted_string;?>">
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

                                <div class="tab-pane" id="tab_5">
                                    <table class="table table-bordered example2">
                                        <thead>
                                            <tr>
                                                <td>Sr.No</td>
                                                <td>Title</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=0;
                                            foreach($ac as $ac){
                                                $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $ac['title']?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ac<?php echo $ac['ac_id']?>"><i class="fa fa-fw fa-pencil-square-o"></i></button>
                                                <!----------------Update Model----------------------->
                                                    <div class="modal fade" id="ac<?php echo $ac['ac_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                  <h4 class="modal-title">Update Activities Title</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered">
                                                                  <?php
                                                                  echo validation_errors();
                                                                  $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                                                                  echo form_open('Admin/ac_update', $attributes);
                                                                  ?>
                                                                    <tr>
                                                                      <th><label for="Title" class="control-label">Title:</label></th>
                                                                      <td>
                                                                        <!-- <input type="text" class="form-control" id="ac" onkeypress="return onlyAlphabetsNumberschar(event,this);" onkeyup="ac_content(this.value,event)" name="title" value="<?php echo $ac['title']?>" required> -->
                                                                        <?php
                                                                            echo $this->ckeditor->editor("textarea_title3",$ac['title']);
                                                                        ?>
                                                                        <span>Text Limit Should Be <b id="ac_limit">150 Alphabets</b></span>
                                                                    </td>
                                                                    </tr>
                                                                   <tr>
                                                                       <td></td>
                                                                  <td>
                                                                 <?php
                                                                 $encrypted_string = $this->encrypt->encode($ac['ac_id']);
                                                                 ?>
                                                                <input type="hidden" name="ac_id" value="<?php echo $encrypted_string;?>">
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

                                <div class="tab-pane" id="tab_6">
                                    <table class="table table-bordered example2">
                                        <thead>
                                            <tr>
                                                <td>Sr.No</td>
                                                <td>Image</td>
                                                <td>Content</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=0;
                                            foreach($tp as $tp){
                                                $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><img src="<?php echo base_url();?>uploads/trip_planner/<?php echo $tp['image_path']?>" width="50px" height="50px"></td>
                                                <td><?php echo $tp['content']?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tp<?php echo $tp['tp_id']?>"><i class="fa fa-fw fa-pencil-square-o"></i></button>
                                                <!----------------Update Model----------------------->
                                                    <div class="modal fade" id="tp<?php echo $tp['tp_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                  <h4 class="modal-title">Update Trip Planner</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered">
                                                                  <?php
                                                                  echo validation_errors();
                                                                  $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                                                                  echo form_open('Admin/tp_update', $attributes);
                                                                  ?>
                                                                    
                                                                    <tr>
                                                                      <th><label for="Carousel" class="control-label">Image:</label></th>
                                                                      <td>
                                                                        <img src="<?php echo base_url();?>uploads/trip_planner/<?php echo $tp['image_path']?>" width="150px" height="150px" style="margin-bottom: 5px"> 
                                                                        <input type="file" class="form-control" name="image_path" accept="image/jpg, image/jpeg, image/png">
                                                                        <br/>
                                                                        <span><b>Image Should be 1920*716</b></span>
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <th><label for="Title" class="control-label">Content:</label></th>
                                                                      <td>
                                                                        <!-- <input type="text" class="form-control" id="aa" onkeypress="return onlyAlphabetsNumberschar(event,this);" onkeyup="tp_content(this.value,event)" name="content" value="<?php echo $tp['content']?>" required> -->
                                                                        <?php
                                                                            echo $this->ckeditor->editor("textarea_title4",$tp['content']);
                                                                        ?>
                                                                        <span>Text Limit Should Be <b id="tp_limit">150 Alphabets</b></span>
                                                                    </td>
                                                                    </tr>
                                                                   <tr>
                                                                       <td></td>
                                                                  <td>
                                                                 <?php
                                                                 $encrypted_string = $this->encrypt->encode($tp['tp_id']);
                                                                 ?>
                                                                <input type="hidden" name="tp_id" value="<?php echo $encrypted_string;?>">
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

                                <div class="tab-pane" id="tab_7">
                                    <table class="table table-bordered">
                                        <tr>
                                                <th>Our Events Title</th>
                                                <?php
                                                foreach($our_events as $our_events){
                                                ?>
                                                <td><?php echo $our_events['content']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModaloed<?php echo $our_events['eid']?>"><i class="fa fa-fw fa-pencil-square-o"></i></button>

                                                    <div class="modal fade" id="myModaloed<?php echo $our_events['eid']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                  <h4 class="modal-title">Update Our Events Title</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered">
                                                                  <?php
                                                                  echo validation_errors();
                                                                  $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                                                                  echo form_open('Admin/update_our_events', $attributes);
                                                                  ?>
                                                                    <tr>
                                                                      <th><label for="Description" class="control-label">Content:</label></th>
                                                                      <td><input type="text" class="form-control" onkeypress="return onlyAlphabetsNumberschar(event,this);" onkeyup="our_event_update(event)" id="oe_update" name="content" value="<?php echo $our_events['content']?>" required>
                                                                            <!-- <span>Text Limit: <b id="oe_limit_update">90</b></span> -->
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                   <tr>
                                                                       <td></td>
                                                                  <td>
                                                                 <?php
                                                                 $encrypted_string = $this->encrypt->encode($our_events['eid']);
                                                                 ?>
                                                                <input type="hidden" name="eid" value="<?php echo $encrypted_string;?>">
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
                                            <?php }?>
                                            </tr>
                                    </table>
                                    <table class="table table-bordered example2">
                                        <thead>
                                            <tr>
                                                <td>Sr.No</td>
                                                <td>Details</td>
                                                <td>Image</td>
                                                <td>Title</td>
                                                <td>Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=0;
                                            foreach($oed as $oed){
                                                $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $oed['details']?></td>
                                                <td><img src="<?php echo base_url();?>uploads/home_our_events/<?php echo $oed['image_path']?>" width="50px" height="50px"></td>
                                                <td><?php echo $oed['title']?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myoed<?php echo $oed['oed_id']?>"><i class="fa fa-fw fa-pencil-square-o"></i></button>
                                                <!----------------Update Model----------------------->
                                                    <div class="modal fade" id="myoed<?php echo $oed['oed_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                  <h4 class="modal-title">Update Our Event Content</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered">
                                                                  <?php
                                                                  echo validation_errors();
                                                                  $attributes = array('name' => 'form1','enctype' => 'multipart/form-data');
                                                                  echo form_open('Admin/oed_update', $attributes);
                                                                  ?>
                                                                    
                                                                    <tr>
                                                                      <th><label for="Carousel" class="control-label">Image:</label></th>
                                                                      <td>
                                                                        <img src="<?php echo base_url();?>uploads/home_our_events/<?php echo $oed['image_path']?>" width="150px" height="150px" style="margin-bottom: 5px"> 
                                                                        <input type="file" class="form-control" name="image_path" accept="image/jpg, image/jpeg, image/png">
                                                                      </td>
                                                                    </tr>
                                                                    <tr>
                                                                      <th><label for="Title" class="control-label">Title:</label></th>
                                                                      <td><input type="text" class="form-control" id="oed_title_update" onkeypress="return onlyAlphabetsNumberschar(event,this);" onkeyup="oed_title_limit_update(this.value,event)" name="title" value="<?php echo $oed['title']?>" required>
                                                                        <!-- <span>Text Limit: <b id="oed_title_limit_update">90</b></span> -->
                                                                    </td>
                                                                    </tr>
                                                                   <tr>
                                                                       <td></td>
                                                                  <td>
                                                                 <?php
                                                                 $encrypted_string = $this->encrypt->encode($oed['oed_id']);
                                                                 ?>
                                                                <input type="hidden" name="oed_id" value="<?php echo $encrypted_string;?>">
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
    if(isset($_SESSION['Success'])){
    ?>
        <script>
        alert("Carousel has been added successfully !");
        </script>
    <?php unset($_SESSION['Success']); }?>
    
    <?php
    if(isset($_SESSION['Update'])){
    ?>
        <script>
        alert("Carousel has been updated successfully !");
        </script>
    <?php unset($_SESSION['Update']); }?>
        
    <?php
    if(isset($_SESSION['Delete'])){
    ?>
        <script>
        alert("Carousel has been deleted successfully !");
        </script>
    <?php unset($_SESSION['Delete']); }?>

    <?php
    if(isset($_SESSION['Update_ot'])){
    ?>
        <script>
        alert("Our Tour Title has been updated successfully !");
        </script>
    <?php unset($_SESSION['Update_ot']); }?>

    <?php
    if(isset($_SESSION['Update_otd'])){
    ?>
        <script>
        alert("Our Tour Details has been updated successfully !");
        </script>
    <?php unset($_SESSION['Update_otd']); }?>

    <?php
    if(isset($_SESSION['Update_aa'])){
    ?>
        <script>
        alert("About Andaman has been updated successfully !");
        </script>
    <?php unset($_SESSION['Update_aa']); }?>

    <?php
    if(isset($_SESSION['Update_ac'])){
    ?>
        <script>
        alert("Activities Title has been updated successfully !");
        </script>
    <?php unset($_SESSION['Update_ac']); }?>

    <?php
    if(isset($_SESSION['Update_tp'])){
    ?>
        <script>
        alert("Trip Planner has been updated successfully !");
        </script>
    <?php unset($_SESSION['Update_tp']); }?>
    <?php
    if(isset($_SESSION['exceed_title'])){
    ?>
        <script>
        alert("Carousel Title exceeded text limit by <?php echo $_SESSION['exceed_title'];?> alphabets!");
        </script>
    <?php unset($_SESSION['exceed_title']); }?>
    <?php
    if(isset($_SESSION['exceed_desc'])){
    ?>
        <script>
        alert("Carousel Description exceeded text limit by <?php echo $_SESSION['exceed_desc'];?> alphabets!");
        </script>
    <?php unset($_SESSION['exceed_desc']); }?>

    <?php
    if(isset($_SESSION['exceed_about_us'])){
    ?>
        <script>
        alert("About Us Content Title exceeded text limit by <?php echo $_SESSION['exceed_about_us'];?> alphabets!");
        </script>
    <?php unset($_SESSION['exceed_about_us']); }?>

    <?php
    if(isset($_SESSION['exceed_our_tour'])){
    ?>
        <script>
        alert("Our Tour Content exceeded text limit by <?php echo $_SESSION['exceed_our_tour'];?> alphabets!");
        </script>
    <?php unset($_SESSION['exceed_our_tour']); }?>

    <?php
    if(isset($_SESSION['exceed_aa'])){
    ?>
        <script>
        alert("About Andaman Content exceeded text limit by <?php echo $_SESSION['exceed_aa'];?> alphabets!");
        </script>
    <?php unset($_SESSION['exceed_aa']); }?>

    <?php
    if(isset($_SESSION['exceed_ac_title'])){
    ?>
        <script>
        alert("Activities Title exceeded text limit by <?php echo $_SESSION['exceed_ac_title'];?> alphabets!");
        </script>
    <?php unset($_SESSION['exceed_ac_title']); }?>

    <?php
    if(isset($_SESSION['exceed_tp'])){
    ?>
        <script>
        alert("Trip Planner Content exceeded text limit by <?php echo $_SESSION['exceed_tp'];?> alphabets!");
        </script>
    <?php unset($_SESSION['exceed_tp']); }?>


    <?php
    if(isset($_SESSION['wrong_img'])){
    ?>
        <script>
        alert("Image should be 1920 * 1080 in size !");
        </script>
    <?php unset($_SESSION['wrong_img']); }?>

    <?php
    if(isset($_SESSION['wrong_img2'])){
    ?>
        <script>
        alert("Image size does not matching requirement !");
        </script>
    <?php unset($_SESSION['wrong_img2']); }?>
    <!--------------------------Popup end------------------->
    <script type="text/javascript">
        CKEDITOR.replace( 'editor1', {      
        });
        CKEDITOR.replace( 'editor2', {      
        });
    </script>
</html>
