<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
  
  
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
 
  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $('.refreshCaptcha').on('click', function(){
            $.get('<?php echo base_url().'captcha/refresh'; ?>', function(data){
                $('#captImg').html(data);
            });
        });
    });
    </script>
    <script>
    $(document).ready(function(){
       
            $.get('<?php echo base_url().'captcha/refresh'; ?>', function(data){
                $('#captImg').html(data);
            });
    });
    </script>
  
</head>

<body>
  <body class="align">

  <div class="grid">

    <div id="login">

      <h2><span class="fontawesome-lock"></span>Sign In</h2>

        <?php
        //print_r($data);exit;
        echo form_open('Authenticate/login');
        ?>

        <fieldset>

          <p><label for="email">E-mail address</label></p>
          <p><input type="email" id="email" name="email" placeholder="mail@address.com"></p>

          <p><label for="password">Password</label></p>
          <p><input type="password" id="password" name="password" placeholder="password"></p>
          <p>Submit the word you see below:</p>
          <p id="captImg"></p>
          <a href="javascript:void(0);" class="refreshCaptcha" ><img src="<?php echo base_url().'assets/images/refresh.png'; ?>"/></a>
          <p><label for="password">Password</label></p>
          <p><input type="text" name="captcha" placeholder="Enter Captcha"></p>
          <p><input type="submit" value="Sign In"></p>

        </fieldset>

      <?php
        echo form_close();
        ?>

    </div> <!-- end login -->

  </div>
    <?php
    if(isset($_SESSION['invalid'])){
    ?>
     <link rel="stylesheet" href="<?php echo base_url();?>assets/css/popup_style.css">
    <div class='popup-onload'>
    <div class='cnt223'>

    <p>
    Invalid Login Credentials.
    <br/>
    <br/>
    <a href='' class='close'>Close</a>
    </p>
    </div>
    </div>
      <script src='https://code.jquery.com/jquery-1.8.2.js'></script>
<script  src="<?php echo base_url(); ?>assets/js/popup_index.js"></script>
    <?php unset($_SESSION['invalid']); }?>
      
    <?php
    if(isset($_SESSION['wrong_captcha'])){
    ?>
     <link rel="stylesheet" href="<?php echo base_url();?>assets/css/popup_style.css">
    <div class='popup-onload'>
    <div class='cnt223'>

    <p>
    Captcha Doesn't Match! Please Try Again.
    <br/>
    <br/>
    <a href='' class='close'>Close</a>
    </p>
    </div>
    </div>
      <script src='https://code.jquery.com/jquery-1.8.2.js'></script>
<script  src="<?php echo base_url(); ?>assets/js/popup_index.js"></script>
    <?php unset($_SESSION['wrong_captcha']); }?>  
      

</body>
  
  
</body>
</html>
