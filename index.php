<?php
	header("Content-type: text/html; charset=utf-8");
	
	$servername = "yourserver";
	$username = "yourusername";
	$password = "password";
	$dbname = "yourdbname";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

	session_start();
	if(isset($_COOKIE["remember_user"])){
		
		$user = $_COOKIE["user"];
		$hpass = $_COOKIE["hpass"];
		$sql = "SELECT * FROM user
		WHERE username = '$user' AND password='$hpass'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if(!$row){
			header( "Location:/newtodolist/login.php" );
		}else{
			$_SESSION["user"] = $user;
		}
	}
	
	else if($_SESSION["user"] == ""){
		header( "Location:/newtodolist/login.php" );
	}
	
	echo $_SESSION["user"];
	
?>

<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="css.css">
			<script src="jquery-1.11.2.min.js"></script>
			<script src="script.js"></script>	

		<title>
		To do list
		</title>
		
	</head>
	
	<body>
		<a href="http://www.zp9019.tld.122.155.177.85.no-domain.name/newtodolist/login.php">logout</a>
		<div id="table">
			<h1>TOdos</h1>
			<div id="headrow">
				<div class="cell_mark_head">
				</div>
				
				<div class="cell_list_head">
				</div>
			</div>

			<div class="inputbox">
				<div class="cell_mark_add" >
				</div>
				
				<div class="cell_list_add">
					<form  method="POST">
					<input id="data" type="text" name="todo" value="" placeholder="What needs to be done?" autocomplete="off" />
					</form>
				</div>
			</div>

			
			<div class="todobox">
				
			</div>
				<?php
	$servername = "yourserver";
	$username = "yourusername";
	$password = "password";
	$dbname = "yourdbname";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
	
	$user = $_SESSION["user"];
	$sql = "SELECT data,mark FROM todo WHERE user = '$user'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
        	$x = $row['data'];
        	$m = $row['mark'];
        	 echo '<script type="text/javascript"> push_data("'. $x. '",' . $m .');</script>';
        	
    	}
	}

?>

			</div>
		</div>
		
	</body>

	
</html>
