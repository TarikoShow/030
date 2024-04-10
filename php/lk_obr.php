<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

$host = "localhost";
$db = "uhulhjxs_030";
$user = "uhulhjxs_030";
$password = "piupiuop";

$mysqli = mysqli_connect($host, $user, $password, $db);

if ($mysqli == false){
    print("Error");
} else {
  $inputValue = $_POST["value"];
  $item = $_POST["item"];
  $id = $_SESSION["id"];

  $mysqli->query("UPDATE `users` SET `$item`='$inputValue' WHERE `id`='$id'");

  $_SESSION[$item] = $inputValue;
}