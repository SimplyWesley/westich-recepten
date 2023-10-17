<?php

$host = 'localhost';
$dbname = 'login-systeem';
$username = '<your username>';
$password = '<your password>';


$dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
