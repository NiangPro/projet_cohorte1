<?php

// lors de l'ajout d'utilisateur 


if (isset($_POST['ajouterMembre'])) {
    extract($_POST);

    if ($db->codeExistant($code)){
        echo "<div class='text-center alert alert-danger'>Le code existe deja.</div>";
    } else{
         $u = new User($code, $prenom, $nom, $tel, $adresse, $email, $mdp, "Membre");

            if ($db->addUser($u)) {
            return header("Location:?page=".strtolower($user->role)."&menu=membre");
            }else{
                echo "erreur d'ajout";
            }
    }   

}

if(isset($_POST['ajouterPret'])){
    extract($_POST);

    $p = new Pret($codeMembre, $codeDoc, $datePret, $dateRetour);

    if($db->addPret($p)){
        return  header('Location: ?page='.strtolower($user->role).'&menu=pret');
    }else{
        echo "<div class='alert alert-danger'>Erreur d'ajout</div>";
    }
}


if (isset($_POST['editerMembre'])) {
    extract($_POST);

    if ($code != $_GET['codeMembreEdit'] && $db->codeExistant($code)){
        echo "<div class='text-center alert alert-danger'>Le code existe deja.</div>";
    } else{
         $u = new User($code, $prenom, $nom, $tel, $adresse, $email, $mdp, "Membre");

            if ($db->editUser($u, $_GET['codeMembreEdit'])) {
            return header("Location:?page=".strtolower($user->role)."&menu=membre");
            }else{
                echo "erreur d'edition";
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

if (isset($_GET['codeMembre'])) {
    if ($db->removeUser($_GET['codeMembre'])) {
        echo "Suppression avec succes";
    }else{
        echo "Erreur de suppression";
    }
}

//les redirections
if (isset($_GET["menu"])) {
    if($_GET['menu'] == 'doc'){
        $docs = $db->getAllDocuments();
        require_once("views/admin/document.php");
        
    }else if($_GET['menu'] == 'addDoc'){
        require_once("views/admin/addDocument.php");
        
    }else if($_GET['menu'] == "editDoc"){
        $doc = $db->getDocumentByCode($_GET['code']);
        require_once("views/admin/editDocument.php");
    }else if($_GET['menu'] == "membre"){
        $membres = $db->getAllUsers("Membre");

        require_once("views/admin/membre.php");
    }else if($_GET['menu'] == "addMembre"){
        require_once("views/admin/addMembre.php");
    }else if($_GET['menu'] == "editMembre"){
        $m = $db->getUserByCode($_GET['codeMembreEdit']);
        require_once("views/admin/editMembre.php");
    }else if($_GET['menu'] == "pret"){
        $prets = $user->role != "Membre" ? $db->getAllPrets() : $db->getAllPretsByMembre($user->code);
        require_once("views/admin/pret.php");
    }else if($_GET['menu'] == "addPret"){
        $membres = $db->getAllUsers("Membre");
        $docs = $db->getAllDocuments();
        require_once("views/admin/addPret.php");
    }
}else{

    require_once("views/admin/admin.php");
}