<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php?message=login_failed");
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);

if ($stmt->execute()) {
    session_unset();
    session_destroy();
    header("Location: ../index.php?message=account_deleted");
    exit();
} else {
    header("Location: ../index.php?message=error");
    exit();
}