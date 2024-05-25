<?php

$database = "football";
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    echo "Unable to connect to database";
}

?>