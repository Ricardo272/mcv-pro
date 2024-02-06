<?php

class Entreprise
{

    /**
     * Methode permettant de creer un compte entreprise 
     * 
     * @param int $id_entreprise ID de l'entreprise 
     * @param int $code_postal_entreprise Code postal de l'entreprise
     * @param int $numero_de_siret Numero de siret entreprise 
     * @param string $ville Ville de l'entreprise
     * @param string $nom_entreprise Nom de l'entreprise
     * @param string $mdp_email_entreprise Mot de passe de l'email du compte entreprise 
     * @param string $email_entreprise Adresse email de l'entreprise
     * @param string $adresse_entreprise Adresse postal de l'entreprise 
     * @param string $image_entreprise Image descriptive de l'entreprise 
     * 
     * @return void 
     */


    public static function create_entreprise(
        int $id_entreprise,
        int $numero_de_siret,
        string $ville,
        string $nom_entreprise,
        string $mdp_email_entreprise,
        string $email_entreprise,
        string $adresse_entreprise,
        int $code_postal_entreprise,
        string $image_entreprise,

    ) {
        try {
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);
            $sql = "INSERT INTO `entreprise`(`ID_entreprise`, `Numéro_de_siret_entreprise`, `Ville_de_l_entreprise`, `Nom_de_l_entreprise`, `Mot_de_passe_email_entreprise`, `Email_entreprise`, `Adresse_de_l_entreprise`, `Code_postal_de_l_entreprise`, `Image_de_l_entreprise`) VALUES (:ID_entreprise, :Numéro_de_siret_entreprise, :Ville_de_l_entreprise,, :Nom_de_l_entreprise, :Mot_de_passe_email_entreprise, :Email_entreprise, :Adresse_de_l_entreprise, :Code_postal_de_l_entreprise, :Image_de_l_entreprise)";

            $query = $db->prepare($sql);

            $query->bindValue(":Numéro_de_siret_entreprise", htmlspecialchars($numero_de_siret), PDO::PARAM_INT);
            $query->bindValue(":Ville_de_l_entreprise", htmlspecialchars($ville), PDO::PARAM_STR);
            $query->bindValue(":Nom_de_l_entreprise", htmlspecialchars($nom_entreprise), PDO::PARAM_STR);
            $query->bindValue(":Mot_de_passe_email_entreprise", password_hash($mdp_email_entreprise, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $query->bindValue(":Email_entreprise", $email_entreprise, PDO::PARAM_STR);
            $query->bindValue(":Adresse_de_l_entreprise", htmlspecialchars($adresse_entreprise), PDO::PARAM_STR);
            $query->bindValue(":Code_postal_de_l_entreprise", htmlspecialchars($code_postal_entreprise), PDO::PARAM_STR);
            $query->bindValue(":Image_de_l_entreprise", htmlspecialchars($image_entreprise), PDO::PARAM_STR);

            $query = $query->execute();

        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            die();
        }
    }


    /**
     * 
     * Méthode permettant de modifer les informations d'une entreprise 
     *
     */

    public static function Modifier_infos_entreprise(
        int $numero_de_siret,
        string $ville,
        string $nom_entreprise,
        string $mdp_email_entreprise,
        string $email_entreprise,
        string $adresse_entreprise,
        int $code_postal_entreprise,
    ) {
        try {
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            $sql = "UPDATE
            `entreprise`
        SET
            `Numéro_de_siret_entreprise` = '[value-2]',
            `Ville_de_l_entreprise` = '[value-3]',
            `Nom_de_l_entreprise` = '[value-4]',
            `Mot_de_passe_email_entreprise` = '[value-5]',
            `Email_entreprise` = '[value-6]',
            `Adresse_de_l_entreprise` = '[value-7]',
            `Code_postal_de_l_entreprise` = '[value-8]'
        WHERE
            `ID_entreprise` = `ID_entreprise`";
        }
    }
}