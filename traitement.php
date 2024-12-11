<?php
session_start();
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userInput = filter_input(INPUT_POST, 'userInput', FILTER_VALIDATE_INT);

    if ($userInput === false) {
        $message = "Veuillez entrer un nombre valide.";
    } else {
        $message = checkNumber($userInput);
    }

    $_SESSION['message'] = $message;
    header('Location: index.php');
    exit;
}
?>
