<?php

class Entreprise
{

    /**
     * Methode permettant de creer un compte entreprise 
     * 
     * @param string $numero_de_siret Numero de siret entreprise 
     * @param string $ville Ville de l'entreprise
     * @param string $nom_entreprise Nom de l'entreprise
     * @param string $mdp_email_entreprise Mot de passe de l'email du compte entreprise 
     * @param string $email_entreprise Adresse email de l'entreprise
     * @param string $adresse_entreprise Adresse postal de l'entreprise 
     * @param string $code_postal_entreprise Code postal de l'entreprise
     * 
     * 
     * @return void 
     */


    public static function create_entreprise(
        string $numero_de_siret,
        string $ville,
        string $nom_entreprise,
        string $mdp_email_entreprise,
        string $email_entreprise,
        string $adresse_entreprise,
        string $code_postal_entreprise,


    ) {
        try {
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            $sql = "INSERT INTO `entreprise`(
                `Numéro_de_siret_entreprise`,
                `Ville_de_l_entreprise`,
                `Nom_de_l_entreprise`,
                `Mot_de_passe_email_entreprise`,
                `Email_entreprise`,
                `Adresse_de_l_entreprise`,
                `Code_postal_de_l_entreprise`,
                `Image_de_l_entreprise`
            )
            VALUES(
                :siret_entreprise,
                :ville_entreprise,
                :nom_entreprise,
                :mdp_entreprise,
                :email_entreprise,
                :adresse_entreprise,
                :cp_entreprise,
                :img_entreprise
            )";

            $query = $db->prepare($sql);


            $query->bindValue(":siret_entreprise", htmlspecialchars($numero_de_siret), PDO::PARAM_STR);

            $query->bindValue(":ville_entreprise", htmlspecialchars($ville), PDO::PARAM_STR);

            $query->bindValue(":nom_entreprise", htmlspecialchars($nom_entreprise), PDO::PARAM_STR);

            $query->bindValue(":mdp_entreprise", password_hash($mdp_email_entreprise, PASSWORD_DEFAULT), PDO::PARAM_STR);

            $query->bindValue(":email_entreprise", $email_entreprise, PDO::PARAM_STR);

            $query->bindValue(":adresse_entreprise", htmlspecialchars($adresse_entreprise), PDO::PARAM_STR);

            $query->bindValue(":cp_entreprise", htmlspecialchars($code_postal_entreprise), PDO::PARAM_STR);

            $query->bindValue(":img_entreprise", "defaut.jpg", PDO::PARAM_STR);

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
        string $nouveau_numero_de_siret,
        string $nouvelle_ville,
        string $nouveau_nom_entreprise,
        string $nouveau_mdp_email_entreprise,
        string $nouvel_email_entreprise,
        string $nouvelle_adresse_entreprise,
        int $nouveau_code_postal_entreprise,
        int $id_entreprise,

    ) {
        try {
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            $sql = "UPDATE
            `entreprise`
        SET
            `Numéro_de_siret_entreprise` = :siret_entreprise,
            `Ville_de_l_entreprise` = :ville_entreprise,
            `Nom_de_l_entreprise` = :nom_entreprise,
            `Mot_de_passe_email_entreprise` = :mdp_entreprise,
            `Email_entreprise` = :email_entreprise,
            `Adresse_de_l_entreprise` = :adresse_entreprise,
            `Code_postal_de_l_entreprise` = :cp_entreprise
        WHERE
            `ID_entreprise` = :id_entreprise ";

            $query = $db->prepare($sql);


            $query->bindValue(":siret_entreprise", htmlspecialchars($nouveau_numero_de_siret), PDO::PARAM_STR);

            $query->bindValue(":ville_entreprise", htmlspecialchars($nouvelle_ville), PDO::PARAM_STR);

            $query->bindValue(":nom_entreprise", htmlspecialchars($nouveau_nom_entreprise), PDO::PARAM_STR);

            $query->bindValue(":mdp_entreprise", htmlspecialchars($nouveau_mdp_email_entreprise), PDO::PARAM_STR);

            $query->bindValue(":email_entreprise", $nouvel_email_entreprise, PDO::PARAM_STR);

            $query->bindValue(":adresse_entreprise", htmlspecialchars($nouvelle_adresse_entreprise), PDO::PARAM_STR);

            $query->bindValue(":cp_entreprise", htmlspecialchars($nouveau_code_postal_entreprise), PDO::PARAM_STR);

            $query->bindValue(":id_entreprise", htmlspecialchars($id_entreprise), PDO::PARAM_INT);


            $query = $query->execute();


        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            die();
        }
    }

    /**
     * 
     * Méthode pour supprimer un compte entrepise 
     * 
     */

    public static function Supprimer_compte_entreprise(
        int $id_entreprise
    ) {
        $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

        $sql = "DELETE FROM `entreprise` WHERE `ID_entreprise` = :id_entreprise";
        $query = $db->prepare($sql);

        $query->bindValue(':id_entreprise', $id_entreprise, PDO::PARAM_INT);

        return $query->execute();
    }
}