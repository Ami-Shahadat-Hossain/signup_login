<?php
$_first_name = $_POST['first_name'];
$_last_name = $_POST['last_name'];
$_email = $_POST['email'];
$_password = $_POST['password'];
$_confirm_password = $_POST['confirm_password'];

// Check all fields are filled 
if (empty($_first_name) || empty($_last_name) || empty($_email) || empty($_password) || empty($_confirm_password)) {
	die("Please fill in all fields.");
}

// Check if email is in valid format
if (!filter_var($_email, FILTER_VALIDATE_EMAIL)) {
	die("Please enter a valid email address.");
}

// Check if password and confirm password match
if ($_password !== $_confirm_password) {
	die("Passwords do not match.");
}

// If all validations pass, display confirmation message
echo "Registration successful. Welcome, $_first_name!";

$servername = "localhost";
$username = "root";
$password = "a191018191018A@";

// try {
$conn = new PDO("mysql:host=$servername;dbname=users", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "INSERT INTO `user` (`first_name`, `last_name`, `email`, `password`) VALUES (:first_name, :last_name, :email, :password)";

$stmt = $conn->prepare($query);

// $stmt->bindParam(':id', $id);
$stmt->bindParam(':first_name', $_first_name);
$stmt->bindParam(':last_name', $_last_name);
$stmt->bindParam(':email', $_email);
$stmt->bindParam(':password', $_password);
        


$result = $stmt->execute();

header('location:login_form.php');
?>