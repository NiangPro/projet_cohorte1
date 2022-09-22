<?php

    class Database{
        private $db;

        public function __construct($dbname = "biblio"){
            try {
                $this->db = new \PDO("mysql:host=localhost;dbname=$dbname", "root", "");
                $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (\PDOException $e) {
                die("Erreur: ".$e->getMessage());
            }
        }

        public function getDb(){return $this->db;}

        public function addUser(User $u){
            try{
                $req = $this->getDb()->prepare("INSERT INTO USERS 
                VALUES(:code,:prenom, :nom, :adresse, :tel, :email, :mdp, :roleUser )");
                $result = $req->execute([
                    'code' =>$u->getCode(),
                    'prenom' =>$u->getPrenom(),
                    'nom' =>$u->getNom(),
                    'adresse' =>$u->getAdresse(),
                    'tel' =>$u->getTel(),
                    'email' =>$u->getEmail(),
                    'mdp' =>$u->getMdp(),
                    'roleUser' =>$u->getRole()
                ]);
            } catch (\PDOException $e) {
                die("Erreur: ".$e->getMessage());
            }
            return $result;
        }

        public function login($code, $mdp){
            try {
                $req = $this->getDb()->prepare("SELECT * FROM USERS WHERE (code =:code AND mdp =:mdp)");
                $req->execute([
                    'code' => $code,
                    'mdp' => $mdp,
                ]);

                return $req->fetch();

            }  catch (\PDOException $e) {
                die("Erreur: ".$e->getMessage());
            }
        }

        public function codeExistant($code){
            try {
                $req = $this->getDb()->prepare("SELECT * FROM USERS WHERE code = ?");
                $req->execute([$code]);

                return  $req->fetch();

            } catch (\PDOException $e) {
                die("Erreur: ".$e->getMessage());
            }
        }

        public function getAllDocuments(){
            try {
               $req = $this->getDb()->prepare("SELECT * FROM DOCUMENT");
               $req->execute();

               return $req->fetchAll();
            }catch (\PDOException $e) {
                die("Erreur: ".$e->getMessage());
            }
        }

        public function addDocument($doc){
            try{
                $req = $this->getDb()->prepare("INSERT INTO DOCUMENT 
                VALUES(:code,:titre, :auteur, :categorie, :anPub, :typeDoc, :genre, :descriptionDoc, :isnb )");
                $result = $req->execute([
                    'code' =>$doc->getCode(),
                    'titre' =>$doc->getTitre(),
                    'auteur' =>$doc->getAuteur(),
                    'categorie' =>$doc->getCategorie(),
                    'anPub' =>$doc->getAnPub(),
                    'typeDoc' =>$doc->getType(),
                    'genre' =>$doc->getGenre(),
                    'descriptionDoc' =>$doc->getDescription(),
                    'isbn' =>$doc->getIsbn()
                ]);
            } catch (\PDOException $e) {
                die("Erreur: ".$e->getMessage());
            }
            return $result;
        }
    }