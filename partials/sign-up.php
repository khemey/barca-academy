<?php

include '_dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];

    echo $userEmail;
}

?>