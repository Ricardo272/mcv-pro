<?php

class User
{
    /**
     *Méthode pour stocker les données User  
     *
     * @param string $idUser Identifiant User
     * @param string $pseudoUser Pseudo User
     * @param string $idEntreprise Identifiant Entreprise assoc user
     * @param string $valideUser User valide 
     * @param string $pseudo Pseudo de l'utilisateur
     *   
     * @return int Le nombre total d'utilisateurs
     *
     */

    // public static function countUser($idEntreprise)
    // {
    //     try {
    //         // Connexion à la base de données
    //         $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

    //         // Requête SQL pour compter le nombre total d'utilisateurs
    //         $sql = "SELECT COUNT(*) AS total_utilisateur FROM `utilisateur` WHERE `ID_entreprise`= :idEntreprise";

    //         // Préparation et exécution de la requête
    //         $query = $db->prepare($sql);
    //         $query->bindValue(':idEntreprise', $idEntreprise, PDO::PARAM_INT);
    //         $query->execute();

    //         // Récupération du résultat
    //         $result = $query->fetch(PDO::FETCH_ASSOC);

    //         // Retourner le nombre total d'utilisateurs
    //         return $result['total_utilisateur'];
    //     } catch (PDOException $e) {
    //         // Gestion des erreurs de connexion à la base de données
    //         echo "Erreur : " . $e->getMessage();
    //         die();
    //     }
    // }

    public static function countAllEntrepriseJson($idEntreprise)
    {
        try {
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            $sql = "SELECT COUNT(*) AS total_utilisateur FROM `utilisateur` WHERE `ID_entreprise`= :idEntreprise";

            $query = $db->prepare($sql);

            $query->bindValue(':idEntreprise', $idEntreprise, PDO::PARAM_INT);

            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            $json_result = json_encode($result['total_utilisateur']);

            return $json_result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    public static function countUserActif($idEntreprise)
    {
        try {
            // Connexion à la base de données
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // Requête SQL pour compter le nombre total d'utilisateurs
            $sql = "SELECT COUNT(DISTINCT u.`ID_utilisateur`) AS total_utilisateur_actif FROM `utilisateur` AS u JOIN `trajets_de_l_utilisateur` AS t ON u.`ID_utilisateur` = t.`ID_utilisateur` WHERE `ID_entreprise`= :idEntreprise";
            // Préparation et exécution de la requête
            $query = $db->prepare($sql);
            $query->bindValue(':idEntreprise', $idEntreprise, PDO::PARAM_INT);
            $query->execute();

            // Récupération du résultat
            $result = $query->fetch(PDO::FETCH_ASSOC);

            $json_result = json_encode($result['total_utilisateur_actif']);
            // Retourner le nombre total d'utilisateurs
            return $json_result;
        } catch (PDOException $e) {
            // Gestion des erreurs de connexion à la base de données
            echo "Erreur : " . $e->getMessage();
            die();
        }
    }

    public static function countAllTrajet($idEntreprise)
    {
        try {
            // Connexion à la base de données
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // Requête SQL pour compter le nombre total de trajets
            $sql = "SELECT COUNT(*) AS total_trajets FROM `trajets_de_l_utilisateur` NATURAL JOIN `utilisateur` WHERE `ID_entreprise` = :idEntreprise;";

            // Préparation et exécution de la requête
            $query = $db->prepare($sql);
            $query->bindValue(':idEntreprise', $idEntreprise, PDO::PARAM_INT);
            $query->execute();

            // Récupération du résultat
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $json_result = json_encode($result['total_trajets']);
            // Retourner le nombre total de trajets
            return $json_result;
        } catch (PDOException $e) {
            // Gestion des erreurs de connexion à la base de données
            echo "Erreur : " . $e->getMessage();
            die();
        }
    }
    public static function lastFiveUser(
        string $idEntreprise

    ) {
        try {
            // Connexion à la base de données
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // Requête SQL pour afficher les derniers utilisateurs avec leur pseudo et leur photo de profil
            $sql = "SELECT * FROM `utilisateur` WHERE `ID_entreprise` = :idEntreprise ORDER BY `ID_utilisateur` DESC LIMIT 5";

            // Préparation de la requête
            $query = $db->prepare($sql);
            $query->bindValue(':idEntreprise', $idEntreprise, PDO::PARAM_INT);

            // Exécution de la requête
            $query->execute();

            // Récupération des résultats
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            $json_result = json_encode($result);
            // Retourner les résultats
            return $json_result;

        } catch (PDOException $e) {
            // Gestion des erreurs de connexion à la base de données
            echo "Erreur : " . $e->getMessage();
            die();
        }
    }

    public static function lastFiveTrajets($idEntreprise)
    {
        try {
            // Connexion à la base de données
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // Requête SQL pour récupérer les 5 derniers trajets enregistrés
            $sql = "SELECT * FROM `trajets_de_l_utilisateur` NATURAL JOIN `utilisateur` WHERE `ID_entreprise` = :idEntreprise ORDER BY `ID_trajet` DESC LIMIT 6;";

            // Préparation de la requête
            $query = $db->prepare($sql);
            $query->bindValue(':idEntreprise', $idEntreprise, PDO::PARAM_INT);

            // Exécution de la requête
            $query->execute();

            // Récupération des résultats
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            $json_result = json_encode($result);

            // Retourner les résultats
            return $json_result;

        } catch (PDOException $e) {
            // Gestion des erreurs de connexion à la base de données
            echo "Erreur : " . $e->getMessage();
            die();
        }
    }

}