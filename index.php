<?php
session_start();
require 'functions.php';
if (!isset($_SESSION['randomNumber'])) {
    initializeGame();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devine le nombre</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="game-container">
        <h1>Devinez le Nombre</h1>
        <form method="POST" action="traitement.php">
            <label for="userInput">Entrez un nombre entre 1 et 100 :</label><br>
            <input type="number" id="userInput" name="userInput" min="1" max="100" placeholder="Entrez un nombre" required><br><br>
            <button type="submit">Vérifiez</button>
        </form>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p class='" . (strpos($_SESSION['message'], 'Bravo') !== false ? 'success' : 'error') . "'>{$_SESSION['message']}</p>";
            unset($_SESSION['message']); // Nettoyage après affichage
        }
        displayHistory();
        ?>
    </div>
</body>
</html>
