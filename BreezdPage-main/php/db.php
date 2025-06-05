<?php
$host = 'sql.freedb.tech';
$db   = 'freedb_puff_tracker';
$user = 'freedb_breezd';
$pass = 'at$SDdMvU%QW7VW';
$port = 3306;

$conn = new mysqli($host, $user, $pass, $db, $port);
if ($conn->connect_error) {
    console.log ("Verbinding mislukt: " . $conn->connect_error);
}
?>