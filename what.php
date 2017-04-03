<?php 
session_start();


                           
                            if(isset($_POST['arrivaldate'])){
                            	$arrival = $_POST['arrivaldate'];
                            	$departure = $_POST['departuredate'];
                            	$_SESSION['arrivaldate'] = $arrival;
                            	$_SESSION['departuredate'] = $departure;
                            	require'connect/connect.php';
                            	//$query = "SELECT booking_date from bookings where 
                            	//booking_date <'$arrival'";

								$query = "SELECT DISTINCT rm_no, description, amount 
								                 from bookings, room_type, rooms
								                where bookings.rm_no = rooms.rm_id 
								                and rooms.rm_type = room_type.rm_type_id
								                and rm_no not in(
								                    select rm_no from bookings 
								                    where booking_date < '$departure'
								                    AND checkout > '$arrival')";

                            	$data = $dbc->query($query);
                            	if($data){
                            		$rows = $data->fetch_all(MYSQLI_ASSOC);
                            		echo"<div><h2>These rooms are available on your dates</h2>";
                            		foreach($rows as $row){
                            			
                            			echo "<p>" . $row['rm_no'] . "</p>";
                            			echo "<p>" . $row['description'] . "</p>";
                            			echo "<p>" . $row['amount'] . "</p>";
                            			echo"</div>";
                            			include'templates/'. $row['description'] .'.php';
                            		}

                            	}else{
                            		echo"your query failed but you are not a failure";
                            	}
                            }else{
                            	echo "hello marie";
                            }

?>                           
