<?php

class trajet
{

    /**
     * 
     * Méthode permettant de récupérer tous les trajets 
     * 
     */

    public static function countAllTrajetGraph()
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            $sql = "SELECT RIDE_TYPE, COUNT(*) AS Nombre_utilisations FROM trajets_de_l_utilisateur INNER JOIN type_de_transport ON trajets_de_l_utilisateur.ID_vehicule = type_de_transport.ID_vehicule GROUP BY RIDE_TYPE;";

            $query = $db->prepare($sql);

            // on execute la requête
            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            // Formater les données pour qu'elles correspondent à la structure souhaitée
            $typeTransport = [];
            $nbTrajet = [];

            foreach ($result as $row) {
                $typeTransport[] = $row['RIDE_TYPE'];
                $nbTrajet[] = $row['Nombre_utilisations'];

            }

            // Construire un tableau associatif pour encoder en JSON
            $json_dataTrajetGraph = [
                'labels' => $typeTransport,
                'datasets' => [
                    [
                        'label' => 'Trajets',
                        'data' => $nbTrajet,
                        'borderWidth' => 2
                    ]
                ]
            ];

            // Encoder les données en JSON
            $json_result = json_encode($json_dataTrajetGraph);

            return $json_result;


        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

}