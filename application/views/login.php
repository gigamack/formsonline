<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
	<?php
  if (isset($_SESSION['errors'])) {
      if ($_SESSION['errors'] == 'Fail') {
          echo "<script>alert('Invalid login!');</script>";
          $_SESSION['errors'] = '';
      }
  }
?>

	<form action="<?php echo base_url("/Authentication") ?>" method="post">
		<div class="container col-sm-6 col-md-4 col-md-offset-1" style="margin: 3rem auto auto auto">
			<div class="card">
				<div class="card-header" style="background-color: #003c71; color:#FFFFFF">
					<h6>PSU Passport Login</h6>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label for="">Username</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="PSU passport username">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="PSU passport password">
					</div>
					<button type="submit" class="btn btn-block btn-lg" style="background-color: #003c71; color:#FFFFFF">Sign In</button>
				</div>
			</div>
		</div>
		</div>
	</form>
</body>

</html>
