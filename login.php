<?php

include_once("connections/connection.php");
$con = connection();

if(!isset($_SESSION)){
    session_start();
}

if(isset($_POST['login'])){
    // echo "login";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $user = $con->query($sql) or die ($con->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;

    if($total > 0 ){
        $_SESSION['UserLogin'] = $row['username'];
        $_SESSION['Status'] = $row['status'];

        echo header("Location: index.php");
    } else {
        echo "no username found";
    }
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
    <h1 class="text-center m-5">Login</h1>
    <form action="" method="post" class="container">
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
        </div>
        <div class="row">
            <button type="submit" name="login" class="btn btn-primary w-50 mx-auto mt-5 ">Login</button>
        </div>
    </form>
    <div class=" container mt-3 text-center">
        <small>Don't have an account yet? <a href="register.php">Register here</a></small>
    </div>
</body>
</html>