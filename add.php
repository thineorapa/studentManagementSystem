<?php

include_once("connections/connection.php");
$con = connection();

// check if the post method was submitted once the button add is click
if(isset($_POST['submit'])){
    // echo "submitted";

    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $sql = "INSERT INTO `students` (`firstName`, `lastName`, `birthday`, `gender`) VALUES ('$fname', '$lname', '$birthday', '$gender')";

    $con->query($sql) or die ($con->error);

    echo header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- sweetalert -->
    <script src="sweet\node_modules\sweetalert\dist\sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="sweet\node_modules\sweetalert\dist\sweetalert.css">

    <!-- Bootstrap cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Student Management System</title>
</head>
<body>
    <h1 class="text-center m-5">Add Student</h1>
    <form action="" method="post" class="container">
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" class="form-control" id="fname">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" class="form-control" id="lname">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <label for="birthday">Birthday</label>
                <input type="date" name="birthday" class="form-control" id="birthday" placeholder="mm/dd/yyy">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <label for="gender">Gender</label>
                <select class="custom-select" name="gender" id="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        </div>
        <div class="row">
            <button type="submit" name="submit" class="btn btn-primary w-50 mx-auto mt-5 ">Add</button>
        </div>
    </form>
</body>
</html>