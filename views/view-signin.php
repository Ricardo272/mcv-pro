<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style/style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Signin</title>
</head>

<body class="signin container">

    <h2>Connexion</h2>

    <form class="col s12" action="controller-signin.php" method="POST" novalidate>

        <div class="input-field col s12">

            <label for="email_entreprise"></label>
            <input placeholder="Email" type="email" id="email_entreprise" name="email_entreprise"
                value="<?= isset($_POST["email_entreprise"]) ? htmlspecialchars($_POST["email_entreprise"]) : '' ?>">

        </div>

        <div class="input-field col s12">

            <label for="mdp_email_entreprise"></label>
            <input placeholder="Mot de passe" type="password" id="mdp_email_entreprise" name="mdp_email_entreprise"
                value="<?= isset($_POST["mdp_email_entreprise"]) ? htmlspecialchars($_POST["mdp_email_entreprise"]) : '' ?>">

        </div>

        <?php if (isset($error['connexion'])) {
            echo $error['connexion'];
        } ?>


        <hr>
        <div class="g-recaptcha" data-sitekey="6LfDZ3EpAAAAAB8fQpmGUeQHAtWPCf-pjQa7m4LQ"></div>
        <?php
        if (isset($errors["captcha"])) {
            ?>
            <span class="error">
                <?= $errors["captcha"]; ?>
            </span>
            <?php
        }
        ?>

        <hr>

        <div class="container">
            <button class="btn waves-effect waves-light btn-large" name="connexion" id="connexion" type="submit"
                value="connexion">Connexion
                <i class="medium material-icons right">send</i>
            </button>
        </div>

        <div class="social">
            <div class="go"><i class="fab fa-google"></i> Google</div>
            <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
        </div>

    </form>

    <a href="../controllers/controller-signup.php">
        Toujours pas de compte ?
        <br>
        Inscrivez vous dès maintenant !!
    </a>

</body>

</html>