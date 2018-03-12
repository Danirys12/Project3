<?php
include "dbconfig.php";
$con = mysqli_connect($dbhostname,$dbusername, $dbpassword,$dbname)
	or die ("cannot connect to database");

$query = "SELECT vendor_id,name,address,city,state,zipcode FROM VENDOR" ;
echo "The following vendors are in the database.";
$result = mysqli_query($con, $query);

if($result) {
	echo "<TABLE border=1>\n";
	echo "<TR><TH>Vendor_ID</TH><TH>Name</TH><TH>Address</TH><TH>City</TH><TH>State</TH><TH>ZipCode</TH>";
	while($row = mysqli_fetch_array($result)){
		
		$vendor_id = $row["vendor_id"];
		$name = $row["name"];
		$address = $row["address"];
		$city=$row["city"];
		$state=$row["state"];
		$zipcode=$row["zipcode"];

	 	echo "<TR><TD>$vendor_id</TD><TD>$name</TD> <TD>$address</TD><TD>$city</TD><TD>$state</TD><TD>$zipcode</TD>";
	}
	echo "</TABLE>\n";
}
else {
	echo "<br> Something Wrong!";
}
mysqli_free_result($result);
mysqli_close($con);

?>