<?php
	$UserID = $_SESSION['userSession']['PSUPassport']['GetUserDetailsResult']['string'][0];
	$Fullname = $_SESSION['userSession']['PSUPassport']['GetUserDetailsResult']['string'][1] 
	. ' ' . $_SESSION['userSession']['PSUPassport']['GetUserDetailsResult']['string'][2]
?>
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
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" />
	<title>PSU Phuket Online Forms</title>
</head>

<body>

	<header>
		<nav class="navbar navbar-expand-lg  navbar-dark " style="background-color: #003c71;">
			<a href="<?php echo base_url("/FormControl/stdCardMain") ?>" class="navbar-brand">
				<img id="Image1" src="../assets/images/PSU_EN-H.gif" style="width:70px;" />
				Online Forms System
			</a>
			<button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url("/FormControl/stdCardMain"); ?>">Home</a>
					</li>
				</ul>
				<div class="dropdown" style="padding-right:40px">
					<a class="nav-link dropdown-toggle" style="color: white !important;" href="#" id="fullname" data-toggle="dropdown"
					 aria-haspopup="true" aria-expanded="false">
						<?php echo "($UserID) ".$Fullname ?>
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="<?php echo base_url();?>/Authentication/logout">Logout</a>
					</div>
				</div>
			</div>
		</nav>
	</header>

	<div class="card " style="width: 18rem; margin: 20px auto auto auto;">
		<h5 class="card-header bg-primary text-white">
			งานทะเบียนกลาง
		</h5>
		<ul class="list-group list-group-flush">
			<li class="list-group-item">
				<a href="<?php echo base_url("/FormControl/stdCardForm");?>" class="card-link">คำร้องขอบัตรนักศึกษาชั่วคราว</a>
			</li>
			<li class="list-group-item">
				<a href="<?php echo base_url("/FormControl/changenameform");?>" class="card-link">คำร้องขอแจ้งการเปลี่ยนชื่อ-สกุล</a>
			</li>
			<li class="list-group-item">
				<a href="<?php echo base_url("/FormControl/graduateform");?>" class="card-link">คำร้องขอสำเร็จการศึกษา</a>
			</li>
		</ul>
	</div>
	<div class="footer">
		<div class="container">
			<p class="text-muted"><b>&copy; 2018 - Learning Centre Prince of Songkla University, Phuket Campus</b> </p>
		</div>
	</div>
</body>

</html>
