<!DOCTYPE html>
<html lang="en">

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

    <div class="container">
        <div class="row">
            <?php

            $allUserData = json_decode(User::allUser($_SESSION["user"]["ID_entreprise"]), true);
            foreach ($allUserData as $user) {
                echo "<div class='col s12 m6 l3' id='loopDataUser' class='user-card '>";
                echo "<p id='userPseudo' >" . $user['Pseudo'] . "</p>";
                echo "<img class='circle responsive-img' src='http://MVC.test/assets/image/image-upload/" . $user['Photo_de_profil'] . "'>";
                echo "  <p id='userEmail'>" . $user['Email'] . "</p>";
                echo "</div>";

            }
            ?>

        </div>
    </div>

</body>

</html>