<?php

if(!isset($_SESSION)){
    session_start();
}

// if(isset($_SESSION['UserLogin'])){
//     echo "Welcome " .  $_SESSION['UserLogin'];
// } else {
//     echo "Welcome Guest";
// }

include_once("connections/connection.php");
$con = connection();

$sql = "SELECT * FROM students ORDER BY id DESC";
$students = $con->query($sql) or die ($con->error);
$row = $students->fetch_assoc();

// do{
//     echo $row['firstName'] . " " . $row['lastName'] . "" . "<br>";
// }while($row = $students->fetch_assoc())
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
    <div>
        <h1 class="text-center m-5">Student Management System<h1>
    </div>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php do{ ?>
                <tr>
                    <td> <?= $row['firstName']; ?> </td>
                    <td> <?= $row['lastName']; ?> </td>
                    <td><a href="details.php?ID=<?php echo $row['id'];?>">View</a></td>
                </tr>
                <?php }while($row = $students->fetch_assoc()) ?>
            </tbody>
        </table>
    </div>
</body>
</html>