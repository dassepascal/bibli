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
    $livres = $this->livreManager->getLivreById($id);
    //echo $livre->getTitre();
    // creation de l'affichage dans le dossier views avec le fichier afficherLeLivre.view.php
    require 'views/afficherLeLivre.view.php';
  }
  public function ajouterLeLivre(){
   // $leLivre = $this->livreManager->getLivreById();
    //require "views/ajouterLeLivre.view.php";

  }
}
