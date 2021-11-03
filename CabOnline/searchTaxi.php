<!--
Jazmin Vagha 16941106
this php file contains the sql statements for showing unassigned booking requests. Once the user  has
pressed the show booking requests button, the query will be executed and show the admin all the records
only if the status is unassigned and only if the booking is for the current day and if the booking is 
later than the current time. If records exist, a table will be shown with the records. Otherwise, an
error message will tell you that there are no requests for today.
-->

<?php
	
	require_once('/home/kdk8411/conf/sqlinfo.inc.php');

	$conn = mysqli_connect($host, $user, $pass, $db);
	$sql = "SELECT * FROM cabsOnline WHERE status = 'unassigned' AND date = CURDATE() AND time > CURTIME() ORDER BY date, time";
	$queryResult = mysqli_query($conn, $sql);
	if(mysqli_num_rows($queryResult) != 0){
	echo "<br><table width='100%' border='3'>";
	echo "<tr><th>Reference No</th><th>Customer Name</th> <th>Phone No</th><th>Unit No</th><th>Street No</th><th>Street Name</th><th>Suburb</th><th>Destination</th><th>Date of pick-up</th><th>Time of pick-up</th></tr>";
	while ($row = mysqli_fetch_assoc($queryResult)){
		echo "<tr>";
		echo"<td>{$row["reference"]}</td>";
		echo"<td>{$row["custName"]}</td>";
		echo "<td>{$row["phoneNo"]}</td>";
		echo "<td>{$row["unitNo"]}</td>";
		echo "<td>{$row["streetNo"]}</td>";
		echo "<td>{$row["streetName"]}</td>";
		echo "<td>{$row["suburb"]}</td>";
		echo "<td>{$row["destSuburb"]}</td>";
		echo "<td>{$row["date"]}</td>";
		echo "<td>{$row["time"]}</td>";
		echo "</tr>";
		}
	echo"</table>";
	}
	else{
		echo"<br>There are no booking requests for today.";
	}
	mysqli_close($conn);
?>