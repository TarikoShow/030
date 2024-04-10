<?php
header('Content-Type: text/html; charset=utf-8');

$name = $_POST["name"];
$lastname = $_POST["lastname"];
$email = trim(mb_strtolower($_POST["email"]));
$pass = trim($_POST["pass"]);
$pass = password_hash($pass, PASSWORD_DEFAULT);

$host = "localhost";
$db = "uhulhjxs_030";
$user = "uhulhjxs_030";
$password = "piupiuop";

$mysqli = mysqli_connect($host, $user, $password, $db);

if ($mysqli == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}else{
    // print("Соединение установлено успешно");
    $result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email' AND ");
    // var_dump($result->num_rows);
    if ($result->num_rows != 0) {
        print("exist");
    } else {
        $mysqli->query("INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES ('$name', '$lastname', '$email', '$pass')");
        print("ok");
    }
}
