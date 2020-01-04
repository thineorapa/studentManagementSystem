<?php

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['Status']) && $_SESSION['Status'] == "admin"){
    echo "Welcome " .  $_SESSION['UserLogin'];
} else {
    echo header("Location: index.php");
}

include_once("connections/connection.php");
$con = connection();

$sql = "SELECT * FROM student_kit ORDER BY id DESC";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Student Management System</title>
</head>
<body>
    <?php include_once("navbar.php")?>
   
</body>
</html>