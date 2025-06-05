<?php
session_start();
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, password, first_name FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($user_id, $hash, $first_name);
        $stmt->fetch();
        if (password_verify($password, $hash)) {
            $_SESSION["user_id"] = $user_id;
            $_SESSION["first_name"] = $first_name;
            header("Location: ../index.php");
            exit();
        } else {
            echo "Fout: verkeerd wachtwoord.";
        }
    } else {
        echo "Fout: gebruiker niet gevonden.";
    }
} else {
    http_response_code(405);
    echo "Alleen POST-verzoeken zijn toegestaan.";
}
?>