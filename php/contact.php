<?php

// [SCRUM-54][SCRUM-55][SCRUM-56] Contact form handler

namespace QuickPOS\PHP;

require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

$name    = isset($_POST['name']) ? trim(htmlspecialchars($_POST['name'])) : '';
$email   = isset($_POST['email']) ? trim(htmlspecialchars($_POST['email'])) : '';
$cafe    = isset($_POST['cafe']) ? trim(htmlspecialchars($_POST['cafe'])) : '';
$message = isset($_POST['message']) ? trim(htmlspecialchars($_POST['message'])) : '';

$errors = [];

if (empty($name)) {
    $errors[] = 'Name is required.';
}
if (empty($email)) {
    $errors[] = 'Email is required.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Invalid email address.';
}
if (empty($message)) {
    $errors[] = 'Message is required.';
}

if (!empty($errors)) {
    $q = urlencode(implode(' | ', $errors));
    header('Location: ../index.php?error=' . $q . '#contact');
    exit;
}

// Save to database using the PDO connection from db.php
$sql = "INSERT INTO contacts (name, email, cafe_name, message) VALUES (:name, :email, :cafe, :message)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':name' => $name,
    ':email' => $email,
    ':cafe' => $cafe,
    ':message' => $message
]);

header('Location: ../thankyou.html');
exit;
