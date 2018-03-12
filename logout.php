<?php  


	if (isset($_COOKIE['login'])) {
		
	setcookie('login',$login,time()- 3600,"/" );

	echo "You have successfully Logged out!";

	echo "<br> Login? Click Here: <a href='p2.php'> Home Page</a>";
	
	}
	
	

 ?>