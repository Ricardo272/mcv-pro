<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Signin</title>
</head>

<body class="signin grey darken-3">

    <div class="container">
        <h2>
            <i class="medium material-icons left">account_box</i>
            Page d'inscription
        </h2>
    </div>


    <?php if ($showform == true) { ?>

        <div class="container light-green darken-4 z-depth-5 ">

            <form class="col s12" action="../controllers/controller-signup.php" method="POST" novalidate>

                <div class="row">

                    <div class="input-field col s6">
                        <label for="nom_entreprise"></label>
                        <input placeholder="Nom de l'entreprise" type="text" id="nom_entreprise" name="nom_entreprise"
                            class="validate" value="<?=
                                isset($_POST['nom_entreprise']) ? htmlspecialchars($_POST['nom_entreprise']) : '' ?>">

                        <span class="error">
                            <?php
                            if (isset($error['nom_entreprise'])) {
                                echo $error['nom_entreprise'];
                            }
                            ?>
                        </span>
                    </div>

                    <div class="input-field col s6">
                        <label for="ville"></label>
                        <input placeholder="Ville" type="text" id="ville" name="ville" value="<?=
                            isset($_POST['ville']) ? htmlspecialchars($_POST['ville']) : '' ?>">

                        <span class="error">
                            <?php
                            if (isset($error['ville'])) {
                                echo $error['ville'];
                            }
                            ?>
                        </span>

                    </div>

                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <label for="email_entreprise"></label>
                        <input placeholder="Email" type="email" id="email_entreprise" name="email_entreprise" value="<?=
                            isset($_POST['email_entreprise']) ? htmlspecialchars($_POST['email_entreprise']) : '' ?>">

                        <span class="error">
                            <?php
                            if (isset($error['email_entreprise'])) {
                                echo $error['email_entreprise'];
                            }
                            ?>
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <label for="mdp_email_entreprise"></label>
                        <input placeholder="Mot de passe" type="password" id="mdp_email_entreprise"
                            name="mdp_email_entreprise"
                            value="<?=
                                isset($_POST['mdp_email_entreprise']) ? htmlspecialchars($_POST['mdp_email_entreprise']) : '' ?>">

                        <span class="error">
                            <?php
                            if (isset($error['mdp_email_entreprise'])) {
                                echo $error['mdp_email_entreprise'];
                            }
                            ?>
                        </span>
                    </div>

                    <div class="input-field col s6">
                        <label for="verif_mdp"></label>
                        <input placeholder="Confirmer le mot de passe " type="password" id="verif_mdp" name="verif_mdp"
                            value="<?=
                                isset($_POST['verif_mdp']) ? htmlspecialchars($_POST['verif_mdp']) : '' ?>">

                        <span class="error">
                            <?php
                            if (isset($error['verif_mdp'])) {
                                echo $error['verif_mdp'];
                            }
                            ?>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="numero_de_siret"></label>
                        <input placeholder="Numéro de siret" type="text" id="numero_de_siret" name="numero_de_siret" value="<?=
                            isset($_POST['numero_de_siret']) ? htmlspecialchars($_POST['numero_de_siret']) : '' ?>">

                        <span class="error">
                            <?php
                            if (isset($error['numero_de_siret'])) {
                                echo $error['numero_de_siret'];
                            }
                            ?>
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <label for="adresse_entreprise"></label>
                        <input placeholder="Adresse postale" type="text" id="adresse_entreprise" name="adresse_entreprise"
                            value="<?=
                                isset($_POST['adresse_entreprise']) ? htmlspecialchars($_POST['adresse_entreprise']) : '' ?>">

                        <span class="error">
                            <?php
                            if (isset($error['adresse_entreprise'])) {
                                echo $error['adresse_entreprise'];
                            }
                            ?>
                        </span>
                    </div>

                    <div class="input-field col s6">
                        <label for="code_postal_entreprise"></label>
                        <input placeholder="Code postale" type="text" id="code_postal_entreprise"
                            name="code_postal_entreprise"
                            value="<?=
                                isset($_POST['code_postal_entreprise']) ? htmlspecialchars($_POST['code_postal_entreprise']) : '' ?>">

                        <span class="error">
                            <?php
                            if (isset($error['code_postal_entreprise'])) {
                                echo $error['code_postal_entreprise'];
                            }
                            ?>
                        </span>
                    </div>
                </div>


                <div class="container">
                    <button class="btn waves-effect waves-light btn-large" name="enregister" id="enregister" type="submit"
                        value="S'enregistrer">Valider l'inscription
                        <i class="medium material-icons right">send</i>
                    </button>
                </div>


            </form>

        </div>

        <footer class="page-footer light-green darken-3">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Footer Content</h5>
                        <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer
                            content.</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2024 Copyright Text
                    <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                </div>
            </div>
        </footer>













    <?php } else { ?>

        <h2 class="">Félicitation inscription validée <br>
            <hr> Veuillez vous connectez
            <br>
            <hr>
            <a href="../controllers/controller-signin.php">Connexion</a>

        </h2>

    <?php } ?>


</body>

</html>