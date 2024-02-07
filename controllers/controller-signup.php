<?php
// Config
require_once "../config.php";
// Models
require_once "../models/Entreprise.php";

$showform = true;
$regex = "/^[a-zA-ZÀ-ÿ\_\-\d]+$/";

if ($_SERVER['REQUEST_METHOD'] == $_POST) {
    $error = [];

}

?>

<?php
include_once('../views/view-signup.php');
?>