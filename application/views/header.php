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
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" />
	<title>PSU Phuket Online Forms</title>
	<style>
		@media screen and (max-width: 991.98px) {
			.nav-link {
				display: block;
				padding: 0;
			}
		}
	</style>
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-lg bg-success navbar-dark">
			<a href="<?php echo base_url("/FormControl/stdMain") ?>" class="navbar-brand">
				<img id="Image1" src="../assets/images/PSU_EN-H.gif" style="width:70px;" />
			</a>
			<a href="<?php echo base_url("/FormControl/stdMain") ?>" class="navbar-brand">
				<h5>Online Form System</h5>
			</a>
			<button class="navbar-toggler p-0 border-0" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="#navbarsExampleDefault" aria-expanded="false">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsExampleDefault">
				<ul class="navbar-nav mr-auto">
				</ul>
				<div class="dropdown">
					<a class="dropdown-toggle" style="color: white !important;" href="#" id="fullname" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						<?php echo "($UserID) " . $Fullname ?>
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="<?php echo base_url(); ?>/Authentication/logout">Logout</a>
					</div>
				</div>
			</div>
		</nav>
	</header>

</body>

</html>