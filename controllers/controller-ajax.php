<?php
// Démarrer la session
session_start();

// Config
require_once "../config.php";

// Models
require_once "../models/Entreprise.php";
require_once "../models/User.php";
require_once "../models/Trajet.php";


if (isset($_GET['validate'])) {
    User::validateUser($_GET['validate']);

}
if (isset($_GET['unvalidate'])) {
    User::unvalidateUser($_GET['unvalidate']);

}