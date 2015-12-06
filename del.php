<?php
	include("config.php");

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