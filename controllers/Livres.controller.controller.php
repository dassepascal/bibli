<?php
require_once "models/LivreManager.class.php";
class  LivresController
{
  private $livreManager;

  public function __construct()
  {

    $this->livreManager = new LivreManager;
    $this->livreManager->chargementLivres();
  }

  public function afficherLivres()
  {

    $livres = $this->livreManager->getLivres();

    require "views/livres.view.php";
  }
  public function afficherLeLivre($id)
  {
    //l'action doit etre realiser par le model LivreManager.class.php;
    //creation d'une nouvelle fonction getLivreById($id) qui retournera un livre;
    $livre = $this->livreManager->getLivreById($id);
    //echo $livre->getTitre();
    // creation de l'affichage dans le dossier views avec le fichier afficherLivre.view.php
    require 'view/afficherLivre.view.php';
  }
}
