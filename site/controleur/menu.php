<?php

include_once "../modele/menu.inc.php";
$travail=GetEmploie();

var_dump($travail);
var_dump($travail['matricule']);
var_dump($travail['nom']);
    


if (!isset($_SESSION)) {
    session_start();
    var_dump($_SESSION);
}

for($i = 0; $i<count($affectations); $i++){


        fiche n°= $affectations[$i]["nom"] 
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $result[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    

?>