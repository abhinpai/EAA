<?php

header('Content-Type: application/json');

$con = mysqli_connect("localhost","root","","event");

// Check connection
if (mysqli_connect_errno($con))
{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
}

?>