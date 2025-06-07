<?php
session_start();
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        header("Location: ../index.php?message=register_failed");
        exit();
    }

    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $birth_date = $_POST['birth_date'];

    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, birth_date, password, profile_picture) VALUES (?, ?, ?, ?, ?, 'default.png')");
    $stmt->bind_param("sssss", $first, $last, $email, $birth_date, $hashed);

    if ($stmt->execute()) {
        $_SESSION["user_id"] = $stmt->insert_id;
        $_SESSION["first_name"] = $first;
        header("Location: ../index.php?message=register_success");
        exit();
    } else {
        header("Location: ../index.php?message=register_failed");
        exit();
    }
} else {
    http_response_code(405);
    echo "Alleen POST-verzoeken zijn toegestaan.";
}