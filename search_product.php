<?php
include "dbconfig2.php";
$con = mysqli_connect($dbhostname,$dbusername, $dbpassword,$dbname)
	or die ("cannot connect to database");


	//connect
	if(isset($_GET['keywords']))
	{
		$searchq = $_GET['keywords'];
		$searchq = preg_replace("#[^a-z0-9]#i", "", $searchq);
		

		$query = ("SELECT id,p.name as productName,description,sell_price,cost,quantity, v.name as vendorName 
			from Products_alcantad p, TECH3720.VENDOR v 
			where (p.vendor_id=v.vendor_id) and  (p.name LIKE '%$searchq%' OR description LIKE '%$searchq%')
				") or die ("could not search");


		$result = mysqli_query($con,$query);
		$count = mysqli_num_rows($result);


		
		if ($count == 0) {
			echo "There are no search results for keyword: ".$searchq;
		}
		else
		{
			echo "Product search for keyword: ".$searchq;
			echo "<TABLE border=1>\n";
			echo "<TR><TH>P_ID</TH><TH>Name</TH><TH>Description</TH><TH>Sell Price</TH><TH>Cost</TH><TH>Quantity</TH><TH>Vendor Name</TH>";
			while ($row = mysqli_fetch_array($result))
			{
				$id = $row["id"];
				$name = $row["productName"];
				$description = $row["description"];
				$sell_price=$row["sell_price"];
				$cost=$row["cost"];
				$quantity=$row["quantity"];
				$vendor_name=$row["vendorName"];

			echo "<TR><TD>$id</TD><TD>$name</TD> <TD>$description</TD><TD>$sell_price</TD><TD>$cost</TD><TD>$quantity</TD><TD>$vendor_name</TD>";

			}
			echo "</TABLE>\n";
		}


	}




?>