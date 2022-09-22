<?php

if (isset($_POST['login'])) {
    extract($_POST);

    $user= $db->login($code, $mdp);

    // si l'utilisateur existe 
    if ($user) {
        // lorsque l'utilisateur est connecte on declare la variable $_SESSION['user'] 
        $_SESSION['user'] = $user;
        // si le role de l'utilisateur est egale a admin
        if($user->role == "Admin"){
            // echo htmlspecialchars($user->nom) ;
          return  header("Location: ?page=admin");
        }else if($user->role == "Employe"){
            return  header("Location: ?page=employe");
            
        }else{
            return  header("Location: ?page=membre");

        }
    }else{
        echo "<span class='alert alert-danger'>Le code ou le mot de passe ne concordent pas</span>";
    }
}

require_once('views/login.php');