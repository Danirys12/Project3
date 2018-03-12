<?php
include "dbconfig2.php";
$con = mysqli_connect($dbhostname,$dbusername, $dbpassword,$dbname)
	or die ("cannot connect to database");

$query = "SELECT id,p.name as Product_Name,description,sell_price,cost,quantity, v.name as vendor_Name FROM Products_alcantad p, TECH3720.VENDOR v where p.vendor_id=v.vendor_id" ;

echo "<br> <a href='logout.php'> Logout!</a> <br> ";
echo "The following Products are in the database.";
$result = mysqli_query($con, $query);


if($result) {
	echo "<TABLE border=1>\n";
	echo "<TR><TH>P_ID</TH><TH>Name</TH><TH>Description</TH><TH>SellPrice</TH><TH>Cost</TH><TH>Quantity</TH><TH>VendorName</TH>";
	while($row = mysqli_fetch_array($result)){
		
		$P_ID = $row["id"];
		$name = $row["Product_Name"];
		$description = $row["description"];
		$sell_price = $row["sell_price"];
		$cost=$row["cost"];
		$quantity=$row["quantity"];
		$vendor_Name=$row["vendor_Name"];


		

	 	echo "<TR><TD>$P_ID</TD><TD>$name</TD> <TD>$description</TD><TD>$sell_price</TD><TD>$cost</TD><TD>$quantity</TD><TD>$vendor_Name</TD>";
	}
	echo "</TABLE>\n";

}

else {
	echo "<br> Something Wrong!";
}
mysqli_free_result($result);
mysqli_close($con);

?>