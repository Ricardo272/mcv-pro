<?php

// Démarrer la session
session_start();

// Config
require_once "../config.php";

// Models
require_once "../models/Entreprise.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $error = [];


    if (!empty($_POST["email_entreprise"]) && !empty($_POST["mdp_email_entreprise"])) {

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

                    header("Location: ../controllers/controller-home.php");
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