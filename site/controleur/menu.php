<?php

session_start();

include_once "$racine/modele/menu.inc.php";
$travail=GetEmploie();

var_dump($travail);
var_dump($travail["matricule"]);

    if(isset($_SESSION["matricule"]) && $_SESSION["matricule"] != $travail["matricule"]){  // nom d'utilisateur vérification
        for($i = 0; $i<count($travail); $i++){
        
        }
    }

?>