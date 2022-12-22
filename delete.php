<?php
$connection = new mysqli('localhost', 'root', '', 'crud-operation');

if (!$connection) {
    die(mysqli_error($connection));
}


if (isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $delQuery = "DELETE FROM `crud` WHERE id=$id";

    $result = mysqli_query($connection, $delQuery);
    if ($result){
//        echo "Deleted Successfully";
        header('location:display.php');
    }else{
        die(mysqli_error($connection));
    }

}