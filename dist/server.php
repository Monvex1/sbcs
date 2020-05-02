<?php 
	session_start();
    if (isset($_POST['register'])){

	
	define('TABLE_NAME', 	'users');
	
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
	
	$sql =	'CREATE TABLE IF NOT EXISTS ' .TABLE_NAME 
				.	'(
						 id INT NOT NULL AUTO_INCREMENT,
						 username 		VARCHAR (40),
						 email 		VARCHAR (40),
						 passcode 	VARCHAR (30),
						 balance    int(255),
						 PRIMARY	KEY (id)
						);
					';	
	'<br />'.TABLE_NAME .' table created: : '. $result = mysqli_query($link,$sql);
	
	'<br />'.mysqli_error($link); 
	$balance = 1000;

	$sql = 'INSERT INTO '
			 .	TABLE_NAME 
			 .	"	(username, email, balance,passcode ) 
			 			VALUES
			 			("
			 				."'". $_POST['username'] 		."', "
			 				."'". $_POST['email'] 	."', "
							."'". $balance ."' , "
							."'". $_POST['password_1'] ."'  " 
			 .	 ");";

	'<br />'.$sql; 
	'<br />'.mysqli_error($link); 
	
	'<br />Result: '. $result = mysqli_query($link,$sql);
	'<br />'.mysqli_error($link); 
	
	'<br />mysql_affected_rows(): '. $result = mysqli_affected_rows($link);
	'<br />'.mysqli_error($link); 
	
	'<br />'.$sql = 'SELECT * FROM ' . TABLE_NAME .';' ;
	
	if (!$result) {
	    die('Could not query table:' . mysqli_error($link));
	}
	header("location: index.php");	
}

?>

