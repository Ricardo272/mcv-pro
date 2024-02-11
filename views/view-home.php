<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Home</title>
</head>

<body>

    <h2>Home</h2>

    <h2>
        <?= $dateDuJour; ?>
    </h2>


    <div class="container ">

        <div class="row">

            <ul class="col s12 m4 l2" id="slide-out" class="sidenav">

                <li>
                    <div class="user-view">
                        <div class="background ">
                            <img src="../assets/image/image-par-defaut/">
                        </div>
                        <a href="#user"><img class="circle responsive-img"
                                src="../assets/image/image-par-defaut/img-profil-defaut.png"></a>
                        <a href="#name"><span class="white-text name">John Doe</span></a>
                        <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
                    </div>
                </li>
                <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
                <li><a href="#!">Second Link</a></li>
                <li>
                    <div class="divider"></div>
                </li>
                <li><a class="subheader">Subheader</a></li>
                <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
                <li><a href="../controllers/controller-signout.php">
                        <i class="bi bi-door-closed-fill"></i> Déconnexion
                    </a></li>

            </ul>

            <div class="col s12 m4 l8 ">

                <div class="row">

                    <div class="col s4">
                        <div class="card">
                            <div class="card-content">
                                <h6>Nombre d'utilisateur(s) totaux</h6>
                                <?php
                                // Appeler la méthode statique countUser de la classe User pour obtenir le nombre total d'utilisateurs
                                $totalUser = User::countUser();
                                // Afficher le nombre total d'utilisateurs
                                echo "<p>$totalUser</p>";
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="col s4">
                        <div class="card">
                            <div class="card-content">
                                <h6>Nombre d'utilisateur actif totaux</h6>
                                <?php
                                // Appeler la méthode statique countUser de la classe User pour obtenir le nombre total d'utilisateurs
                                $totalUserActif = User::countUserActif();
                                // Afficher le nombre total d'utilisateurs
                                echo "<p>$totalUserActif</p>";
                                ?>
                            </div>
                        </div>
                    </div>


                    <div class="col s4">
                        <div class="card">
                            <div class="card-content">
                                <h6>Nombre de trajets total </h6>
                                <?php
                                // Appeler la méthode statique countUser de la classe User pour obtenir le nombre total d'utilisateurs
                                $totalTrajet = User::countAllTrajet();
                                // Afficher le nombre total d'utilisateurs
                                echo "<p>$totalTrajet</p>";
                                ?>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="row">

                    <div class="col s6">
                        <div class="card">
                            <div class="card-content">
                                <h6>Stats hebdo ( A venir )</h6>

                            </div>
                        </div>

                    </div>

                    <div class="col s6 ">
                        <div class="card">
                            <div class="card-content">
                                <h6>Les 5 derniers trajets enregistrés</h6>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col 12" class="card">

                        <div class="card-content">
                            <h6>Les 5 derniers trajets enregistrés</h6>
                            <?php
                            // Appeler la méthode statique lastFiveTrajet de la classe trajet pour obtenir les 5 derniers trajets
                            $lastTrajets = User::lastFiveTrajets();
                            // Parcourir les résultats et afficher chaque trajet
                            foreach ($lastTrajets as $trajet) {
                                echo "<div class='col s4' class='trajet-card'>";
                                echo "<p>Date du trajet : " . $trajet['Date_du_trajet'] . "</p>";
                                echo "<p>Distance parcourue : " . $trajet['Distance_parcourue'] . " km</p>";
                                echo "</div>";
                            }
                            ?>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col s12 m4 l2">
                <h6>Les 5 derniers utilisateurs</h6>
                <?php
                // Appeler la méthode statique lastFiveUser de la classe User pour obtenir les 5 derniers utilisateurs
                $lastUsers = User::lastFiveUser("Pseudo");

                // Parcourir les résultats et afficher chaque utilisateur dans une carte
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

</body>

</html>