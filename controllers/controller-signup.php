<?php
// Config
require_once "../config.php";
// Models
require_once "../models/Entreprise.php";

$showform = true;
$regex = "/^[a-zA-ZÀ-ÿ\_\-\d ]+$/";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = [];

    if (empty($_POST["nom_entreprise"])) {
        $error["nom_entreprise"] = "Champs obligatoire.";
    } else if (!preg_match($regex, $_POST["nom_entreprise"])) {
        $error["nom_entreprises"] = "Le nom est invalide" . "<br>" . "Veuillez saisir un nom valide";
    }

    if (empty($_POST["ville"])) {
        $error["ville"] = "Champs obligatoire.";
    } else if (!preg_match($regex, $_POST["ville"])) {
        $error["ville"] = "La ville est invalide" . "<br>" . "Veuillez saisir une ville valide";
    }

    if (empty($_POST["email_entreprise"])) {
        $error["email_entreprise"] = "Champs obligatoire.";
    } else if (!filter_var($_POST["email_entreprise"], FILTER_VALIDATE_EMAIL)) {
        $error["email_entreprise"] = "L'email est invalide" . "<br>" . "Veuillez saisir une adresse email valide";
    }

    if (empty($_POST["numero_de_siret"])) {
        $error["numero_de_siret"] = "Champs obligatoire.";
    } else if (!preg_match($regex, $_POST["numero_de_siret"])) {
        $error["numero_de_siret"] = "Numéro invalide" . "<br>" . "Veuillez saisir un numéro de siret valide";
    }

    if (empty($_POST["adresse_entreprise"])) {
        $error["adresse_entreprise"] = "Champs obligatoire.";
    } else if (!preg_match($regex, $_POST["adresse_entreprise"])) {
        $error["adresse_entreprise"] = "L'adresse est invalide" . "<br>" . "Veuillez saisir une adresse valide";
    }

    if (empty($_POST["code_postal_entreprise"])) {
        $error["code_postal_entreprise"] = "Champs obligatoire.";
    } else if (!preg_match($regex, $_POST["code_postal_entreprise"])) {
        $error["code_postal_entreprise"] = "Le code postale est invalide" . "<br>" . "Veuillez saisir un code postale valide";
    } else if (strlen($_POST["code_postal_entreprise"]) !== 5) {
        $error["code_postal_entreprise"] = "Le code postal doit avoir exactement 5 caractères.";
    } else if (!ctype_digit($_POST["code_postal_entreprise"])) {
        $error["code_postal_entreprise"] = "Le code postal est invalide.";
    }

    $mdp_email_entreprise = $_POST["mdp_email_entreprise"];
    $verif_mdp = $_POST["verif_mdp"];
    if (empty($mdp_email_entreprise) || strlen($mdp_email_entreprise) < 8 || $mdp_email_entreprise !== $verif_mdp) {
        $error['mdp_email_entreprise'] = "Le mot de passe doit comporter au moins 8 caractères et correspondre.";
        $error['verif_mdp'] = "Le mot de passe doit comporter au moins 8 caractères et correspondre.";
    }


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