<?php

session_start();

<<<<<<< HEAD
include_once "../modele/menu.inc.php";
$travail=GetEmploie();
$technicien = GetTechnicien();
=======
include_once "$racine/modele/menu.inc.php";
$travail=GetTechnicien();
>>>>>>> f4da85c80e0d59128cc82ee7e5a1800e12e38188

    if(isset($_SESSION["matricule"])){  // nom d'utilisateur vérification
        $username = GetPrenom($_SESSION['matricule']);
        for($i = 0; $i<count($travail); $i++){
            if($_SESSION["matricule"] == $travail[$i]["matricule"]){
                $tmp = true;
            }

            if($_SESSION["matricule"] == $travail[$i]["matricule"]){
                $tech = true;
            }
        }
        include "$racine/vue/entete.html.php";
        include "$racine/vue/pageMenu.php";
        include "$racine/vue/pied.html.php";
        
    } else {
        include "$racine/vue/entete.html.php";
        include "$racine/vue/pageConnexion.php";
        include "$racine/vue/pied.html.php";
    }

    
?>