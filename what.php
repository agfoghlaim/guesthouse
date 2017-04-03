<?php 
session_start();


                           
                            if(isset($_POST['arrivaldate'])){
                                   echo $_POST['arrivaldate'];
                            	$arrival = $_POST['arrivaldate'];
                            	$departure = $_POST['departuredate'];
                                   $roomtype = $_POST['roomtype'];
                            	$_SESSION['arrivaldate'] = $arrival;
                            	$_SESSION['departuredate'] = $departure;

                                   $_SESSION['roomtype'] = $roomtype;
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
								                    AND checkout > '$arrival')
                                                                             and description = '$roomtype'" ;

                                            // $query = "SELECT DISTINCT rm_no, description, amount 
                                            //          FROM bookings, room_type, rooms
                                            //               WHERE bookings.rm_no = rooms.rm_id 
                                            //               AND rooms.rm_type = room_type.rm_type_id
                                            //               AND rm_no not IN(
                                            //                 SELECT rm_no FROM bookings 
                                            //                 AND booking_date < '$departure'
                                            //                 AND checkout > '$arrival')";
                            	$data = $dbc->query($query);
                            	if($data){
                            		$rows = $data->fetch_all(MYSQLI_ASSOC);
                            		echo"<div><h2>These rooms are available on your dates</h2>";
                            		foreach($rows as $row){
                            			echo "<h1>".$_SESSION['arrivaldate']."</h1>";
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
