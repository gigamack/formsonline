<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    color: white;
    text-align: center;
}
</style>
    <title>Document</title>
</head>
<body>
<header>
<div class="navbar navbar-dark navbar-expand-md navbar-fixed-top" style="background-color: #69b3e7;">
<a href="<?php echo base_url('formControl/stdCardMain');?>" class="navbar-brand Stidti"><img id="Image1" src="../assets/images/PSU_EN-H.gif" style="width:70px;float:left;margin-top:7px " /></a>
<div style="margin-left:10px" class="Stidti text-light"><h1>Online Forms System</h1></div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #69b3e7;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="btn btn-danger" href="<?php echo base_url();?>" role="button">Log Out</a>
      </li>
    </ul>
  </div>
</nav>
</header>

<!-- <div class="card" style="margin: 20px auto auto auto">
    <button type="button" class="btn btn-primary btn-lg">คำร้องขอบัตรนักศึกษาชั่วคราว</button>
</div> -->
<div class="card" style="width: 18rem; margin: 20px auto auto auto;">
  <ul class="list-group list-group-flush">
    <a href="<?php echo base_url('formcontrol/stdCardFormAdmin');?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">คำร้องขอบัตรนักศึกษาชั่วคราว</a>
  </ul>
</div>
<div class="footer">
<div class="container">
        <p class="text-muted"><b>&copy; 2018 - Learning Centre Prince of Songkla University, Phuket Campus</b> </p>
      </div>
</div>

</body>
</html>