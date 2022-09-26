<?php

if (isset($_GET['menu'])) {
   if($_GET['menu'] == "doc"){
    $docs = $db->getAllDocuments();
    require_once('views/admin/document.php');
   }
}else{

    require_once('views/membre/membre.php');
}