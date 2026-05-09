<?php

// [SCRUM-56] Database configuration

$host = 'localhost';
$dbname = 'quickpos_db';
$username = 'root';
$password = 'root';  // MAMP default is 'root'

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Database connection failed: " . $e->getMessage());
    // Don't expose error details to users
    die("Database connection error. Please try again later.");
}
