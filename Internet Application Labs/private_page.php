<!DOCTYPE html>

<?php
session_start();
if(!isset($_SESSION['username'])){


}



if(isset($_POST['logout']))
{
	header("location: /Internet Application Labs/login.php");
  session_destroy();

}
function fetchUserAPIKey(){
	
	
}



?>


<html lang="en">
<head>
  <title>PRIVATE PAGE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src = "jquerry-3.1.1.min.js"></script>
  <script type = "text/javascript" src = "validate.js"></script>
  <script type = "text/javascript" src = "apikey.js"></script>
  
</head>
<body>




  <div style="text-align:center">
  <h1>LANDING PAGE.</h1>
  <h2>WELCOME!</h2>
  <br>
  <br>
  <hr>
  <h3>Here, we will create an API that will allow users and developers to order items from external systems</h3>
  <hr>
  <h4>We now put this feature to allow users to generate an API key. Click the button to generate the API Key</h4>
  <br>
  
  <button class = 'btn btn-primary' id = 'iap-key-btn'>GENERATE API KEY</button>
<br>
<br>
	<strong>Your API key:</strong>(Note if your API key is already in use in another running application,generating a new api key will cause for the the apllication from functioning)
	
<br>
<br>
<textarea cols = "100" row = "2" id = "api_key" name = "api_key" readonly><?php echo fetchUserAPIKey();?></textarea>
<br>
<h3>Service Description</h3>
This Api will allow external applications to order food and pull order statuses by using the order id.
<hr>
<br>

  <form method="post" action="">

      <img src="<?php echo 'upload/'.$_SESSION['file'];?>">
      <br>
      <input type="submit" name="logout" value="Logout">

  </form>
  
  


</div>







</body>
</html>
