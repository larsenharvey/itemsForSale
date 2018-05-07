<?php
	$name = $_GET["name"];
	$desc = $_GET["desc"];
	$price = $_GET["year"];
	$qty = $_GET["qty"];
	
	$query  = "INSERT INTO product VALUES(1, $name, $desc, $price, $qty)";
	//run query to get last row, find the vette id, and add 1 in order to add to last row on the table
	
	$my_connection = mysqli_connect("localhost", "root", "mountjudah", "sales");
	//localhost, username, password, database_name ^
	$result = mysqli_query($my_connection, $query);
	
	
	$query = "SELECT * FROM product";
	//from slides - shows output with html "table"
	$result = mysqli_query($my_connection, $query);
	$num_rows = mysqli_num_rows($result);
	$num_fields = mysqli_num_fields($result);
	$row = mysqli_fetch_assoc($result); //gets first row of resulting table
	$keys = array_keys($row); //gets the keys for the aray
	for($i = 0; $i < $num_fields; $i++){
		print $keys[$i] . " ";
	} // prints out column names
	print "<br />"; //adds line break after column names
	for($row_num=0; $row_num < $num_rows; $row_num++){
		$values = array_values($row); // get values of the key/values pairs
		for($i=0; $i < $num_fields; $i++){
			$value = htmlspecialchars($values[$i]);
			print $value . " ";
		} //prints out all the values from that row
		print "<br />";
		$row = mysqli_fetch_assoc($result);
	}
?>