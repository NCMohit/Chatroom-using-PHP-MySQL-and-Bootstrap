<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$conn = new mysqli($servername, $username, $password);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	$sql = "CREATE DATABASE IF NOT EXISTS people";
	if ($conn->query($sql) === TRUE) {
	   
	}
	$dbname = "people" ;
	$conn->close();
	$conn2 = new mysqli($servername, $username, $password,$dbname);
	if ($conn2->connect_error) {
	    die("Connection failed: " . $conn2->connect_error);
	}
	$query = "SELECT username FROM userpass";
	$result = mysqli_query($conn2, $query);
	if(empty($result)) {
		$sql = "CREATE TABLE userpass (
		username VARCHAR(255) ,
		password VARCHAR(255)
		)";
		if ($conn2->query($sql) === TRUE) {
		    echo "Table userpass created successfully";
		}else {
	    echo "Error creating table: " . $conn2->error;
		}
	}
	$conn2->close(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
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
			<h1 align="center">Mohit's ChatRoom Server</h1>
			<div style="text-align: center;">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Login">Login</button>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Register">Register</button>
			</div>
			<div class="modal" id="Login">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Login</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form method="post" action="/login.php">
								<div class="form-group">
									<label for="usr">Username:</label>
									<input type="text" class="form-control" id="usr" name="loginname">
								</div>
								<div class="form-group">
									<label for="pwd">Password:</label>
									<input type="password" class="form-control" id="pwd" name="loginpass">
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal" id="Register">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Register</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form method="post" action="/register.php">
								<div class="form-group">
									<label for="usr">Username:</label>
									<input type="text" class="form-control" id="usr" name="regname">
								</div>
								<div class="form-group">
									<label for="pwd">Password:</label>
									<input type="password" class="form-control" id="pwd" name="regpass">
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
