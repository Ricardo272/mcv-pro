<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
</head>

<body>
    <h2>Page de connexion </h2>
    <?php if ($showform == true) { ?>
        <div class="form_inscription">
            <form action="../controllers/controller-signup.php" method="POST" novalidate>

                <label for="nom_entreprise">Nom de l'entreprise</label>

                <input type="text" id="nom_entreprise" name="nom_entreprise"
                    value="<?= isset($_POST['nom_entreprise']) ? htmlspecialchars($_POST['nom_entreprise']) : '' ?>">
            </form>
        </div>














    <?php } else { ?>

        <h2 class="">Félicitation Inscription validée <br> Veuillez vous connectez
            <br><a href="#">Connexion</a>
        </h2>

    <?php } ?>


</body>

</html>