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
	$hpass = hash('sha512',$pass,false);
	
	$hpass = substr($hpass, 0, 1000);
	
	$sql = "SELECT * FROM user
	WHERE username = '$user' AND password='$hpass'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

?>
<!DOCTYPE html>

<html>
	<head>
		<title>login</title>
	<head>

	<body>

		<?php
		if(!$row){
		echo "Username or Password Incorrect!";
		header( "refresh:2; url=login.php" );
	}else{
		echo "Hi " . $row["name"]. " " . $row["lastname"] . ".";
		//setcookie("user",$user,time() + 3600,"/");
		
		
		if($_POST["remember"]){
			setcookie("remember_user",1,time() + (86400 * 30) , "/");
			setcookie("user",$user,time() + (86400 * 30) , "/");
			setcookie("hpass",$hpass,time() + (86400 * 30) , "/");

		}else{
			

		}
		session_start();
		$_SESSION["user"] = "$user";

		header( "refresh:2; url=/newtodolist/index.php" );
	}
		$conn->close();
		?>

	</body>
</html>