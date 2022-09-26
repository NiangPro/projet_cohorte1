<?php 

class Document{
    private $code;
    private $titre;
    private $auteur;
    private $description;
    private $type;
    private $anPub;
    private $genre;
    private $isbn;
    private $categorie;

    public function __construct($code, $titre, $auteur, $anPub, $description, $type, $genre, $categorie,$isbn=0){
        $this->code = $code;
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->anPub = $anPub;
        $this->description = $description;
        $this->type = $type;
        $this->genre = $genre;
        $this->categorie = $categorie;
        $this->isbn = $isbn;
    }

    public function getCode(){return $this->code;}
    public function getTitre(){return $this->titre;}
    public function getAuteur(){return $this->auteur;}
    public function getType(){return $this->type;}
    public function getAnPub(){return $this->anPub;}
    public function getGenre(){return $this->genre;}
    public function getDescription(){return $this->description;}
    public function getCategorie(){return $this->categorie;}
    public function getIsbn(){return $this->isbn;}

}