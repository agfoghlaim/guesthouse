<?php
session_start();
//do this check properly marie !!
if(isset($_POST['fname'])){
	require 'connect/connect.php';
$roomtype = $_SESSION['roomtype'];
	
	$fn=$_POST['fname'];
	$ln=$_POST['lname'];
	$em=$_POST['email'];
	$ad=$_POST['address'];
	$country=$_POST['country'];
	$phone=$_POST['phone'];
	$postcode=$_POST['postcode'];
	$adults=$_POST['no_adults'];
	$children =$_POST['no_children'];
	$arrival=$_POST['arrival'];
	$sql = "INSERT INTO guests(fname,lname, email, address, country, phone, postcode, no_adults, no_CHILDREN, arrival) 
							  VALUES ('$fn', '$ln', '$em', '$ad', '$country', '$phone', '$postcode', '$adults', '$children', '$arrival')";
							  	//printf ("New Record has id %d.\n", $seconddb->insert_id);
	//$sql = "SELECT * FROM guests where fname = '$fn'";
	$response = $dbc->query($sql);
		if($response){
			echo "<p>details entered in db</p>";
			// $rows = $response->fetch_all(MYSQLI_ASSOC);
   //                          		echo"<div><h2>hi</h2>";
   //                          		foreach($rows as $row){
   //                          			//echo "<h1>".$_SESSION['arrivaldate']."</h1>";
   //                          			echo "<p>" . $row['fname'] . "</p>";
   //                          			echo "<p>" . $row['lname'] . "</p>";
   //                          			echo "<p>" . $row['email'] . "</p>";
   //                          			echo"</div>";
                            			
                            		//}
		}
} 
else{
	echo "your query failed but you are not a failure";
}


 ?>