<?php
session_start();

// Détruire toutes les données de la session
session_unset();

// Détruire la session
session_destroy();

// Rediriger vers la page de connexion ou une autre page de votre choix
header("Location: login.php");
exit; 
?>
