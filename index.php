<?php
//? fonction ternaire  pour mettre soit https ou http en fonction de la variable ($_SERVER['HTTPS'])
// var_dump(URL);'http://localhost:8080/udemy/gaston/php2/bibli/'
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
//var_dump(URL);
require_once "controllers/Livres.controller.controller.php";
$livreController = new LivresController;
try {


  if (empty($_GET['page'])) {
    require "views/accueil.view.php";
  } else {
    // decomposition de l'url utilisation de la fonction explode
    // securisation de l'envoi à travers l'url avec: filter_var($_GET['page']), FILTER_SANITIZE_URL

    $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
    // echo '<pre>';
    // print_r($url);
    // echo '<pre>';
    switch ($url[0]) {
      case 'accueil':
        require "views/accueil.view.php";
        break;
      case "livres":
        if (empty($url[1])) {
          $livreController->afficherLivres();
        } else if ($url[1] === "l") {
          // affichage du livre $url[2];
          // creation d'une fonction permettant l'affichage du livre dans livresController => afficherLeLivre() sans ;
          //? echo $url[2];

          $livreController->afficherLeLivre($url[2]);

        } else if ($url[1] === "a") {
          //echo "ajouter un livre";
          //? ajouter la nouvelle fonction ajouterLeLivre() dans Livres.controller.controller.php
          $livreController->ajouterLeLivre();//aucune information a transferer à l'interieur puisque afficher une vue
        } else if ($url[1] === "m") {
          echo "modifier un livre";

        } else if ($url[1] === "s") {
         // echo "suppression  un livre";
          // echo $url[2];affiche id du livre

          $livreController->suppressionLivre($url[2]);
        } else if ($url[1] === "av") {
          //echo "validation d'ajout d'un livre";
          $livreController->ajouterLeLivreValidation();//pas argument donnees transferer par la variable post
          
        }
         else {
          throw   new Exception("La page n'existe pas");
        }
        break;
      default:
        throw   new Exception("La page n'existe pas");
    }
  }
} catch (Exception $e) {
  echo $e->getMessage();
}
