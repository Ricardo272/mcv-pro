<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Signin</title>
</head>

<body class="signin">
    <h2>Page d'inscription</h2>
    <?php if ($showform == true) { ?>
        <div class="form_inscription">
            <form action="../controllers/controller-signup.php" method="POST" novalidate>

                <label for="nom_entreprise">Nom de l'entreprise</label>

                <input type="text" id="nom_entreprise" name="nom_entreprise" value="<?=
                    isset($_POST['nom_entreprise']) ? htmlspecialchars($_POST['nom_entreprise']) : '' ?>">

                <span class="error">
                    <?php
                    if (isset($error['nom_entreprise'])) {
                        echo $error['nom_entreprise'];
                    }
                    ?>
                </span>

                <label for="ville">Ville</label>

                <input type="text" id="ville" name="ville" value="<?=
                    isset($_POST['ville']) ? htmlspecialchars($_POST['ville']) : '' ?>">

                <span class="error">
                    <?php
                    if (isset($error['ville'])) {
                        echo $error['ville'];
                    }
                    ?>
                </span>

                <label for="email_entreprise">Email</label>

                <input type="email" id="email_entreprise" name="email_entreprise" value="<?=
                    isset($_POST['email_entreprise']) ? htmlspecialchars($_POST['email_entreprise']) : '' ?>">

                <span class="error">
                    <?php
                    if (isset($error['email_entreprise'])) {
                        echo $error['email_entreprise'];
                    }
                    ?>
                </span>

                <label for="mdp_email_entreprise">Mot de passe</label>

                <input type="password" id="mdp_email_entreprise" name="mdp_email_entreprise" value="<?=
                    isset($_POST['mdp_email_entreprise']) ? ($_POST['mdp_email_entreprise']) : '' ?>">

                <span class="error">
                    <?php
                    if (isset($error['mdp_email_entreprise'])) {
                        echo $error['mdp_email_entreprise'];
                    }
                    ?>
                </span>

                <label for="verif_mdp_email_entreprise">Confimer le mot de passe </label>

                <input type="password" id="verif_mdp_email_entreprise" name="verif_mdp_email_entreprise" value="<?=
                    isset($_POST['verif_mdp_email_entreprise']) ? ($_POST['verif_mdp_email_entreprise']) : '' ?>">

                <span class="error">
                    <?php
                    if (isset($error['verif_mdp_email_entreprise'])) {
                        echo $error['verif_mdp_email_entreprise'];
                    }
                    ?>
                </span>

                <label for="numero_de_siret">Numéro de siret</label>

                <input type="text" id="numero_de_siret" name="numero_de_siret" value="<?=
                    isset($_POST['numero_de_siret']) ? htmlspecialchars($_POST['numero_de_siret']) : '' ?>">

                <span class="error">
                    <?php
                    if (isset($error['numero_de_siret'])) {
                        echo $error['numero_de_siret'];
                    }
                    ?>
                </span>

                <label for="adresse_entreprise">Adresse postale</label>

                <input type="text" id="adresse_entreprise" name="adresse_entreprise" value="<?=
                    isset($_POST['adresse_entreprise']) ? htmlspecialchars($_POST['adresse_entreprise']) : '' ?>">

                <span class="error">
                    <?php
                    if (isset($error['adresse_entreprise'])) {
                        echo $error['adresse_entreprise'];
                    }
                    ?>
                </span>

                <label for="code_postal_entreprise">Code postale</label>

                <input type="text" id="code_postal_entreprise" name="code_postal_entreprise"
                    value="<?=
                        isset($_POST['code_postal_entreprise']) ? htmlspecialchars($_POST['code_postal_entreprise']) : '' ?>">

                <span class="error">
                    <?php
                    if (isset($error['code_postal_entreprise'])) {
                        echo $error['code_postal_entreprise'];
                    }
                    ?>
                </span>

                <label for="cgu">
                    <a href="#">
                        Conditions général d'utilisation
                    </a>
                    <input class="cache" name="cgu" type="checkbox" value="Accepter les CGU ?" required>
                </label>
                <span class="error">
                    <?php if (isset($errors['cgu'])) {
                        echo $errors['cgu'];
                    } ?>
                </span>

                <input name="enregister" id="enregister" type="submit" value="S'enregistrer">

            </form>

        </div>














    <?php } else { ?>

        <h2 class="">Félicitation inscription validée <br> Veuillez vous connectez
            <br><a href="#">Connexion</a>
        </h2>

    <?php } ?>


</body>

</html>