<?php

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http")));
var_dump(URL);
require_once "controllers/Livres.controller.controller.php";
$livreController = new LivresController;

if (empty($_GET['page'])) {
  require "views/accueil.view.php";
} else {
  switch ($_GET['page']) {
    case 'accueil':
      require "views/accueil.view.php";
      break;
    case "livres":
      $livreController->afficherLivres();
      break;
  }
}
