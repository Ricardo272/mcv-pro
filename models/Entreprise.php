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
     */


    public static function create(
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

            $query->bindValue("");

        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            die();
        }
    }
}