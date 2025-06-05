<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Verwijder de gebruiker – CASCADE zorgt voor verwijderen uit andere tabellen
$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);

if ($stmt->execute()) {
    session_unset();
    session_destroy();
    header("Location: ../index.php?deleted=true");
    exit();
} else {
    echo "Fout bij verwijderen van account: " . $stmt->error;
}
?>