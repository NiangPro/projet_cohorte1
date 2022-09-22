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
// require_once("views/inscription.php");

if (isset($_GET["menu"])) {
    if($_GET['menu'] == 'doc'){
        $docs = $db->getAllDocuments();
        require_once("views/admin/document.php");
        
    }else if($_GET['menu'] == 'addDoc'){
        require_once("views/admin/addDocument.php");

    }
}else{

    require_once("views/admin/admin.php");
}