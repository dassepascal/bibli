<?php

class Livre
{

    private $id;
    private $titre;
    private $nbPages;
    private $image;
    //! creation du tableau contenant la liste des livres avec un s  il sera rempli dans le constructeur par self::$livres[] = $this;
    public static $livres;


    public function __construct($id, $titre, $nbPages, $image)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->nbPages = $nbPages;
        $this->image = $image;

        //! $this pour recuperer le tableau que l'on est entrain de creer
        self::$livres[] = $this;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitre()
    {
        return $this->titre;
    }
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function getNbPages()
    {
        return $this->nbPages;
    }
    public function setNbPages($nbPages)
    {
        $this->nbPages = $nbPages;
    }

    public function getImage()
    {
        return $this->image;
    }
    public function setImage($Image)
    {
        $this->image = $Image;
    }
}
