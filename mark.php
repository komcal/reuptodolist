<?php
	include("config.php");
    session_start();
	
	$todo = $_POST["data"];
	$mark = $_POST["check"];
    $user = $_SESSION["user"];
	$sql = "SELECT id,mark FROM todo
	WHERE data = '$todo' AND user ='$user'";
	$result = $conn->query($sql);
	
	
	while($row = $result->fetch_assoc()){
        if($row['mark'] == 0 && $mark == 1){
        	$num = $row['id'];
        	$sql2 = "UPDATE todo SET mark=$mark WHERE id=$num ";
        	break;
        	
        }else if($row['mark'] == 1 && $mark == 0){
        	$num = $row['id'];
        	$sql2 = "UPDATE todo SET mark=$mark WHERE id=$num ";
        	break;
        	
        }
     }

   $conn->query($sql2);
$conn->close();

?>