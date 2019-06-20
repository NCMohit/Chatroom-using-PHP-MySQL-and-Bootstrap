<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "people";
	$conn = new mysqli($servername, $username, $password,$dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	//$sql = "CREATE TABLE IF NOT EXISTS chat (data VARCHAR(255))";
	//$result = $conn->query($sql);
	$sql = "DROP TABLE chat";
	if ($conn->query($sql) === TRUE) {
	    echo "Chat cleared";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

?>