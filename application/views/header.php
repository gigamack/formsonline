<?php
	$Fullname = $_SESSION['userSession']['PSUPassport']['GetUserDetailsResult']['string'][1] 
	. ' ' . $_SESSION['userSession']['PSUPassport']['GetUserDetailsResult']['string'][2]
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<!-- <header>
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
        <a class="nav-link" href="<?php echo base_url('formControl/stdCardMain');?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('formControl/stdCardForm');?>">Add new request</a>
      </li>
      <li class="nav-item active">
        <a class="btn btn-danger" href="<?php echo base_url();?>/Authentication/logout" role="button">Log Out</a>
      </li>
    </ul>
  </div>
</nav>
</header> -->
<header>
		<nav class="navbar navbar-expand-lg  navbar-dark " style="background-color: #003c71;">
			<a href="<?php echo base_url("/formControl/formindex") ?>" class="navbar-brand">
				<img id="Image1" src="../assets/images/PSU_EN-H.gif" style="width:70px;" />
				Online Forms System
			</a>
			<button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url("/formcontrol/formindex"); ?>">Home</a>
					</li>
          <li class="nav-item">
						<a class="nav-link" href="<?php echo base_url("/formcontrol/stdCardForm"); ?>">Add new request</a>
					</li>
				</ul>
				<div class="dropdown" style="padding-right:40px">
					<a class="nav-link dropdown-toggle" style="color: white !important;" href="#" id="fullname" data-toggle="dropdown"
					 aria-haspopup="true" aria-expanded="false">
						<?php echo $Fullname ?>
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="<?php echo base_url();?>/Authentication/logout">Logout</a>
					</div>
				</div>
			</div>
		</nav>
	</header>

<!-- /<nav class="navbar navbar-dark" style="background-color: #69b3e7;"> -->
  <!-- Navbar content -->
<!-- </nav> -->
</body>
</html>