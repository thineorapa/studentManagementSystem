<?php

if(!isset($_SESSION)){
    session_start();
}

include_once("connections/connection.php");
$con = connection();

$id = $_GET['ID'];

$sql = "SELECT * FROM students WHERE id = '$id'";
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

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <title>Student Management System</title>
</head>
<body>
    <?php include_once("navbar.php")?>

    <div>
        <h1 class="text-center m-5">Student Details<h1>
    </div>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <?= $row['firstName']; ?> </td>
                    <td> <?= $row['lastName']; ?> </td>
                    <td> <?= $row['gender']; ?> </td>
                    <td> <?= $row['birthday']; ?> </td>
                    <form action="delete.php" method="post">
                        <td><a href="edit.php?ID=<?= $row['id']; ?>" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                <span> <button type="submit" name="delete" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            <input type="hidden" name="ID" value="<?php echo $row['id'];?>"> </span>
                        </td>
                    </form>
                    
                </tr>
            </tbody>
        </table>
    </div>
   
</body>
</html>