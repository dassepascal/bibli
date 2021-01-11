<?php
//! copie de index.php

ob_start() ?>

ici page d'accueil
<?php
$content = ob_get_clean();
$titre = "Bibliothéque MGA";
require('template.php');
?>
