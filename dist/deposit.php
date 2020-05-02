<?php
   session_start();
   include("config.php");

   if ( !isset($_SESSION['login_user'])){
	header("location: index.php");}


  $myusername = mysqli_real_escape_string($db,$_SESSION['login_user']);

  $sql = "SELECT * FROM users WHERE username = '$myusername'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $balance = $row['balance'];
  
  $count = mysqli_num_rows($result);
   if($_SERVER["REQUEST_METHOD"] == "POST") {
	 
	$loginer =$_SESSION['login_user'];
    define('TABLE_NAME','code');

	define('HOST_NAME', 	'johnny.heliohost.org');
	define('USER_NAME', 	'sbcs_3910334');
	define('PASSWORD', 	'hellobatlemous');
	define('DATABASE',	'sbcs_root');
	
    $link= mysqli_connect
    (
    	HOST_NAME, 
	    USER_NAME, 
	    PASSWORD
    )  or die('Cannot connect to the database  because: ' . mysql_error());
    mysqli_select_db ($link,DATABASE);
    
    $mycode = $_POST['code'];
      
	$sql = "SELECT * FROM code WHERE code = '$mycode'";
    $result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	echo $row['amount'];
    $balance = $balance + $row['amount'];  
      // If result matched $myusername and $mypassword, table row must be 1 row
	
	$sql = "DELETE FROM code WHERE code = '$mycode'";  
	if ($db->query($sql) === TRUE) {
		"Record deleted successfully";
	} else {
		"Error deleting record: " . $link->error;
	}
	$sql = "UPDATE users SET  balance = '$balance' WHERE username = '$loginer'";
    $sql;
    if(mysqli_query($db, $sql)){
        "Records were updated successfully.";
    } else {
        "ERROR: Could not able to execute $sql. " . mysqli_error($db);
	} 
	header("location: indexx.php"); 
   }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SBCS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/card.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method = "post" action = "deposit.php">
					<span class="login100-form-title p-b-49">
						Deposition
					</span>
					
					&nbsp;


					<div class="wrap-input100 validate-input" data-validate="Account is required">
						<span >&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; How much do you want to deposit</span>
						<input class="input100" type="number" name="code" placeholder="Type how much do you want to deposit">
						<span class="focus-input100" data-symbol="$"></span>
						
					</div>

					

					
					<div>
						<span class="label-input"></span>
						<input class="input" type="text">
					</div>
					
					&nbsp;
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Deposit
							</button>
						</div>
					</div>
					&nbsp;
					
						&nbsp;
						<div class="flex-c-m">
						<a href="https://www.facebook.com/Student-based-credit-card-system-109988937348687/?modal=admin_todo_tour" class="login100-social-item bg1">
								<i class="fa fa-facebook"></i>
							</a>
	
							<a href="https://twitter.com/SBCS93424734" class="login100-social-item bg2">
								<i class="fa fa-twitter"></i>
							</a>
	
							<a href="https://www.upm.edu.sa/" class="login100-social-item bg3">
								<i class="fa fa-google"></i>
							</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>