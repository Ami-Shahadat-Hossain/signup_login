<?php
echo "Registartion Successful";
session_start();

$_email = $_POST['email'];
$_password = $_POST['password'];

$servername = "localhost";
$username = "root";
$password = "a191018191018A@";
$conn = new PDO("mysql:host=$servername;dbname=users", $username, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT COUNT(*) AS total FROM `user` WHERE email LIKE :email AND password LIKE :password";


$stmt = $conn->prepare($query);



$stmt->bindParam(':email', $_email);
$stmt->bindParam(':password', $_password);

$stmt->execute();
       
$totalfound = $stmt->fetch();
       if($totalfound['total']>0){
           $_SESSION['is_authenticated']=true;
           header('location:welcome.php');
       }else{
           $_SESSION['is_authenticated']=false;
           header('location:error_message.php');
       }
       
?>