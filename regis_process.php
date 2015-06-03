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
	
	$user = $_POST["user"];
	$pass = $_POST["pass"];
	$name = $_POST["name"];
	$lastname = $_POST["lastname"];
	$hpass = hash('sha512',$pass,false);
	
	$sql = "SELECT username FROM user
	WHERE username = '$user'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	if(!$row){
		$sql = "INSERT INTO user(username,password,name,lastname)
VALUES ('$user','$hpass','$name','$lastname')";

$conn->query($sql);

echo "Yourname is " . $name . ". Thank you for register.";
}else{
	echo "username already use please register again.";
	
}
$conn->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>login</title>
	<head>

	<body>
		<form action="login_process.php" method="POST">
			
			<a href="http://www.zp9019.tld.122.155.177.85.no-domain.name/newtodolist/login.php">login</a>
		</form>
	</body>
</html>