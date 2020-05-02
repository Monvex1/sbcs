<?php include ('server.php');
	  include ('config.php');
	  
	  if ( !isset($_SESSION['login_user'])){
		header("location: index.php");
	}

	  $myusername = mysqli_real_escape_string($db,$_SESSION['login_user']);

      $sql = "SELECT * FROM users WHERE username = '$myusername'";
      $result = mysqli_query($db,$sql);
	  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  $balance = $row['balance'];
      
      $count = mysqli_num_rows($result);
      


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

<style>
	.button {
	  background-color: #4CAF50; /* Green */
	  border: none;
	  color: white;
	  padding: 15px 32px;
	  text-align: center;
	  text-decoration: none;
	  display: inline-block;
	  font-size: 16px;
	  margin: 4px 2px;
	  cursor: pointer;
	}
	
	.button2 {background-color: #008CBA;} /* Blue */
	.button3 {background-color: #f44336;} /* Red */ 
	.button4 {background-color: #e7e7e7; color: black;} /* Gray */ 
	.button5 {background-color: #555555;} /* Black */
	</style>

</head>

<body>
	<?php if (isset($_SESSION['success'])): ?>
	<body class="error success">
		<h3>
			<?php
				echo $_SESSION['success'];
				unset ($_SESSION['success']);
            ?>  
		</h3>
     <?php endif ?>

<?php if (isset($_SESSION["username"])): ?>
        <?php endif ?>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
					<span class="login100-form-title p-b-49">
						Main Account Page
					</span>
					
					&nbsp;
					
					<h3>Your Account Balance:</h3>
					<button class="button"><h3><?php echo $balance ?></h3></button>
					&nbsp;
					<img src="card.png" alt="card.png" width="165" height="100">

					<div>
						<span class="label-input"></span>
						<input class="input" type="text">
					</div>
					
					&nbsp;
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<form method="get" action="deposit.php">
							<button type="submit" class="login100-form-btn">
							Deposit Page
							</button>
							</form>
							</form>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div ></div>
							
							<a href="deposit.php"></a>
						</div>
					</div>
					&nbsp;
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<form method="get" action="withdraw.php">
							<button type="submit" class="login100-form-btn">
							Withdraw Page
							</button>
						</form>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div></div>
							<a href="withdraw.php">
							</a>
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
                            <?php if (isset($_SESSION["username"])): ?>
            <p> Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
            <p><a href="login.html" style="color: red;">Logout</a></p>
        <?php endif ?>
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