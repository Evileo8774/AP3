<?php

session_start();

include_once "$racine/modele/menu.inc.php";
$travail=GetEmploie();

var_dump($travail);
var_dump($travail["matricule"]);

    if(isset($_SESSION["matricule"]) && $_SESSION["matricule"] != $travail["matricule"]){  // nom d'utilisateur vérification
        include "$racine/vue/entete.html.php";
        include "$racine/pageMenu.php";
        include "$racine/pied.html.php";
        for($i = 0; $i<count($travail); $i++){
            
        }
    }

?>