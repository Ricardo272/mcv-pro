<?php

// Démarrer la session
session_start();
var_dump($_POST);
// Config
require_once "../config.php";

// Models
require_once "../models/Entreprise.php";
require_once "../models/User.php";
require_once "../models/Trajet.php";

if (isset($_SESSION['user'])) {
    $dateDuJour = date('d F Y');

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST['activ'])) {
            User::validateUser($_POST['activ']);
        }
        if (isset($_POST['desactiv'])) {
            User::unvalidateUser($_POST['desactiv']);
        }
    }

    // Appeler la vue
    include_once('../views/view-allUserPage.php');
} else {
    // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("Location: ../controllers/controller-signin.php");
    exit();
}