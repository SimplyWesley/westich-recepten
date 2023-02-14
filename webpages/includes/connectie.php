<?php

$host = 'localhost';
$dbname = 'login-systeem';
$username = 'root';
$password = '';


$dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
