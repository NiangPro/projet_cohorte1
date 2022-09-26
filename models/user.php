<?php 


class  User{
    private $code;
    private $prenom;
    private $nom;
    private $tel;
    private $adresse;
    private $email;
    private $mdp;
    private $role;

    public function __construct($code, $prenom, $nom, $tel, $adresse, $email, $mdp, $role){
        $this->code = $code;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->tel = $tel;
        $this->adresse = $adresse;
        $this->email = $email;
        $this->mdp = $mdp;
        $this->role = $role; 
    }

    public function getCode(){return $this->code;}
    public function getPrenom(){return $this->prenom;}
    public function getNom(){return $this->nom;}
    public function getTel(){return $this->tel;}
    public function getAdresse(){return $this->adresse;}
    public function getEmail(){return $this->email;}
    public function getMdp(){return $this->mdp;}
    public function getRole(){return $this->role;}
}