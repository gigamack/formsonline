<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>
<?php echo form_open_multipart('upload/do_upload');?>
<!-- <form action="upload/do_upload" method="post"> -->
<input type="file" name="userfile" size="20" />
<br /><br />

<input type="submit" value="upload" />
</form>
</body>
</html>