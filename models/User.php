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
     *   
     * @return int Le nombre total d'utilisateurs
     *
     */

    public static function countUser(

    ) {
        try {
            // Connexion à la base de données
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // Requête SQL pour compter le nombre total d'utilisateurs
            $sql = "SELECT COUNT(*) AS total_utilisateur FROM `utilisateur`";

            // Préparation et exécution de la requête
            $query = $db->prepare($sql);
            $query->execute();

            // Récupération du résultat
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // Retourner le nombre total d'utilisateurs
            return $result['total_utilisateur'];
        } catch (PDOException $e) {
            // Gestion des erreurs de connexion à la base de données
            echo "Erreur : " . $e->getMessage();
            die();
        }
    }

    public static function countUserActif()
    {
        try {
            // Connexion à la base de données
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // Requête SQL pour compter le nombre total d'utilisateurs
            $sql = "SELECT COUNT(DISTINCT u.`ID_utilisateur`) AS total_utilisateur_actif FROM `utilisateur` AS u JOIN `trajets_de_l_utilisateur` AS t ON u.`ID_utilisateur` = t.`ID_utilisateur`;";
            // Préparation et exécution de la requête
            $query = $db->prepare($sql);
            $query->execute();

            // Récupération du résultat
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // Retourner le nombre total d'utilisateurs
            return $result['total_utilisateur_actif'];
        } catch (PDOException $e) {
            // Gestion des erreurs de connexion à la base de données
            echo "Erreur : " . $e->getMessage();
            die();
        }
    }

    public static function countAllTrajet()
    {
        try {
            // Connexion à la base de données
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // Requête SQL pour compter le nombre total de trajets
            $sql = "SELECT COUNT(*) AS total_trajets FROM `trajets_de_l_utilisateur`";

            // Préparation et exécution de la requête
            $query = $db->prepare($sql);
            $query->execute();

            // Récupération du résultat
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // Retourner le nombre total de trajets
            return $result['total_trajets'];
        } catch (PDOException $e) {
            // Gestion des erreurs de connexion à la base de données
            echo "Erreur : " . $e->getMessage();
            die();
        }
    }

}