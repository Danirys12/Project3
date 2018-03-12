<?php 

	include "dbconfig.php";
	$con = mysqli_connect($dbhostname,$dbusername, $dbpassword,$dbname)
	or die ("cannot connect to database");

		
    $login =$_POST['login'];
	$password =$_POST['password'];
	

	$result = mysqli_query($con,"SELECT * from EMPLOYEE where 
			login='$login' ") or die("failed to query database");

	
	$login= mysqli_real_escape_string($con,$_POST['login']);
	$password = mysqli_real_escape_string($con,$_POST['password']);

	$row=mysqli_fetch_array($result);


	$ip = $_SERVER['REMOTE_ADDR'];
	$ip_parts = explode(".",$ip );


 
 	 if ($ip_parts[0] == 131 && $ip_parts[1] == 125) {
 	  	echo " Your IP address is ".$ip." <br> You are from Kean <br>";
 	  }  
 	  else if ($ip_parts[0] == 10) 
 	  {
 	  	echo " Your IP address is ".$ip." <br>You are from Kean <br> ";
 	  }
 	  else
 	 {
		echo " Your IP address is ".$ip." <br>You are NOT from Kean <br> ";
 	 }


	
	/*$ip = $_SERVER['REMOTE_ADDR'];
	if (preg_match('/^131/', $ip)) 
		{
			echo " Your IP address is ".$ip." <br>You are from Kean <br>";
		}
			elseif (preg_match('/^10/', $ip)) 
			{
				echo " Your IP address is ".$ip." <br>You are from Kean <br>";
			}
				else
				{
					echo " Your IP address is ".$ip." <br>You are NOT from Kean <br>";
				}
	*/

	if($row['login']==$login && $row['password']==$password)
	{
		setcookie('login',$login,time()+ 3600,"/" );
		echo "Login Successful! <br> Welcome: ".$row['name'] ;
		echo "<br> Role: ".$row['role']."<br>";


		echo "<br> <a href='add_product1.php'> Add Product</a>";
		echo "<br> <a href='display_product.php'> Display Product</a>";
		echo "<br> <br> <a href='logout.php'> Logout!</a>";

	}
		elseif ($row['login'] !== $login && ($row['password']!==$password || $row['password']==$password))
		{

			echo "Login ID: ".$login. " Not in Database";
		}
			elseif($row['login'] == $login && $row['password']!==$password)
			{
				
				echo "User: ".$login. " Exists. But password does NOT match";
			}

  
		
	


 ?>


