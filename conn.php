<?php
include("config.php");

session_start();
$todo = $_POST["data"];
$user = $_SESSION["user"];

	$sql = "INSERT INTO todo(data,mark,user)
			VALUES('$todo',0,'$user')";
	$conn->query($sql);


	

$conn->close();


?>