<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = test_input($_POST["name"]);
		$chat = test_input($_POST["chat"]);
	}
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	if ($name!="" and $chat !=""){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "people";
		$conn = new mysqli($servername, $username, $password,$dbname);
		$totchat = $name."- ".$chat;
		$sql = "INSERT INTO chat (data) VALUES ('$totchat')";
		if ($conn->query($sql) === TRUE) {
		    echo "New chat record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	header("Location: chatroom.php");
	exit;
?>