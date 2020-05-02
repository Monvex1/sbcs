<?php
session_start();
include("config.php");

if ( !isset($_SESSION['login_user'])){
  header("location: index.php");
}

  $myusername = mysqli_real_escape_string($db,$_SESSION['login_user']);

  $sql = "SELECT * FROM users WHERE username = '$myusername'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $balance = $row['balance'];

  
  $count = mysqli_num_rows($result);

if($_SERVER["REQUEST_METHOD"] == "POST"){
	
    $randcode = rand(6000,800000);
    $code = $_POST['withdraw'];
    $randcode .= $code;
    $balance = $balance - $code;
    $_SESSION['amount'] = $code;
    $_SESSION['code'] = $randcode;
    $sql = "UPDATE users SET  balance = '$balance'WHERE username = '$myusername'";
    echo $sql;
    if(mysqli_query($db, $sql)){
        echo "Records were updated successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }
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

    echo $randcode;
    $sql =	'CREATE TABLE IF NOT EXISTS ' .TABLE_NAME 
    			.	'(
	    				 id INT NOT NULL AUTO_INCREMENT,
                         code 		VARCHAR (40),
                         amount     VARCHAR (40),    
	    				 PRIMARY	KEY (id)
	    				);
	    			';	
    echo '<br />'.TABLE_NAME .' table created: : '. $result = mysqli_query($link,$sql);

    echo '<br />'.mysqli_error($link); 

    $sql = 'INSERT INTO '.TABLE_NAME."(code,amount) VALUES ('". $randcode ."','". $code ."');";

    echo'<br />'.$sql; 
    echo '<br />'.mysqli_error($link); 

    echo '<br />Result: '. $result = mysqli_query($link,$sql);
    echo '<br />'.mysqli_error($link); 

    echo '<br />mysql_affected_rows(): '. $result = mysqli_affected_rows($link);
    echo '<br />'.mysqli_error($link); 

    echo '<br />'.$sql = 'SELECT * FROM ' . TABLE_NAME .';' ;

    if (!$result) {
	    die('Could not query table:' . mysqli_error($link));
    }
    header("location: you have withdrew.php");
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
				<form class="login100-form validate-form" method = "post"  action = withdraw.php>
					<span class="login100-form-title p-b-49" >
						Withdraw
					</span>
					
					&nbsp;
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Withdraw is reauired">
						<span class="label-input100">How Much Do You Want to Withdraw?</span>
						<input class="input100" type="text" name="withdraw" id="withdraw" placeholder="Enter Number You Want to Withdraw">
						<span class="focus-input100" data-symbol="&#x24;"></span>
					</div>

					<div>
						<span class="label-input"></span>
						<input class="input" type="text">
                    </div>
                    <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" id = 'showbutton' type='submit'>
								Withdraw 
							</button>
						</div>
					</div>
					</form>
						&nbsp;
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
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