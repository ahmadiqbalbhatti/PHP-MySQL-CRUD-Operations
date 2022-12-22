<?php

$connection = new mysqli('localhost', 'root', '', 'crud-operation');

if (!$connection) {
    die(mysqli_error($connection));
}

$result = '';
$id = $_GET['updateId'];

$connection = new mysqli('localhost', 'root', '', 'crud-operation');

if (!$connection) {
    die(mysqli_error($connection));
}

$sqlReadQuery = "SELECT * FROM `crud` WHERE id=$id";
$result = mysqli_query($connection, $sqlReadQuery);
$row = mysqli_fetch_assoc($result);

$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $sqlQuery = "UPDATE crud SET name='$name', email='$email', mobile='$mobile',password='$password' WHERE id=$id";
    $result = mysqli_query($connection, $sqlQuery);
    if ($result) {
//        echo "Data Updated Successfully";
        header('location:display.php');
    } else {
        die(mysqli_error($connection));
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <title>Crud Operations</title>

    <style>
        h1 {
            text-align: center;
            color: cadetblue;
        }

        .my-container {
            width: 40%;
        }

        .btn-primary {
            background-color: cadetblue;
            border: none;
            width: 100%;
        }


        .btn-primary:hover {
            background-color: cadetblue;
            border: none;
            width: 100%;
        }
    </style>
</head>
<body>
<h1 class="my-3 mx-5">Update User Info</h1>
<div class="container my-container">
    <form method="post">
        <div class="mb-3">
            <label for="nameInput" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="nameInput" name="name" autocomplete="off"
                   value=<?php echo $name; ?>>
        </div>
        <div class="mb-3">
            <label for="emailInput" class="form-label">Your Email</label>
            <input type="email" class="form-control" id="emailInput" name="email" autocomplete="off" value=<?php echo $email; ?>>
        </div>
        <div class="mb-3">
            <label for="mobileNumberInput" class="form-label"> Your Mobile#</label>
            <input type="text" class="form-control" id="mobileNumberInput" name="mobile" autocomplete="off" value=<?php echo $mobile; ?>>
        </div>
        <div class="mb-3">
            <label for="passwordInput" class="form-label">Password</label>
            <input type="password" class="form-control" id="passwordInput" name="password" autocomplete="off" value=<?php echo $password; ?>>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
</div>
</body>
</html>