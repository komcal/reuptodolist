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
			<table>
				<tr>
					<td>
						id	:
					</td>
					<td>
						<input name = "user" type="text">
					</td>
				</tr>
				<tr>
					<td>
							password	:
					</td>
					<td>
						<input name = "pass" type="password">
					</td>
				</tr>
			</table>
			<input name = "remember" type = "checkbox">remember me<br>
			<input name = "submit" type="submit" value="login">
			<a href="http://www.komcal.com/project/todolist/regis.php">register</a>
		</form>
	</body>
</html>

