<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$regname = test_input($_POST["regname"]);
		$regpass = test_input($_POST["regpass"]);
	}
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	if(($regname=="") or ($regpass=="")){
		$message = "You have entered no username or password, Please try again";
	}
	else{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "people";
		$conn = new mysqli($servername, $username, $password,$dbname);
		$sql = "SELECT * FROM userpass";
		$result = $conn->query($sql);
		$userexists = 0;
	    while($row = $result->fetch_assoc()) {
	        if($regname==$row["username"]){
	        	$message = "Username already exists, Please try another name";
	        	$userexists = 1;
	        	break;
	        }
	    }
	    if($userexists==0){
			$sql = "INSERT INTO userpass (username, password) VALUES ('$regname', '$regpass')";
			$result = $conn->query($sql);
			$message = "User registered Successfully!";
	    }
	}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<div class="alert alert-primary">
				<?php echo $message; ?>
			</div>
			<a href="index.php"><button type="button" class="btn btn-outline-primary">Login Page</button></a>	
		</div>
	</div>
</body>
</html>