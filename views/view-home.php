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

<body class="grey darken-3 white-text ">

    <h2 class="center-align">DASHBOARD</h2>

    <h3 class="valign-wrapper">
        <i class="large material-icons">access_time</i>
        <?= $dateDuJour; ?>
    </h3>


    <div class="container ">

        <div class="row">

            <ul class="col s12 m4 l2 " id="slide-out" class="sidenav">

                <li>
                    <div class="user-view ">
                        <a href="#user"><img class="circle responsive-img"
                                src="../assets/image/image-par-defaut/img-profil-defaut.png"></a>

                    </div>
                </li>
                <li>
                    <p class="valign-wrapper">
                        Entreprise :
                        <?= $_SESSION["user"]["Nom_de_l_entreprise"]; ?>
                    </p>
                </li>
                <li>
                    Ville :
                    <?= $_SESSION["user"]["Ville_de_l_entreprise"]; ?>
                </li>
                <li>
                    Adresse :
                    <?= $_SESSION["user"]["Adresse_de_l_entreprise"]; ?>
                </li>
                <li>
                    Code postal :
                    <?= $_SESSION["user"]["Code_postal_de_l_entreprise"]; ?>
                </li>
                <li>
                    Siret :
                    <?= $_SESSION["user"]["Numéro_de_siret_entreprise"]; ?>
                </li>
                <li class="hoverable"><a href="../controllers/controller-signout.php">
                        <i class="bi bi-door-closed-fill"></i> Déconnexion
                    </a></li>

            </ul>

            <div class="col s12 m4 l8 center-align ">

                <div class="row">

                    <div class="col s4">
                        <div class="card">
                            <div class="card-content hoverable black">
                                <h6>Nombre d'utilisateur(s) totaux</h6>
                                <?php
                                $totalUser = User::countUser($_SESSION["user"]["ID_entreprise"]);
                                echo "<p>$totalUser</p>";
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="col s4">
                        <div class="card">
                            <div class="card-content hoverable black">
                                <h6>Nombre d'utilisateur(s) actif totaux</h6>
                                <?php
                                $totalUserActif = User::countUserActif($_SESSION["user"]["ID_entreprise"]);
                                echo "<p>$totalUserActif</p>";
                                ?>
                            </div>
                        </div>
                    </div>


                    <div class="col s4">
                        <div class="card">
                            <div class="card-content hoverable black">
                                <h6>Nombre de trajets totaux </h6>
                                <?php
                                $totalTrajet = User::countAllTrajet($_SESSION["user"]["ID_entreprise"]);
                                echo "<p>$totalTrajet</p>";
                                ?>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="row">

                    <div class="col s6">
                        <div class="card">
                            <div class="card-content hoverable black">
                                <h6>Stats hebdo ( A venir )</h6>

                            </div>
                        </div>

                    </div>

                    <div class="col s6 ">
                        <div class="card">
                            <div class="card-content z-depth-5 black">
                                <h6>Stats des moyens de transport </h6>

                                <div><canvas id="graph"></canvas></div>
                                <script>
                                    // Récupérer l'élément canvas
                                    const graphique = document.getElementById('graph');

                                    // Décodez les données JSON récupérées depuis PHP
                                    const data = <?php echo $json_data; ?>;

                                    new Chart(graphique, {
                                        type: "doughnut",
                                        data: data,
                                        options: {
                                            scales: {
                                                y: {
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

                <div class="card-content ">


                    <h6 class="center-align z-depth-5 black">Les 5 derniers trajets enregistrés</h6>
                    <?php
                    $lastTrajets = User::lastFiveTrajets($_SESSION["user"]["ID_entreprise"]);
                    foreach ($lastTrajets as $trajet) {
                        echo "<div class='col s4 center-align trajet-card'>";
                        echo "<p><h6>Date du trajet</h6>" . $trajet['Date_du_trajet'] . "</p>";
                        echo "<p><h6>Distance parcourue</h6> " . $trajet['Distance_parcourue'] . " km</p>";
                        echo "</div>";
                    }
                    ?>


                </div>

            </div>

            <div class="col s12 m4 l2">
                <h6 class="center-align z-depth-5 black">Les 5 derniers utilisateurs</h6>
                <?php
                $lastUsers = User::lastFiveUser($_SESSION["user"]["ID_entreprise"]);

                foreach ($lastUsers as $user) {
                    echo "<div class='user-card'>";
                    echo "<img class='circle responsive-img'
                                src='../assets/image/image-par-defaut/img-profil-defaut.png'>";
                    // echo "<img src='" . $user['Photo_de_profil'] . "' alt='Photo de profil'>";
                    echo "<p>Pseudo : " . $user['Pseudo'] . "</p>";
                    echo "</div>";
                }
                ?>
            </div>

        </div>



    </div>

    <script src="../assets/js/scriptGraph.js"></script>
</body>

</html>