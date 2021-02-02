<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "ahwc");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
	 if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["searchFor"])) {
		$nameErr = "Please fill";
		}
	  	// Attempt get query execution
		$sql = "SELECT * FROM users WHERE name LIKE '".$_POST["searchFor"]."'";
		$result = mysqli_query($link, $sql);
		// print_r(mysqli_fetch_array($result));
		echo "<table class='table table-bordered table-dark'>
		<tr>
		<th>Name</th>
		<th>Email</th>
		</tr>";
		while($row = mysqli_fetch_array($result)) {
		  echo "<tr>";
		  echo "<td>" . $row['name'] . "</td>";
		  echo "<td>" . $row['email'] . "</td>";
		  echo "</tr>";
		}
		echo "</table>";
	 
}

 
// Close connection
mysqli_close($link);
?>