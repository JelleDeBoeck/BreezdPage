<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = htmlspecialchars(trim($_POST['first-name']));
    $lastName = htmlspecialchars(trim($_POST['last-name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    $to = "andres.cochez@hotmail.com";

    $subject = "Nieuw contactformulierbericht van $firstName $lastName";
    $body = "Je hebt een nieuw bericht via het contactformulier:\n\n";
    $body .= "Naam: $firstName $lastName\n";
    $body .= "E-mailadres: $email\n\n";
    $body .= "Bericht:\n$message";

    $headers = "From: noreply@breezd.be\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subject, $body, $headers)) {
        header("Location: ../index.php?message=success");
        exit();
    } else {
        header("Location: ../index.php?message=error");
        exit();
    }
}
?>