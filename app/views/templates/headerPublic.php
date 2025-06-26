<?php
// Redirect if user is logged in
if (isset($_SESSION['auth']) && $_SESSION['auth'] == 1) {
    header('Location: /reminders');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>COSC 4806</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.png">

    <!-- ✅ Pointing correctly to public/style.css -->
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
