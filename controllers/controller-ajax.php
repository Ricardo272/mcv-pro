<?php
// Démarrer la session
session_start();
// Config
require_once "../config.php";

// Models
require_once "../models/Entreprise.php";
require_once "../models/User.php";
require_once "../models/Trajet.php";


if (isset($_GET['validate']) && isset($_SESSION['user'])) {

    if (User::allInfoUser($_GET['validate'])['ID_entreprise'] == $_SESSION['user']['ID_entreprise']) {
        User::validateUser($_GET['validate']);
    }
}
if (isset($_GET['unvalidate']) && isset($_SESSION['user'])) {

    if (User::allInfoUser($_GET['unvalidate'])['ID_entreprise'] == $_SESSION['user']['ID_entreprise']) {
        User::unvalidateUser($_GET['unvalidate']);
    }
}
