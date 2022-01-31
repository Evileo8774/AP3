<?php

function controleurPrincipal($action) {

    $lesActions = array();
    $lesActions["defaut"] = "connexion.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["verification"] = "verification.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["affectation"] = "affectation.php";
    $lesActions["client"] = "client.php";
    $lesActions["menu"] = "menu.php";
    $lesActions["affichage"] = "affichage.php";


    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } else {
        return $lesActions["defaut"];
    }
    /*
    $lesActions = array();
    $lesActions["defaut"] = "listeRestos.php";
    $lesActions["liste"] = "listeRestos.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["recherche"] = "rechercheResto.php";

    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } else {
        return $lesActions["defaut"];
    }
    */
}

?>