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

        public function editUser(User $u, $code){
            try{
                $req = $this->getDb()->prepare("UPDATE USERS SET
                code =:code,prenom =:prenom, nom=:nom, adresse=:adresse, tel=:tel, email=:email, mdp=:mdp, role=:roleUser
                WHERE code = :codeExistant");
                $result = $req->execute([
                    'code' =>$u->getCode(),
                    'prenom' =>$u->getPrenom(),
                    'nom' =>$u->getNom(),
                    'adresse' =>$u->getAdresse(),
                    'tel' =>$u->getTel(),
                    'email' =>$u->getEmail(),
                    'mdp' =>$u->getMdp(),
                    'roleUser' =>$u->getRole(),
                    'codeExistant' =>$code
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

        public function codeDocExistant($code){
            try {
                $req = $this->getDb()->prepare("SELECT * FROM DOCUMENT WHERE codeDoc = ?");
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

        public function getAllUsers($role){
            try {
               $req = $this->getDb()->prepare("SELECT * FROM USERS WHERE role=?");
               $req->execute([$role]);

               return $req->fetchAll();
            }catch (\PDOException $e) {
                die("Erreur: ".$e->getMessage());
            }
        }

        public function getUserByCode($code){
            try {
               $req = $this->getDb()->prepare("SELECT * FROM USERS where code = ?");
               $req->execute([$code]);

               return $req->fetch();
            }catch (\PDOException $e) {
                die("Erreur: ".$e->getMessage());
            }
        }

        public function getDocumentByCode($code){
            try {
               $req = $this->getDb()->prepare("SELECT * FROM DOCUMENT where codeDoc = ?");
               $req->execute([$code]);

               return $req->fetch();
            }catch (\PDOException $e) {
                die("Erreur: ".$e->getMessage());
            }
        }

        public function removeUser($code){
            try {
               $req = $this->getDb()->prepare("DELETE FROM USERS WHERE code = ?");
               return $req->execute([$code]);
            }catch (\PDOException $e) {
                die("Erreur: ".$e->getMessage());
            }
        }

        public function supprimerDocument($code){
            try {
               $req = $this->getDb()->prepare("DELETE FROM DOCUMENT WHERE codeDoc = ?");
               return $req->execute([$code]);
            }catch (\PDOException $e) {
                die("Erreur: ".$e->getMessage());
            }
        }

        public function addDocument($doc){
            try{
                $req = $this->getDb()->prepare("INSERT INTO DOCUMENT 
                VALUES(:code,:titre, :auteur, :categorie, :anPub, :typeDoc, :genre, :descriptionDoc, 12345 )");
                $result = $req->execute([
                    'code' =>$doc->getCode(),
                    'titre' =>$doc->getTitre(),
                    'auteur' =>$doc->getAuteur(),
                    'categorie' =>$doc->getCategorie(),
                    'anPub' =>  $doc->getAnPub(),
                    'typeDoc' =>$doc->getType(),
                    'genre' =>$doc->getGenre(),
                    'descriptionDoc' =>$doc->getDescription(),
                    // 'isbn' =>$doc->getIsbn()
                ]);
            } catch (\PDOException $e) {
                die("Erreur: ".$e->getMessage());
            }
            return $result;
        }

        public function editDocument($doc, $codeDoc){
            try{
                $req = $this->getDb()->prepare("UPDATE DOCUMENT SET 
                    codeDoc =:code,titre =:titre, auteur=:auteur, categorie=:categorie, anPub=:anPub, type=:typeDoc, genre=:genre, description=:descriptionDoc, isbn=12345 
                    WHERE codeDoc =:codeDoc");
                $result = $req->execute([
                    'code' =>$doc->getCode(),
                    'titre' =>$doc->getTitre(),
                    'auteur' =>$doc->getAuteur(),
                    'categorie' =>$doc->getCategorie(),
                    'anPub' =>  $doc->getAnPub(),
                    'typeDoc' =>$doc->getType(),
                    'genre' =>$doc->getGenre(),
                    'descriptionDoc' =>$doc->getDescription(),
                    'codeDoc' =>$codeDoc,
                    // 'isbn' =>$doc->getIsbn()
                ]);
            } catch (\PDOException $e) {
                die("Erreur: ".$e->getMessage());
            }
            return $result;
        }
    }