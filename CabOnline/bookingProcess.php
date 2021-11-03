<!--
Jazmin Vagha 16941106
this php file contains the sql commands for creating a table to store the customers input and insert them
in the table. When the user has entered all of the required information into the form, an sql table is created
if it doesnt exist already and their values are placed into the table. The inital value of status is unassigned. 
Once the values have been inserted, the if statements check to see if the query result has been executed and if
it has, the booking confirmation is returned to the customer with their booking reference number and the 
date and time of their pick up.
-->

<?php
		// sql info or use include 'file.inc'
		require_once('/home/kdk8411/conf/sqlinfo.inc.php');
	
		// The @ operator suppresses the display of any error messages
		// mysqli_connect returns false if connection failed, otherwise a connection value
		$conn = mysqli_connect($sql_host,
			$sql_user,
			$sql_pass,
			$sql_db);
			$sql_table = "cabsOnline";
			
		// Checks if connection is successful
		if (!$conn) {
			// Displays an error message
			echo "<p>Database connection failure</p>";
		} else {
			$createTbl = "CREATE TABLE IF NOT EXISTS cabsOnline(reference INT NOT NULL UNIQUE AUTO_INCREMENT,
			custName VARCHAR(50) NOT NULL,
			phoneNo INT(20) NOT NULL,
			unitNo INT(20),
			streetNo INT(20) NOT NULL,
			streetName VARCHAR(50) NOT NULL,
			suburb VARCHAR(50) NOT NULL,
			destSuburb VARCHAR(50) NOT NULL,
			date VARCHAR(20) NOT NULL,
			time VARCHAR(20) NOT NULL,
			status VARCHAR(20))";	
			
			$result = mysqli_query($conn, $createTbl); 
			if(!result)
			{
				echo"<br>Unable to create the table!";
			}

			$custName = $_GET["custName"];
			$phoneNo = $_GET["phoneNo"];
			$unitNo = $_GET["unitNo"];
			$streetNo = $_GET["streetNo"];
			$streetName= $_GET["streetName"];
			$suburb= $_GET["suburb"];
			$destSuburb= $_GET["destSuburb"];
			$date=$_GET["date"];
			$time=$_GET["time"];
			$status = "unassigned";

			$insert= "INSERT INTO $table(custName, phoneNo , unitNo , streetNo , streetName, suburb, destSuburb, date, time, status) 
					VALUES ('$custName', '$phoneNo ', '$unitNo ', '$streetNo ', '$streetName', '$suburb', '$destSuburb', '$date','$time', '$status')";

			$result = mysqli_query($conn, $insert); 
			if(!queryResult)
			{
				echo"<br>values not added";
			} else{		
				$id = mysqli_insert_id($conn);
				echo"<br>Thank you! Your booking reference number is ". $id .".";
				echo"<br>You will be picked up in front of your provided address at " .$time. " on ".date('d/m/Y', strtotime($date)).".";
		}
		
	mysqli_close($conn); 
?>
