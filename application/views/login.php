<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
	<form action="<?php echo base_url() ?>Authentication" method="post">
		<div class="container col-md-4 mx-auto mt-5">
			<div class="card">
				<div class="card-header bg-success">
					<div class="text-center">
						<h5>Login with PSU Passport</h5>
					</div>
				</div>
				<div class="card-body">
					<?php
					if (isset($_SESSION['errors']) && $_SESSION['errors'] == 'Fail') {
						?>
						<div class="alert alert-danger" role="alert">
							Invalid username or password !
						</div>
					<?php
				}
				?>
					<div class="form-group">
						<label for="">Username</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="PSU passport username">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="PSU passport password">
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-success btn-lg">Sign In</button>
					</div>
				</div>
			</div>
		</div>
		</div>
	</form>
</body>

</html>