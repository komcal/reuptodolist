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
	$sql = "SELECT id FROM todo
	WHERE data = '$todo'  AND user = '$user'";
	
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$num = $row["id"];
    $sql = "DELETE FROM todo WHERE id = $num";
    $conn->query($sql);
$conn->close();






?>