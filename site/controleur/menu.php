<?php

session_start();

include_once "$racine/modele/menu.inc.php";
$travail=GetTechnicien();

    if(isset($_SESSION["matricule"])){  // nom d'utilisateur vérification

        for($i = 0; $i<count($travail); $i++){
            if($_SESSION["matricule"] == $travail[$i]["matricule"]){
                $tmp = true;
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