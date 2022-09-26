<?php

// lors de l'ajout d'utilisateur 


if (isset($_POST['ajouter'])) {
    extract($_POST);

    if ($db->codeExistant($code)){
        echo "<div class='text-center alert alert-danger'>Le code existe deja.</div>";
    } else{
         $u = new User($code, $prenom, $nom, $tel, $adresse, $email, $mdp, $role);

            if ($db->addUser($u)) {
            echo "ajout avec succes";
            }else{
                echo "erreur d'ajout";
            }
    }

   

}

if (isset($_POST['ajouterDoc'])) {
    extract($_POST);

    if ($db->codeDocExistant($code)) {
        echo "<div class='alert alert-danger'>Le code du document existe deja!</div>";
        
    } else {           
        $doc = new Document($code, $titre, $auteur, $anPub, $description,$type, $genre, $categorie, $isbn);
        if($db->addDocument($doc)){
            $message = "success";
            return  header("Location:?page=".strtolower($user->role)."&menu=doc&message=$message");
        }else{
            echo "<div class='alert alert-danger'>Erreur d'ajout!</div>";
        }
    }
}

if (isset($_POST['editionDoc'])) {
    extract($_POST);

    if ($_GET['code'] != $code && $db->codeDocExistant($code)) {
        echo "<div class='alert alert-danger'>Le code du document existe deja!</div>";
        
    } else {           
        $doc = new Document($code, $titre, $auteur, $anPub, $description,$type, $genre, $categorie, $isbn);
        if($db->editDocument($doc, $_GET['code'])){
            $message = "success";
            return  header("Location:?page=".strtolower($user->role)."&menu=doc&message=$message");
        }else{
            echo "<div class='alert alert-danger'>Erreur d'edition!</div>";
        }
    }
}

if (isset($_GET['code'])) {
    if($_GET['type'] == "delete"){
        if ($db->supprimerDocument($_GET['code'])) {
            echo "<div class='alert alert-success m-3'>Suppression avec succes</div>";

        }
    }
}
// require_once("views/inscription.php");

if (isset($_GET["menu"])) {
    if($_GET['menu'] == 'doc'){
        $docs = $db->getAllDocuments();
        require_once("views/admin/document.php");
        
    }else if($_GET['menu'] == 'addDoc'){
        require_once("views/admin/addDocument.php");
        
    }else if($_GET['menu'] == "editDoc"){
        $doc = $db->getDocumentByCode($_GET['code']);
        require_once("views/admin/editDocument.php");
    }
}else{

    require_once("views/admin/admin.php");
}