<?php
// [SCRUM-45] contact.php – Server-side form validation for BrewDesk
// PHP validates after POST (safety net independent of JS client-side validation)

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    exit;
}

$name    = isset($_POST['name'])    ? trim(htmlspecialchars($_POST['name']))    : '';
$email   = isset($_POST['email'])   ? trim(htmlspecialchars($_POST['email']))   : '';
$message = isset($_POST['message']) ? trim(htmlspecialchars($_POST['message'])) : '';

$errors = [];

if (empty($name))    $errors[] = 'Name is required.';
if (empty($email))   $errors[] = 'Email is required.';
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Invalid email address.';
if (empty($message)) $errors[] = 'Message is required.';

if (!empty($errors)) {
    $q = urlencode(implode(' | ', $errors));
    header('Location: ../index.php?error=' . $q . '#contact');
    exit;
}

// Simulate success — in production: send email / save to DB
// Redirect to thank-you page (implemented in SCRUM-46)
header('Location: ../thankyou.html');
exit;
?>
