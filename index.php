<?php 

    require_once('views/partials/_header.php'); 
    require_once('models/database.php'); 
    require_once('models/user.php'); 

    $db = new Database("biblio");

    if (isset($_POST['login'])) {
        extract($_POST);

        $user= $db->login($code, $mdp);

        if ($user) {
            echo "Vous etes connecte";
            if($user->role == "Admin"){

            }else if($user->role == "Employe"){

            }else{

            }
        }else{
            echo "<span class='alert alert-danger'>LE code ou le mot de passe ne concordent pas</span>";
        }
    }

    if (isset($_POST['ajouter'])) {
        extract($_POST);

        $u = new User($code, $prenom, $nom, $tel, $adresse, $email, $mdp, $role);

        if ($db->addUser($u)) {
           echo "ajout avec succes";
        }else{
            echo "erreur d'ajout";
        }
    
    }

?>
    
    <?php require_once('views/login.php'); ?>

<?php require_once('views/partials/_footer.php'); ?>