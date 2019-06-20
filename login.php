<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$loginname = test_input($_POST["loginname"]);
		$loginpass = test_input($_POST["loginpass"]);
	}
	$loggedin = 0;
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	if(($loginname=="") or ($loginpass=="")){
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
		$testvar = 0;
	    while($row = $result->fetch_assoc()) {
	        if($loginname==$row["username"]){
	    		$testvar = 1;
	        	if($loginpass==$row["password"]){
	        		$loggedin = 1;
	        	}
	        	else{
	        		$message = "Wrong Password";
	        	}
	        }
	    }
	    if ($testvar == 0) {
	    	$message = "User not registered";
	    }
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Log-In</title>
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
			<?php if($loggedin==1): ?>
				<div class="alert alert-success">
					<strong>Logged In!</strong> Please continue to the chat room.
				</div>
				<a href="chatroom.php"><button type="button" class="btn btn-outline-primary">Continue</button></a>	
			<?php else: ?>
				<div class="alert alert-danger">
					<?php echo $message; ?>
				</div>
				<a href="index.php"><button type="button" class="btn btn-outline-primary">Try Again</button></a>	
			<?php endif; ?>
		</div>
	</div>
</body>
</html>