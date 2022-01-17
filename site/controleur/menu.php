<?php

session_start();

include_once "../modele/menu.inc.php";
$travail=GetEmploie();

var_dump($travail);
var_dump($travail['matricule']);

    if ($_SESSION['matricule'] != $travail['matricule']){  // nom d'utilisateur vérification
        for($i = 0; $i<count($travail); $i++){
        
        }
    }

?>