<?php

session_start();

include("connectie.php");

$user = $_POST["user"];
$pass = $_POST["password"];

$sql = "SELECT * FROM `login` WHERE username = :user AND password = :password";

$st = $dbh->prepare($sql);

$st->execute([
    ':user' => $user,
    ':password' => $pass
]);

if ($st->fetch()) {
    echo "Welkom $user";
    $_SESSION["login"] = "login";
    if ($user == "admin"){
        $_SESSION["admin"] = "admin";
    }
    $_SESSION["user"] = $user;
    header("Location: ../index.php");
} else {
    header("Location: ../index.php");
}
