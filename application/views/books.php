<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <?php
  include_once 'css-js-links-top.php';
  ?>
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
        Books & Magazines
<!--        <small>advanced tables</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Books & Magazines</li>
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
                  <h4 class="modal-title">Add Books/Magazine</h4>
                </div>
                <div class="modal-body">
                  <?php
                      echo form_open_multipart('Admin/add_books');
                  ?>
                    <div class="form-group">
                      <label for="Category" class="control-label">Category:</label>
                      <select class="form-control" id="recipient-name" name="category" required>
                          <option value="">----Please Select Category----</option>
                          <option value="Books">Books</option>
                          <option value="Magzines">Magzines</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="Image" class="control-label">Image:</label>
                      <input type="file" class="form-control" name="image_path" accept="image/jpg, image/jpeg, image/png" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="URL" class="control-label">URL:</label>
                      <input type="url" class="form-control" name="url" id="message-text" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="Display in Recommended" class="control-label">Display in Recommended:</label>
                      <label class="radio-inline">
                          <input type="radio" name="display" value="Yes">Yes
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="display" value="No" checked>No
                      </label>
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
            Add Books/Magazine
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
                  <td>Image</td>
<!--                  <td>URL</td>-->
                  <td>Recommended</td>
                  <td>Action</td>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=0;
                foreach($books as $books){
                    $i++;
                ?>
                <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $books['category']?></td>
                <td><a href="<?php echo $books['url']?>" target="_blank"><img src="<?php echo base_url();?>uploads/books/<?php echo $books['image_path']?>" height="100" width="100"></a></td>
<!--                <td><?php echo $books['url']?></td>-->
                <td><?php echo $books['display']?></td>
                <td>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalupdate<?php echo $books['book_id']?>"><i class="fa fa-fw fa-pencil-square-o"></i></button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModaldelete<?php echo $books['book_id']?>"><i class="fa fa-trash"></i></button>
                
                <!----------------Update Model----------------------->
                <div class="modal fade" id="myModalupdate<?php echo $books['book_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Add News</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                  <?php
                  $abc=array('Books','Magzines');
                  echo validation_errors();
                  echo form_open_multipart('Admin/update_books');
                  ?>
                    
                    <tr>
                      <th><label for="Category" class="control-label">Category:</label></th>
                      <td><select class="form-control" id="recipient-name" name="category" required style="width: 100%;">
                          <option value="<?php echo $books['category']?>"><?php echo $books['category']?></option>
                          <?php
                           foreach ($abc as $a){ 
                               if( $a != $books['category']){ ?>
                          <option value="<?php echo $a;?>"><?php echo $a;?></option>      
                           <?php } }
                          ?>
                      </select>
                      </td>
                    </tr>
                    <tr>
                      <th><label for="News Heading" class="control-label">Existing Image:</label></th>
                      <td><img src="<?php echo base_url();?>uploads/books/<?php echo $books['image_path']?>" height="100" width="100"></td>
                    </tr>
                    
                    <tr>
                      <th><label for="URL" class="control-label">Change Image:</label></th>
                      <td><input type="file" class="form-control" name="image_path" accept="image/jpg, image/jpeg, image/png"></td>
                    </tr>
                    
                    <tr>
                      <th><label for="URL" class="control-label">URL:</label></th>
                      <td><input type="url" class="form-control" style="width: 100%;" name="url" value="<?php echo $books['url']?>" id="message-text" required></td>
                    </tr>
                    
                    <tr>
                      <th><label for="Publisher" class="control-label">Display in Recommended:</label></th>
                      <td>
                          <?php
                          if($books['display'] =='Yes'){ ?>
                           <label class="radio-inline">
                               <input type="radio" name="display" value="Yes" checked>Yes
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="display" value="No">No
                      </label>   
                         <?php }else{
                          ?>
                          <label class="radio-inline">
                          <input type="radio" name="display" value="Yes">Yes
                      </label>
                      <label class="radio-inline">
                          <input type="radio" name="display" value="No" checked>No
                      </label>
                          <?php }?>
                      </td>
                    </tr>
                    
                   <tr>
                       <td></td>
                  <td>
                 <?php
                 $encrypted_string = $this->encrypt->encode($books['book_id']);
                 ?>
                <input type="hidden" name="book_id" value="<?php echo $encrypted_string;?>">
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
                <div class="modal fade" id="myModaldelete<?php echo $books['book_id']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Warning !</h4>
              </div>
              <?php
                  echo form_open('Admin/delete_books');
                  ?>
              <div class="modal-body">
                <h4>Are you sure, You want to delete this Book/Magzine ?</h4>
              </div>
              <div class="modal-footer">
                <?php
                 $encrypted_string = $this->encrypt->encode($books['book_id']);
                 ?>
                <input type="hidden" name="book_id" value="<?php echo $encrypted_string;?>">
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
		document.getElementById('nav-books').className += " active";
	</script>
<!-----------------------Onload Popup-------------------->
    <?php
    if(isset($_SESSION['Success'])){
    ?>
        <script>
        alert("Book/Magazine has been added successfully !");
        </script>
    <?php unset($_SESSION['Success']); }?>
        
    <?php
    if(isset($_SESSION['fileError'])){
    ?>
        <script>
        alert("<?php echo $_SESSION['fileError'];?>");
        </script>
    <?php unset($_SESSION['fileError']); }?>
        
    <?php
    if(isset($_SESSION['Update'])){
    ?>
        <script>
        alert("Book/Magazine has been updated successfully !");
        </script>
    <?php unset($_SESSION['Update']); }?>
        
    <?php
    if(isset($_SESSION['Delete'])){
    ?>
        <script>
        alert("Book/Magazine has been deleted successfully !");
        </script>
    <?php unset($_SESSION['Delete']); }?>
        
   <!-----------------------Onload Popup End-------------------->        
        
</html>

