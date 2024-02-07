<?php
// Config
require_once "../config.php";
// Models
require_once "../models/Entreprise.php";

$showform = true;
$regex = "/^[a-zA-ZÀ-ÿ\_\-\d]+$/";

Entreprise::Modifier_infos_entreprise("15789615151515", "caeen", "KingsMan", "1234567890", "nnatiV@gmail.com", "2 rrue de la briqueterie", "76500", "21");


?>

<?php
include_once('../views/view-signup.php');
?>