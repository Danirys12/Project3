<?php
include "dbconfig2.php";
	$con = mysqli_connect($dbhostname,$dbusername, $dbpassword,$dbname)
	or die ("cannot connect to database");

	$productName= mysqli_real_escape_string($con,$_POST['name']);
	$desc =mysqli_real_escape_string($con,$_POST['description']);
	$cost =mysqli_real_escape_string($con,$_POST['cost']);
	$sellPrice =mysqli_real_escape_string($con,$_POST['sell_price']);
	$qty =mysqli_real_escape_string($con,$_POST['quantity']);
	$vendorName=mysqli_real_escape_string($con,$_POST['vendor_id']);

	$query= "INSERT INTO Products_alcantad (name,description,cost,sell_price,quantity,vendor_id) VALUES ('$productName','$desc',$cost,$sellPrice,$qty,$vendorName) ";
		

	

if ($cost <= 0 )
{
	echo "Cost must be greater than 0" ;
}

elseif ( $qty <= 0 )
{
	echo "Quantity must be greater than 0" ;

}

elseif ( $sellPrice <= 0) 
{
	echo "Sell Price must be greater than 0";
}


elseif($sellPrice < $cost)
{
	echo "Sell Price must be greater than cost";
}					
			
else{


	$query2 = "SELECT * from Products_alcantad where name ='".$productName."'";
	$result= mysqli_query($con,$query2);
	$row=mysqli_fetch_array($result);
		
		if($productName == $row['name'] )		
			{

			echo "ERROR! A Product with same name already exists";
			echo "<br> <br> <a href='logout.php'> Logout!</a>";
			}
		else
			{


			$query= "INSERT INTO Products_alcantad (name,description,cost,sell_price,quantity,vendor_id) VALUES ('$productName','$desc',$cost,$sellPrice,$qty,$vendorName) ";

			$result= mysqli_query($con,$query);

				if ($result) 
				{
					echo "Successfully Inserted Product: ". $productName;
					echo "<br> <br> <a href='logout.php'> Logout!</a>";
				}
				else
				{
					echo "Record Not inserted successfully";
				}


			}
	
}





?>



