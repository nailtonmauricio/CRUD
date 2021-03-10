<?php


$host = "localhost";
$user = "root";
$pwd = "";
$dbname = "erp";

//CREATE CONNECTION
try {
    $conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $user, $pwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $e->getMessage();
}