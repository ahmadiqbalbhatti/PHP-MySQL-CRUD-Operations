<?php

$connection = new mysqli('localhost', 'root', '', 'crud-operation');


if ($connection){
    echo "Connection Successfully Established between database and form";
}else{
    die(mysqli_error($connection));
}