<?php
require "Model.class.php";
require "Livre.class.php";
class LivreManager extends Model
{

  private $livres; //tableau de livres
  public function __construct()
  { //le constructeur est vide
  }


  public function ajoutLivre($livre)
  {

    $this->livres[] = $livre;
  }

  public function getLivres()
  {
    return $this->livres;
  }

  public function chargementLivres()
  {
    $req = $this->getBdd()->prepare("SELECT * FROM livres  ");
    $req->execute();
    $mesLivres = $req->fetchAll(PDO::FETCH_ASSOC);
    //! print_r;
    /*
    echo "<pre>";
    print_r($mesLivres);
    echo "</pre>";
    */
    $req->closeCursor();
    foreach ($mesLivres as $monlivre) {
      $l = new Livre(($monlivre['id']), $monlivre['titre'], $monlivre['nbPages'], $monlivre['image']);
      $this->ajoutLivre($l);
    }
  }
  public function getLivreById($id)
  {
    //? parcourir mon tableau de livre " private = $livres;";
    for ($i = 0; $i < count($this->livres); $i++) {
      //? test comparer l'identifiant du livre for($i=0; $i < count($this->livres);$i++) avec l(identifiant transfere en parametre de fonction getLivreById($id))
      if ($this->livres[$i]->getId() === $id) {
        return $this->livres[$i];
      }
    }
  }
}
