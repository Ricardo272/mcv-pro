<?php

// Démarrer la session
session_start();

// Config
require_once "../config.php";

// Models
require_once "../models/Entreprise.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $error = [];


    if (isset($_POST["connexion"])) {
        $recaptcha_secret = CAPTCHA;
        $captcha_response = $_POST["g-recaptcha-response"];
        $responseData = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$captcha_response");

        $dataRow = json_decode($responseData, true);

        if (!$dataRow["success"] == true) {
            $errors["captcha"] = "reCaptcha obligatoire";
        }
    }
    if (!empty($_POST["email_entreprise"]) && !empty($_POST["mdp_email_entreprise"]) && empty($errors)) {

        $email_entreprise = $_POST['email_entreprise'];
        $mdp_email_entreprise = $_POST['mdp_email_entreprise'];


        try {
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM entreprise WHERE `Email_entreprise` = :email_entreprise";
            $query = $db->prepare($sql);

            $query->bindValue(":email_entreprise", $email_entreprise, PDO::PARAM_STR);

            $query->execute();

            $resultat = $query->fetch(PDO::FETCH_ASSOC);


            if ($resultat) {
                $mdp_bdd = $resultat['Mot_de_passe_email_entreprise'];

                if (password_verify($mdp_email_entreprise, $mdp_bdd)) {
                    $_SESSION['user'] = $resultat;
                    unset($_SESSION['user']['Mot_de_passe_email_entreprise']);

                    header("location: ../controllers/controller-home.php");
                    exit();
                } else {
                    $error["connexion"] = "Erreur login / Mot de passe Inconue";
                }
            }

        } catch (PDOException $e) {
            // Gestion des erreurs de connexion
            $error[] = "Erreur de connexion à la base de données : " . $e->getMessage();

        } finally {
            // Fermeture de la connexion à la base de données
            $db = null;
        }

    } else {
        $error["connexion"] = "Veuillez remplir tous les champs ";
    }

}
include_once('../views/view-signin.php');