<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>All User Page </title>
</head>

<body id="allUserPage">
    <h1>User Page </h1>

    <div class="container" id="ensembleUser">
        <div class="row">

            <?php

            $allUserData = json_decode(User::allUser($_SESSION["user"]["ID_entreprise"]), true);
            foreach ($allUserData as $user) {
                ?>
                <ul class="collection">
                    <li class="collection-item avatar ">
                        <img src="http://MVC.test/assets/image/image-upload/<?= $user["Photo_de_profil"] ?>"
                            alt="image utilisateur" class="circle responsive-img">
                        <span id="userPseudo">
                            <?= $user["Pseudo"] ?>
                        </span>
                        <p id="userEmail">
                            <?= $user["Email"] ?>
                            <br>
                            <?= $user["Date_de_naissance"] ?>
                        </p>
                        <div class="switch secondary-content">
                            <label> Off
                                <input type="checkbox" data-user-id="<?= $user['ID_utilisateur'] ?>"
                                    <?= $user["Utilisateur_valide"] == 1 ? "checked" : "" ?>>
                                <span class=" lever"></span>
                                On </label>
                        </div>

                    </li>
                </ul>
            <?php }

            ?>

        </div>
    </div>

</body>
<script>
    document.addEventListener('click', e => {
        if (e.target.type == 'checkbox') {

            if (e.target.checked == false) {

                fetch(`controller-ajax.php?unvalidate=${e.target.dataset.userId}`)
            }

            else {
                fetch(`controller-ajax.php?validate=${e.target.dataset.userId}`)

            }
        }
    })
</script>

</html>