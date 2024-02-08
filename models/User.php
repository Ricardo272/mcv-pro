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
}