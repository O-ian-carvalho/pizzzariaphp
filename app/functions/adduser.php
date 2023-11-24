<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require ".././db.php";


$email =  $_POST['email'];
$pass = $_POST['password'];


function addUser($conn, $email, $pass){

    $scmt = $conn -> prepare('INSERT INTO users (email, pass) VALUES (:email, :pass)');
    $scmt->bindParam(':email', $email);
    $scmt->bindParam(':pass', $pass);
    $scmt->execute();
}
addUser($conn, $email, $pass);

