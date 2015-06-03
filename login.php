<?php

	session_start();
	session_unset(); 
    session_destroy();
    setcookie("remember_user","",time() , "/");
	setcookie("user","",time() , "/");
	setcookie("hpass","",time(), "/");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>login</title>
	<head>

	<body>
		<form action="login_process.php" method="POST">
			id 		 : <input name = "user" type="text"><br>
			password : <input name = "pass" type="password"><br>
			<input name = "remember" type = "checkbox">remember me<br>
			<input name = "submit" type="submit" value="login">
			<a href="http://www.zp9019.tld.122.155.177.85.no-domain.name/newtodolist/regis.php">register</a>
		</form>
	</body>
</html>