<?php

include_once("connections/connection.php");
$con = connection();

if(isset($_POST['submit'])){
    // echo "submitted";

    $name = $_POST['fullName'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPass = $_POST['confirm_password'];
    $status = $_POST['status'];

    $sql = "INSERT INTO `users` (`fullName`, `email`, `username`, `password`, `confirm_password`, `status`) VALUES ( '$name', '$email', '$username', '$password', '$confirmPass', 'user')";

    $con->query($sql) or die ($con->error);

    echo header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    <h1 class="text-center m-5">Register</h1>
    <form action="" method="post" class="container">
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <label for="fullName">Name</label>
                <input type="text" name="fullName" class="form-control" id="fullName" placeholder="Surname, Firstname">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="email@gmail.com">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="username">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="password">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <label for="confirm_password">Re-type Password</label>
                <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="confirm password">
                <input type="hidden" name="status" class="form-control" id="status">
            </div>
        </div>
        <div class="row">
            <button type="submit" name="submit" class="btn btn-primary w-50 mx-auto mt-5 ">Register</button>
        </div>
    </form>
    <div class=" container mt-3 mb-2 text-center">
        <small>Already have an account? <a href="login.php">Login here</a></small>
    </div>
</body>
</html>