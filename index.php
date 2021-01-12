<?php
//? fonction ternaire  pour mettre soit https ou http en fonction de la variable ($_SERVER['HTTPS'])
// var_dump(URL);'http://localhost:8080/udemy/gaston/php2/bibli/'
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
var_dump(URL);
require_once "controllers/Livres.controller.controller.php";
$livreController = new LivresController;

if (empty($_GET['page'])) {
  require "views/accueil.view.php";
} else {
  // decomposition de l'url utilisation de la fonction explode
  // securisation de l'envoi à travers l'url avec: filter_var($_GET['page']), FILTER_SANITIZE_URL

  $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
  // echo '<pre>';
  // print_r($url);
  // echo '<pre>';
  switch ($_GET['page']) {
    case 'accueil':
      require "views/accueil.view.php";
      break;
    case "livres":
      if (empty($url[1])) {
        $livreController->afficherLivres();
      }

      break;
  }
}
