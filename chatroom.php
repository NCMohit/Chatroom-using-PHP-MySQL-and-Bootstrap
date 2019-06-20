<?php  
	if(!isset($_SERVER['HTTP_REFERER'])){
	    header('location: /index.php');
	    exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat Room</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
	<script type="text/javascript">
	var auto_refresh = setInterval(
	function ()
	{
	$('#load_tweets').load('record_count.php').fadeIn("slow");
	}, 1000); // refresh every 1000 milliseconds
	</script>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "people";
	$conn = new mysqli($servername, $username, $password,$dbname);
	$sql = "CREATE TABLE IF NOT EXISTS chat (data VARCHAR(255))";
	$result = $conn->query($sql);
	$sql = "SELECT data FROM chat";
	$result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        echo $row["data"];
        echo "<br>";
    }
?>			
		</div>
	</div>
	<form method="post" action="updatechat.php">
		<div class="form-group">
			<label for="usr">Username:</label>
			<input type="text" class="form-control" id="usr" name="name">
		</div>
		<div class="form-group">
			<label for="usr">Text:</label>
			<input type="text" class="form-control" id="usr" name="chat">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</body>
</html>