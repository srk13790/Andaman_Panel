<html>
<head>
<title>Regex to allow special characters, spaces and alphanumeric</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script type="text/javascript">
$(function() {
$('#btnValidate').click(function() {
var txt = $('#txtdesc').val();
var re = /^[ A-Za-z0-9_@./#&+-]*$/
if (re.test(txt)) {
alert('Valid Text')
return True;
}
else {
alert('Please Enter Valid Text');
return false;
}
})
})
</script>
</head>
<body>
<div>
<?php
  echo form_open_multipart('Admin/add_books');
?>
Enter Text :<input type="text" id="txtdesc" />
<input type="submit" id="btnValidate" value="Validate" />
<?php
echo form_close();
?>
</div>
</body>
</html>