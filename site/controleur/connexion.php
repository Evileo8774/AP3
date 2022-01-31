<?php
session_start();

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentification.inc.php";

if (!isset($_POST["mailE"]) || !isset($_POST["mdpE"])){
    // on affiche le formulaire de connexion
    $titre = "authentification";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/pageConnexion.php";
    include "$racine/vue/pied.html.php";
}

else{

    $mailE = $_POST["mailE"];
    $mdpE = $_POST["mdpE"];

    login($mailE, $mdpE);

    if(isLoggedOn()){
        echo"connecté";
    }
    else {
        echo "Echec de connexion";
    }
}

/*
// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"./?action=connexion","label"=>"Connexion");
$menuBurger[] = Array("url"=>"./?action=inscription","label"=>"Inscription");

// recuperation des donnees GET, POST, et SESSION
if (!isset($_POST["mailU"]) || !isset($_POST["mdpU"])){
    // on affiche le formulaire de connexion
    $titre = "authentification";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueAuthentification.php";
    include "$racine/vue/pied.html.php";
}
else{

    $mailU = $_POST["mailU"];
    $mdpU = $_POST["mdpU"];

    login($mailU, $mdpU);

    if(isLoggedOn()){
        echo"connecté";
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
*/
?>