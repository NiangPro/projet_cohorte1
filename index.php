<?php 

    session_start();
    // entete
    require_once('views/partials/_header.php');

    require_once('models/database.php'); 
    require_once('models/user.php'); 
    require_once('models/document.php'); 

    $db = new Database("biblio");

    if (isset($_SESSION['user'])) {
        $user= $_SESSION['user'];
    }

   
    if (isset($_GET['page']) && !empty($_GET['page'])) {
        require_once('views/partials/_navbar.php');
        switch ($_GET['page']) {
            case 'admin':
                require_once('controllers/adminController.php');
                break;
            case 'employe':
                    require_once('controllers/employeController.php');
                    break;
            case 'membre':
                        require_once('controllers/membreController.php');
                        break;
            case 'logout':
                $_GET['page'] = "";
                unset($_GET['page']);
                $_SESSION['user'] = null;
                session_destroy();
                return header("Location: index.php");
                break;
        }
     }else{
        require_once('controllers/loginController.php'); 
     }

    // pied  
 require_once('views/partials/_footer.php'); 