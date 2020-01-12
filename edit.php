<?php

include_once("connections/connection.php");
$con = connection();
$id = $_GET['ID'];

$sql = "SELECT * FROM students WHERE id = '$id'";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();

// check if the post method was submitted once the button add is click
if(isset($_POST['submit'])){
    // echo "submitted";

    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $sql = "UPDATE students SET firstName = '$fname', lastName = '$lname', birthday = '$birthday', gender = '$gender' WHERE id = '$id'";

    $con->query($sql) or die ($con->error);

    echo header("Location: details.php?ID=".$id);
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

    <title>Student Management System</title>
</head>
<body>
    <h1 class="text-center m-5">Add Student</h1>
    <form action="" method="post" class="container">
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" class="form-control" id="fname" value="<?= $row['firstName']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" class="form-control" id="lname" value="<?= $row['lastName']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <label for="birthday">Birthday</label>
                <input type="text" name="birthday" class="form-control" id="birthday" placeholder="mm/dd/yyy" value="<?= $row['birthday']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 mx-auto">
                <label for="gender">Gender</label>
                <select class="custom-select" name="gender" id="gender">
                    <option value="Male" <?php echo ($row['gender'] == 'Male')? 'selected' : '' ?>>Male</option>
                    <option value="Female" <?php echo ($row['gender'] == 'Female')? 'selected' : '' ?>>Female</option>
                </select>
            </div>
        </div>
        <div class="row">
            <button type="submit" name="submit" class="btn btn-primary w-50 mx-auto mt-5 ">Update</button>
        </div>
        
    </form>
</body>
</html>