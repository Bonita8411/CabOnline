<!--
Jazmin Vagha 16941106
this php file includes the sql commands when assigning a taxi. when the assign taxi has been 
pressed provided it is a valid reference number that has been entered in the text box, the 
status of the booking will be changed from unassigned to assigned. If no reference number has 
been entered, an error message will be displayed to input a reference number. If a reference
number has been entered that does not exist in the table, there will be an error message saying
that the reference number wasn't found.
-->

<?php
	
	require_once('/home/kdk8411/conf/sqlinfo.inc.php');

	$conn = mysqli_connect($host, $user, $pass, $db);
	
	$search = $_GET["reference"];

	$sql = "SELECT * FROM cabsOnline WHERE reference = $search";
	$queryResult = mysqli_query($conn, $sql);

	if($_GET["reference"] == ""){
		echo"<br>Please input a reference number to assign.";
	}	
	else if(mysqli_num_rows($queryResult) ==0){
		echo"<br>The reference number ".$search." was not found!<br>";
	}
	else if($_GET["reference"]!=""){
		$sql = "UPDATE taxiBooking2 SET status = 'assigned' WHERE reference = $search";
		$queryResult = mysqli_query($conn, $sql);
		echo "<br>The booking request ". $search. " has been properly assigned.";
	}	
	
	mysqli_close($conn);
?>