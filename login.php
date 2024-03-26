<?php
global $conn;
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gebruik prepared statements om SQL-injectie te voorkomen
    $conn = ;
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $count = $result->num_rows;

    // Controleer of de gebruiker bestaat en het wachtwoord klopt
    if ($count == 1) {
        $_SESSION['login_user'] = $username;
        header("location: welcome.php");
    } else {
        $error = "Je gebruikersnaam of wachtwoord is onjuist";
    }

    $stmt->close();
}
?>
