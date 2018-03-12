<?php
include "dbconfig.php";
$con = mysqli_connect($dbhostname,$dbusername, $dbpassword,$dbname)
	or die ("cannot connect to database");

$query = "SELECT login,password,employee_id,name,role FROM EMPLOYEE" ;
echo "The following employees are in the database.";
$result = mysqli_query($con, $query);

if($result) {
	echo "<TABLE border=1>\n";
	echo "<TR><TH>Employee_ID</TH><TH>Login</TH><TH>Password</TH><TH>Name</TH><TH>Role</TH>";
	while($row = mysqli_fetch_array($result)){
		
		$login = $row["login"];
		$password = $row["password"];
		$employee_id = $row["employee_id"];
		$name=$row["name"];
		$role=$row["role"];

	 	echo "<TR><TD>$employee_id</TD><TD>$login</TD> <TD>$password</TD><TD>$name</TD><TD>$role</TD>";
	}
	echo "</TABLE>\n";
}
else {
	echo "<br> Something Wrong!";
}
mysqli_free_result($result);
mysqli_close($con);

?>