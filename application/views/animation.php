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
 
        function onlyAlphabetsNumbers(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || (charCode > 47 && charCode < 58))
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
        Animations
<!--        <small>advanced tables</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Animations</li>
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
                  <h4 class="modal-title">Add Animation</h4>
                </div>
                <div class="modal-body">
                  <?php
                      echo form_open('Admin/add_animation');
                  ?>
                    <div class="form-group">
                      <label for="Category" class="control-label">Category:</label>
                      <select class="form-control" id="recipient-name" name="category" required>
                          <option value="">----Please Select Category----</option>
                          <option value="RBI Guidelines">RBI Guidelines</option>
                          <option value="Loan World">Loan World</option>
                          <option value="Leagal Framework">Leagal Framework</option>
                          <option value="Credit Rating">Credit Rating</option>
                          <option value="Security">Security</option>
                          <option value="Others">Others</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="Video Heading" class="control-label">Video Heading:</label>
                      <input type="text" class="form-control" name="video_heading" onkeypress="return onlyAlphabetsNumberschar(event,this);" id="message-text" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="URL" class="control-label">URL:</label>
                      <input type="url" class="form-control" name="url" id="message-text" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="Source" class="control-label">Source:</label>
                      <input type="text" class="form-control" name="source" onkeypress="return onlyAlphabetsNumbers(event,this);" id="message-text" required>
                    </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                  <?php echo form_close();?>
                </div>
                
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
          <!----------------Model End----------------------->
          <p class="text-right">
          <button type="button" class="btn bg-navy margin" data-toggle="modal" data-target="#myModal">
            Add Animation
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
                  <td>Category</td>
                  <td>Video Heading</td>
<!--                  <td>URL</td>-->
                  <td>Source</td>
                  <td>Action</td>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=0;
                foreach($animation as $animation){
                    $i++;
                ?>
                <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $animation['category']?></td>
                <td><a href="<?php echo $animation['url']?>" target="_blank"><?php echo $animation['video_heading']?></a></td>
<!--                <td><?php echo $animation['url']?></td>-->
                <td><?php echo $animation['source']?></td>
                <td>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalupdate<?php echo $animation['animation_id']?>"><i class="fa fa-fw fa-pencil-square-o"></i></button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModaldelete<?php echo $animation['animation_id']?>"><i class="fa fa-trash"></i></button>
                
                <!----------------Update Model----------------------->
                <div class="modal fade" id="myModalupdate<?php echo $animation['animation_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Add News</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                  <?php
                  $abc=array('RBI Guidelines','Loan World','Leagal Framework','Credit Rating','Security','Others');
                  echo validation_errors();
                  echo form_open('Admin/update_animation');
                  ?>
                    
                    <tr>
                      <th><label for="Category" class="control-label">Category:</label></th>
                      <td><select class="form-control" id="recipient-name" name="category" required style="width: 100%;">
                          <option value="<?php echo $animation['category']?>"><?php echo $animation['category']?></option>
                          <?php
                           foreach ($abc as $a){ 
                               if( $a != $animation['category']){ ?>
                          <option value="<?php echo $a;?>"><?php echo $a;?></option>      
                           <?php } }
                          ?>
                      </select>
                      </td>
                    </tr>
                    <tr>
                      <th><label for="News Heading" class="control-label">Video Heading:</label></th>
                      <td><input type="text" class="form-control" style="width: 100%;" onkeypress="return onlyAlphabetsNumberschar(event,this);" name="video_heading" value="<?php echo $animation['video_heading']?>" id="message-text" required></td>
                    </tr>
                    
                    <tr>
                      <th><label for="URL" class="control-label">URL:</label></th>
                      <td><input type="url" class="form-control" style="width: 100%;" name="url" value="<?php echo $animation['url']?>" id="message-text" required></td>
                    </tr>
                    
                    <tr>
                      <th><label for="Publisher" class="control-label">Source:</label></th>
                      <td><input type="text" class="form-control" style="width: 100%;" onkeypress="return onlyAlphabetsNumbers(event,this);" name="source" value="<?php echo $animation['source']?>" id="message-text" required></td>
                    </tr>
                    
                   <tr>
                       <td></td>
                  <td>
                  <?php
                 $encrypted_string = $this->encrypt->encode($animation['animation_id']);
                 ?>
                <input type="hidden" name="animation_id" value="<?php echo $encrypted_string;?>">
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
                <div class="modal fade" id="myModaldelete<?php echo $animation['animation_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Warning !</h4>
              </div>
              <?php
                  echo form_open('Admin/delete_animation');
                  ?>
              <div class="modal-body">
                <h4>Are you sure, You want to delete this animation ?</h4>
              </div>
              <div class="modal-footer">
                <?php
                 $encrypted_string = $this->encrypt->encode($animation['animation_id']);
                 ?>
                <input type="hidden" name="animation_id" value="<?php echo $encrypted_string;?>">
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
		document.getElementById('nav-animation').className += " active";
	</script>
        
  <!-----------------------Onload Popup-------------------->
    <?php
    if(isset($_SESSION['Success'])){
    ?>
        <script>
        alert("Animation has been added successfully !");
        </script>
    <?php unset($_SESSION['Success']); }?>
        
    <?php
    if(isset($_SESSION['Update'])){
    ?>
        <script>
        alert("Animation has been updated successfully !");
        </script>
    <?php unset($_SESSION['Update']); }?>
    
    <?php
    if(isset($_SESSION['Delete'])){
    ?>
        <script>
        alert("Animation has been deleted successfully !");
        </script>
    <?php unset($_SESSION['Delete']); }?>
        
    <!-----------------------Onload Popup End-------------------->
</html>

