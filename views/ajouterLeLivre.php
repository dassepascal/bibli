<?php
ob_start() ;
?>


<?php
$content = ob_get_clean();
$titre = "Ajouter livre";
require('template.php');
?>
