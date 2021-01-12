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
    // creation de l'affichage dans le dossier views avec le fichier afficherLeLivre.view.php
    require 'views/afficherLeLivre.view.php';
  }
  public function ajouterLeLivre()
  {
    // $leLivre = $this->livreManager->getLivreById();
    require "views/ajouterLeLivre.view.php";
  }
  public function ajouterLeLivreValidation()
  {
    //recuperation les infos de l'image
    $file = $_FILES['image']; //on met l'information de l'image $_FILES['image'] dans la variable $files
    $repertoire = "public/images/";
    $nomImageAjoute= $this->ajoutImage($file,$repertoire);
    //? ajouter le livre dans la bdd
    //! undefine index
    $this->livreManager->ajoutLivreBd($_POST['titre'],$_POST['nbPages'],$nomImageAjoute);
    var_dump($_POST);
    header('location:'.URL."livres");
    // echo '<pre>';
    // print_r($file);
    // echo '<pre>';
  }
  //! fonction mis en private pas optimal elle n'est pas utilisable partout
  private function ajoutImage($file, $dir){
    if(!isset($file['name']) || empty($file['name']))
        throw new Exception("Vous devez indiquer une image");

    if(!file_exists($dir)) mkdir($dir,0777);// 0777 droit tous les droits

    $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
    $random = rand(0,99999);
    $target_file = $dir.$random."_".$file['name'];
    
    if(!getimagesize($file["tmp_name"]))
        throw new Exception("Le fichier n'est pas une image");
    if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
        throw new Exception("L'extension du fichier n'est pas reconnu");
    if(file_exists($target_file))
        throw new Exception("Le fichier existe déjà");
    if($file['size'] > 500000)
        throw new Exception("Le fichier est trop gros");
    if(!move_uploaded_file($file['tmp_name'], $target_file))
        throw new Exception("l'ajout de l'image n'a pas fonctionné");
    else return ($random."_".$file['name']);
}
public function suppressionLivre($id){

  $nomImage = $this->livreManager->getLivreById($id)->getImage();
  //? suppression de l'image
  unlink("public/images/".$nomImage);
  $this->livreManager->suppressionLivreBd($id);
  header('location:'.URL."livres");


}
}
