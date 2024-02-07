<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/stye/style.css.css">
    <title>Signin</title>
</head>

<body class="signin">
    <h2>Connexion</h2>
    <form class="form_inscription" action="controller-signin.php" method="POST" novalidate>

        <label for="email_entreprise">Email </label>
        <input type="email" id="email_entreprise" name="email_entreprise"
            value="<?= isset($_POST["email_entreprise"]) ? htmlspecialchars($_POST["email_entreprise"]) : '' ?>">


        <label for="mdp_email_entreprise">Mot de passe </label>
        <input type="password" id="mdp_email_entreprise" name="mdp_email_entreprise"
            value="<?= isset($_POST["mdp_email_entreprise"]) ? htmlspecialchars($_POST["mdp_email_entreprise"]) : '' ?>">


        <input name="connexion" id="connexion" type="submit" value="Connexion">

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