<?php
echo "Registration SucessFul";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
</head>
<body>
	<h1>Login Form</h1>
	<form action="login.php" method="post">
		<label for="email">Email Address:</label>
		<input type="email" id="email" name="email" required><br><br>
		
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br><br>
		
		<input type="submit" value="Login">
	</form>
</body>
</html>