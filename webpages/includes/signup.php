<?php

session_start();

include("connectie.php");

$user = $_POST["user"];
$pass = $_POST["password"];

$sql = "INSERT INTO `login`(`Username`, `Password`) VALUES (:user, :pass)";

function search($user)
{
    global $dbh;
    $stmt = $dbh->prepare("SELECT * FROM `login` WHERE username = :user");
    $stmt->execute(
        [
            ":user" => $user
        ]
    );

    $row = $stmt->fetch();

    if ($row != false) {
        return $row['id'];
    } else {
        return false;
    }
}

$check = search($user);

if ($check == false) {
    $st = $dbh->prepare($sql);
    $st->execute([
        ':user' => $user,
        ':pass' => $pass
    ]);
    $_SESSION["login"] = "login";
    header("Location: ../index.php");
} else {
    $_POST["signup"] = "exists";
    header("Location: ../loginpage.php");
}
