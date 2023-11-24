<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require ".././.././vendor/autoload.php";
require".././db.php";

session_start();

$email =  $_POST['email'];
$pass = $_POST['password'];


function have($conn,$email, $pass){
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt -> bindParam(":email", $email);
    $stmt -> execute();
    $user= $stmt -> fetch();
    print_r($user);
    
    
    if(isset($user['email']) && $user['pass'] == $pass){
        login($conn,$email, $pass);
    } else if(isset($user['email']) && $user['pass'] !== $pass){
         header("Location: .././.././public/index.php?errop=senhaincorreta");
    } else{
        addUser($conn,$email, $pass);
    }
}

function addUser($conn,$email, $pass){
    
    $scmt = $conn -> prepare('INSERT INTO users (email, pass) VALUES (:email, :pass)');
    $scmt->bindParam(':email', $email);
    $scmt->bindParam(':pass', $pass);
    $scmt->execute();
    header("Location: .././.././public/index.php?page=menu");
}

function login($conn,$email, $pass){
    $_SESSION['user'] = $email;
    $_SESSION['password'] = $pass;
    header("Location: .././.././public/index.php?page=menu");
}

have($conn,$email, $pass);



