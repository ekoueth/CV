<?php
function initializeGame() {
    $_SESSION['randomNumber'] = rand(1, 100);
    $_SESSION['attempts'] = [];
}

function checkNumber($userInput) {
    if ($userInput < 1 || $userInput > 100) {
        return "Veuillez entrer un nombre valide entre 1 et 100.";
    }

    $_SESSION['attempts'][] = $userInput;

    if ($userInput == $_SESSION['randomNumber']) {
        session_destroy(); // Réinitialise le jeu
        return "Bravo, vous avez trouvé le nombre : {$userInput}!";
    } elseif ($userInput < $_SESSION['randomNumber']) {
        return "Trop bas ! Essayez encore.";
    } else {
        return "Trop haut ! Essayez encore.";
    }
}

function displayHistory() {
    if (!empty($_SESSION['attempts'])) {
        echo "<h3>Historique des tentatives :</h3><ul>";
        foreach ($_SESSION['attempts'] as $attempt) {
            echo "<li>$attempt</li>";
        }
        echo "</ul>";
    }
}
?>
