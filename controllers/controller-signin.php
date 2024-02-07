<?php

// Démarrer la session
session_start();

// Config
require_once "../config.php";

// Models
require_once "../models/Entreprise.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $error = [];
}
