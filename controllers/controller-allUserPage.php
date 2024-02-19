<?php

// Démarrer la session
session_start();

// Config
require_once "../config.php";

// Models
require_once "../models/Entreprise.php";
require_once "../models/User.php";
require_once "../models/Trajet.php";

if (isset($_SESSION['user'])) {
    $dateDuJour = date('d F Y');





    // Appeler la vue
    include_once('../views/view-allUserPage.php');
} else {
    // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("Location: ../controllers/controller-signin.php");
    exit();
}