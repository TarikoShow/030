<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

$email = trim(mb_strtolower($_POST["email"]));
$pass = $_POST["pass"];

$host = "localhost";
$db = "uhulhjxs_030";
$user = "uhulhjxs_030";
$password = "piupiuop";

$mysqli = mysqli_connect($host, $user, $password, $db);

if ($mysqli == false){
    print("ЭЭЭээээ тут Error");
} else {
  $result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email'");

  $result = $result->fetch_assoc();

  if (password_verify($pass, $result["pass"])) {
    echo "success";
    $_SESSION["name"] = $result["name"];
    $_SESSION["lastname"] = $result["lastname"];
    $_SESSION["email"] = $result["email"];
    $_SESSION["id"] = $result["id"];
  } else {
    echo "not_found";
  }
}