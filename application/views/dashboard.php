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
    <style type="text/css">
      .topButton{
        height:70px;
        min-width: 106px;
        font-size: 15px;
        color:white;
      }
    </style>
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
        Dashboard
<!--        <small>advanced tables</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
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
        <div class="col-md-2 col-sm-3 col-xs-6">
          <a class="btn btn-app topButton" style="background-color: #00c0ef;" href="home">
                <i class="fa fa-home"></i> Home
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-2 col-sm-3 col-xs-6">
          <a class="btn btn-app topButton" style="background-color: #00a65a;" href="about_us">
                <i class="fa fa-font"></i> About Us
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-2 col-sm-3 col-xs-6">
          <a class="btn btn-app topButton" style="background-color: #f39c12;" href="about_andaman">
                <i class="fa fa-ship"></i> Andaman
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-2 col-sm-3 col-xs-6">
          <a class="btn btn-app topButton" style="background-color: #3d9970;" href="activities">
                <i class="fa fa-music"></i> Activities
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- /.col -->
        <div class="col-md-2 col-sm-3 col-xs-6">
          <a class="btn btn-app topButton" style="background-color: #001f3f;" href="events">
                <i class="fa fa-television"></i> Events
          </a>
          <!-- /.info-box -->
        </div>

        <div class="col-md-2 col-sm-3 col-xs-6">
          <a class="btn btn-app topButton" style="background-color: #dd4b39;" href="rewards">
                <i class="fa fa-trophy"></i> Rewards
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
		document.getElementById('nav-dashboard').className += " active";
	</script>
        
<!-----------------------Onload Popup-------------------->
    <?php
    if(isset($_SESSION['Success'])){
    ?>
        <script>
        alert("News has been added successfully !");
        </script>
    <?php unset($_SESSION['Success']); }?>
    
    <?php
    if(isset($_SESSION['Update'])){
    ?>
        <script>
        alert("News has been updated successfully !");
        </script>
    <?php unset($_SESSION['Update']); }?>
        
    <?php
    if(isset($_SESSION['Delete'])){
    ?>
        <script>
        alert("News has been deleted successfully !");
        </script>
    <?php unset($_SESSION['Delete']); }?>
    <!--------------------------Popup end------------------->
</html>

