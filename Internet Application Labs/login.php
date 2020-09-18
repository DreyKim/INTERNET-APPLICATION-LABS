<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>LOGIN PAGE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="validate.js"></script>
  <link rel="stylesheet" type="text/css" href="validate.css">
</head>
<body>
	<?php


    include "DBConnector.php";
	  include ('loginClass.php');



	if(isset($_POST['btn-login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$loginClass = new login($username, $password);



		$loginClass->login();

	}


	?>

	<div class="container">

	<form method="post" name="login" id="login" action="<?php echo $_SERVER['PHP_SELF'];?>">

			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" name="username" placeholder="Username">
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" name="password" placeholder="Password">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-success" name="btn-login">Login</button>
			</div>

			<div class="form-group">
				<a href="SignupPage.php">Dont have an account ?</a>
			</div>

	</form>

	</div>


</body>
</html>
