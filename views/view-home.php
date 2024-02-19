<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../assets/style/style.css">

    <title>Home</title>
</head>

<body class="grey darken-3 white-text " id="dashbord">

    <h2 id="titreDashbord">DASHBOARD</h2>

    <h3 class="valign-wrapper " id="dateDuJour">
        <i class="large material-icons">access_time</i>
        <?= $dateDuJour; ?>
    </h3>


    <div class="container " id="ensembleDashbord">

        <div class="row">

            <ul class="col s12 m4 l2 " id="sideNav">

                <li>
                    <div class="user-view ">
                        <a href="#user"><img class="circle responsive-img"
                                src="../assets/image/image-par-defaut/img-profil-defaut.png"></a>

                    </div>
                </li>
                <li>
                    <div class="contours">
                        <p class="titreInfo">Entreprise</p>
                        <p class="dataInfo">
                            <?= $_SESSION["user"]["Nom_de_l_entreprise"]; ?>
                        </p>

                    </div>

                </li>
                <li>
                    <div class="contours">
                        <p class="titreInfo">Ville</p>
                        <p class="dataInfo">
                            <?= $_SESSION["user"]["Ville_de_l_entreprise"]; ?>
                        </p>
                    </div>
                </li>
                <li>
                    <div class="contours">
                        <p class="titreInfo">Adresse</p>
                        <p class="dataInfo">
                            <?= $_SESSION["user"]["Adresse_de_l_entreprise"]; ?>
                        </p>
                    </div>
                </li>
                <li>
                    <div class="contours">
                        <p class="titreInfo">Code postal</p>
                        <p class="dataInfo">
                            <?= $_SESSION["user"]["Code_postal_de_l_entreprise"]; ?>
                        </p>
                    </div>
                </li>
                <li>
                    <div class="contours">
                        <p class="titreInfo">Siret</p>
                        <p class="dataInfo">
                            <?= $_SESSION["user"]["Numéro_de_siret_entreprise"]; ?>
                        </p>
                    </div>

                </li>

                <a class="deconnexion" href="../controllers/controller-signout.php">
                    Déconnexion
                </a>

            </ul>

            <div class="col s12 m4 l8 center-align ">

                <div class="row">

                    <div class="col s4">
                        <div class="card" id="cardUserTot">
                            <div id="userTot" class="card-content hoverable ">
                                <h6>Nombre d'utilisateur(s) totaux</h6>
                                <?php
                                $totalUser = json_decode(User::countAllEntrepriseJson($_SESSION["user"]["ID_entreprise"]), true);
                                echo "<p class='nb'><i class='material-icons'>person</i>$totalUser</p>";
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="col s4">
                        <div class="card" id="cardActifTot">
                            <div id="userActifTot" class="card-content hoverable ">
                                <h6>Nombre d'utilisateur(s) actif totaux</h6>
                                <?php
                                $totalUserActif = json_decode(User::countUserActif($_SESSION["user"]["ID_entreprise"]), true);
                                echo "<p class='nb'> <i class='material-icons'> directions_bike</i>$totalUserActif</p>";
                                ?>
                            </div>
                        </div>
                    </div>


                    <div class="col s4">
                        <div class="card" id="cardTrajetTot">
                            <div id="trajetTot" class="card-content hoverable ">
                                <h6>Nombre de trajets totaux <br><br></h6>
                                <?php
                                $totalTrajet = json_decode(User::countAllTrajet($_SESSION["user"]["ID_entreprise"]), true);
                                echo "<p class='nb'><i class='material-icons'>my_location</i>$totalTrajet</p>";
                                ?>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="row">

                    <div class="col s6">
                        <div class="card" id="cardAVenir">
                            <div class="card-content hoverable black" id="aVenir">
                                <h6>Stats hebdo ( A venir )</h6>

                            </div>
                        </div>

                    </div>

                    <div class="col s6 ">
                        <div class="card" id="cardGraphStat">
                            <div class="card-content z-depth-5 " id="GraphStat">
                                <h6>Stats des moyens de transport </h6>

                                <div><canvas id="graph"></canvas></div>
                                <script>
                                    // Récupérer l'élément canvas
                                    const graphique = document.getElementById('graph');

                                    // Décodez les données JSON récupérées depuis PHP
                                    const nbTrajet = <?php echo $json_dataTrajetGraph; ?>;

                                    new Chart(graphique, {
                                        type: "doughnut",
                                        data: nbTrajet,
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                },
                                                x: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                </script>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-content" id="cardLastTrajet">

                    <h6 class="center-align z-depth-5 " id="lastTrajet">Les 5 derniers trajets enregistrés</h6>
                    <?php
                    $lastTrajets = json_decode(User::lastFiveTrajets($_SESSION["user"]["ID_entreprise"]), true);
                    foreach ($lastTrajets as $trajet) {
                        echo "<div class='col s4 center-align hoverable' id='cardTrajet'>";
                        echo "<h6>Date du trajet</h6>" . $trajet['Date_du_trajet'];
                        echo "<h6>Distance parcourue</h6> " . $trajet['Distance_parcourue'] . " Km";
                        echo "</div>";
                    }
                    ?>


                </div>

            </div>

            <div id="blockLastUser" class="col s12 m4 l2">
                <h6 id="lastUser" class="center-align z-depth-5 ">Les 5 derniers utilisateurs</h6>
                <?php

                $lastUsers = json_decode(User::lastFiveUser($_SESSION["user"]["ID_entreprise"]), true);
                foreach ($lastUsers as $user) {
                    echo "<div id='dataUser' class='user-card '>";
                    echo "<p id='userPseudo' >" . $user['Pseudo'] . "</p>";
                    echo "<img class='circle responsive-img' src='http://MVC.test/assets/image/image-upload/" . $user['Photo_de_profil'] . "'>";
                    echo "</div>";

                }
                ?>
            </div>

        </div>



    </div>


</body>

</html>