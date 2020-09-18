<!DOCTYPE html>

<?php

include "DBConnector.php";
include "user.php";
include "fileUploader.php";


$con = new DBConnector; /*Database Connector is made*/
	$first_name = "";
	$last_name = "";
	$city = "";
	$username = "";
	$password = "";
	$file = "";

if(isset($_POST['btn-save'])){
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$city = $_POST['city_name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$file = $_FILES["fileToUpload"]["name"];


	$fileName = $_FILES["fileToUpload"]["name"];

	echo  "<b>FileName is</b> " .$fileName. "<b>File is</b> " . $file;



	
	$user = new User($first_name, $last_name, $city, $username, $password, $file);
	$dbConn = new DBConnector("DB_SERVER", "DB_USER", "DB_PASS");



	/*Object for fileUploader class*/

	$userExist = $user->isUserExist();



	if($userExist ){
		echo " <br>". " User with that Username already exists, pick another Username. " . "<br>";



	}
	else {
		$res = $user->save();
		header("location: /Internet Application Labs/private_page.php");
		exit();

		if($res){
			header("location: /Internet Application Labs/private_page.php");
      exit();

		} else {
			echo "An error Occured";
		}
	}

	if(!$user->validateForm()){
		$user->createFormErrorSessions();
		header("Refresh: 0");
		die();

	}






}



?>

<html lang="en">
<head>
  <title>SIGNUP PAGE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="validate.js"></script>
  <link rel="stylesheet" type="text/css" href="validate.css">

</head>
<body>

	<div class="container">

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="user_details" onsubmit = "return validateForm()" enctype="multipart/form-data">


					<div id="form-errors">
						<?php
						session_start();
						if(!empty($_SESSION['form_errors'])){
							echo " " . $_SESSION["form_errors"];

							unset($_SESSION["form_errors"]);
						}

						?>
					</div>

			<div class="form-group">
				<label for="fname">First Name</label>
				<input type="text" class="form-control" name="first_name" placeholder="First Name" autocomplete="off" value="<?php echo $first_name;?>">
			</div>

			<div class="form-group">
				<label for="lname">Last Name</label>
				<input type="text" class="form-control" name="last_name" placeholder="Last Name" autocomplete="off" value="<?php echo $last_name;?>">
			</div>

			<div class="form-group">
				<label for="cityName">City Name</label>
				<input type="text" class="form-control" name="city_name" placeholder="city" autocomplete="off" value="<?php echo $city;?>">
			</div>

			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" name="username" placeholder="username" autocomplete="off" value="<?php echo $username;?>">
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" value="<?php echo $password;?>">
			</div>

			<div class="form-group">
				<label>Profile Image</label>
					<input type="file" name="fileToUpload" id="fileToUpload" value="<?php echo $file;?>">

			</div>


			<button type="submit" class="btn btn-success" name="btn-save"> <strong>Save</strong> </button>


			<div class="form-group">
				<td> <a href="login.php">Already Have an Account ?</a> </td>
			</div>

	</form>

</div>



</body>
</html>
