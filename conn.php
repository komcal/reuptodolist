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
	
session_start();
$todo = $_POST["data"];
$user = $_SESSION["user"];

	$sql = "INSERT INTO todo(data,mark,user)
			VALUES('$todo',0,'$user')";
	$conn->query($sql);


	

$conn->close();


?>