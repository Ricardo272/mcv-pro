<?php
// Config
require_once "../config.php";
// Models
require_once "../models/Entreprise.php";

$showform = true;
$regex = "/^[a-zA-ZÀ-ÿ\_\-\d ]+$/";
var_dump($_POST);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = [];

    if (empty($_POST["nom_entreprise"])) {
        $error["nom_entreprise"] = "Champs obligatoire.";
    } else if (!preg_match($regex, $_POST["nom_entreprise"])) {
        $error["nom_entreprises"] = "Le nom est invalide.";
    }

    if (empty($_POST["ville"])) {
        $error["ville"] = "Champs obligatoire.";
    } else if (!preg_match($regex, $_POST["ville"])) {
        $error["ville"] = "Le nom est invalide.";
    }

    if (empty($_POST["email_entreprise"])) {
        $error["email_entreprise"] = "Champs obligatoire.";
    } else if (!filter_var($_POST["email_entreprise"], FILTER_VALIDATE_EMAIL)) {
        $error["email_entreprise"] = "Le nom est invalide.";
    }

    if (empty($_POST["numero_de_siret"] || strlen($numero_de_siret) == 14)) {
        $error["numero_de_siret"] = "Champs obligatoire.";
    } else if (!preg_match($regex, $_POST["numero_de_siret"])) {
        $error["numero_de_siret"] = "Le nom est invalide.";
    }

    if (empty($_POST["adresse_entreprise"])) {
        $error["adresse_entreprise"] = "Champs obligatoire.";
    } else if (!preg_match($regex, $_POST["adresse_entreprise"])) {
        $error["adresse_entreprise"] = "Le nom est invalide.";
    }

    if (empty($_POST["code_postal_entreprise"] || strlen($code_postal_entreprise) == 5)) {
        $error["code_postal_entreprise"] = "Champs obligatoire.";
    } else if (!preg_match($regex, $_POST["code_postal_entreprise"])) {
        $error["code_postal_entreprise"] = "Le nom est invalide.";
    }

    $mdp_email_entreprise = $_POST["mdp_email_entreprise"];
    $verif_mdp_email_entreprise = $_POST["verif_mdp_email_entreprise"];
    if (empty($mdp_email_entreprise) || strlen($mdp_email_entreprise) < 8 || $mdp_email_entreprise !== $verif_mdp_email_entreprise) {
        $errors['mdp_email_entreprise'] = "Le mot de passe doit comporter au moins 8 caractères et correspondre.";
    }

    if (!isset($_POST["cgu"])) {
        $errors['cgu'] = "Veuillez valider les CGU";
    }
    var_dump($error);
    if (empty($error)) {
        $nom_entreprise = $_POST["nom_entreprise"];
        $ville = $_POST["ville"];
        $email_entreprise = $_POST["email_entreprise"];
        $numero_de_siret = $_POST["numero_de_siret"];
        $adresse_entreprise = $_POST["adresse_entreprise"];
        $code_postal_entreprise = $_POST["code_postal_entreprise"];
        $mdp_email_entreprise = $_POST["mdp_email_entreprise"];

        Entreprise::create_entreprise(
            $numero_de_siret,
            $ville,
            $nom_entreprise,
            $mdp_email_entreprise,
            $email_entreprise,
            $adresse_entreprise,
            $code_postal_entreprise,

        );
        $showform = false;
    }

}

?>

<?php
include_once('../views/view-signup.php');
?>