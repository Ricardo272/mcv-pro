<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.css">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Home</title>
</head>

<body>

    <h2>Home</h2>

    <h2>
        <?= $dateDuJour; ?>
    </h2>

    <a href="../controllers/controller-signout.php">
        <i class="bi bi-door-closed-fill"></i> Déconnexion
    </a>
    <div class="container">

        <div class="row">

            <ul class="col s12 m4 l2" id="slide-out" class="sidenav">

                <li>
                    <div class="user-view">
                        <div class="background">
                            <img src="images/office.jpg">
                        </div>
                        <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
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

            </ul>

            <div class="col s12 m4 l8">

                <div class="row">

                    <div class="col s4">
                        <div class="card">
                            <div class="card-content">
                                <h6>Nombre d'utilisateur(s) totaux</h6>
                                <?php
                                // Appeler la méthode statique countUser de la classe User pour obtenir le nombre total d'utilisateurs
                                $totalUser = User::countUser(); // Assurez-vous que cette méthode renvoie le nombre total d'utilisateurs
                                
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
                                $totalUserActif = User::countUserActif(); // Assurez-vous que cette méthode renvoie le nombre total d'utilisateurs
                                
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
                                $totalTrajet = User::countAllTrajet(); // Assurez-vous que cette méthode renvoie le nombre total d'utilisateurs
                                
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
                            <div class="card-image">
                                <img src="images/sample-1.jpg">
                                <span class="card-title">Card Title</span>
                                <a class="btn-floating halfway-fab waves-effect waves-light red"><i
                                        class="material-icons">add</i></a>
                            </div>
                            <div class="card-content">
                                <p>I am a very simple card. I am good at containing small bits of information. I am
                                    convenient because I require little markup to use effectively.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col s6 ">
                        <div class="card">
                            <div class="card-image">
                                <img src="images/sample-1.jpg">
                                <span class="card-title">Card Title</span>
                                <a class="btn-floating halfway-fab waves-effect waves-light red"><i
                                        class="material-icons">add</i></a>
                            </div>
                            <div class="card-content">
                                <p>I am a very simple card. I am good at containing small bits of information. I am
                                    convenient because I require little markup to use effectively.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col 12">
                        <div class="card">
                            <div class="card-image">
                                <img src="images/sample-1.jpg">
                                <span class="card-title">Card Title</span>
                                <a class="btn-floating halfway-fab waves-effect waves-light red"><i
                                        class="material-icons">add</i></a>
                            </div>
                            <div class="card-content">
                                <p>I am a very simple card. I am good at containing small bits of information. I am
                                    convenient because I require little markup to use effectively.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col s12 m4 l2">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci officiis id aut magni ratione,
                    ducimus odio autem explicabo aliquid, doloremque dolor ea delectus ut expedita nobis voluptatem modi
                    nesciunt reiciendis accusamus! Doloribus itaque similique sunt blanditiis eveniet repellat.
                    Voluptatem, cumque ipsa? Libero animi illum, inventore cumque repellat saepe doloribus ullam amet,
                    voluptatibus voluptas assumenda pariatur fuga similique ut omnis quidem tempore fugiat at.
                    Consequuntur quisquam fugiat incidunt hic, atque rem autem ea pariatur soluta reiciendis at
                    praesentium animi dolorum quos dignissimos vitae nulla architecto distinctio exercitationem placeat
                    possimus repellendus accusamus eum. Cupiditate debitis illum perspiciatis iste ex id atque dolores?
                </p>
            </div>

        </div>



    </div>

</body>

</html>