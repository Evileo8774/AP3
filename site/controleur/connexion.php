<?php
session_start();

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentification.inc.php";

if (!isset($_POST["mailE"]) || !isset($_POST["mdpE"])){
    // on affiche le formulaire de connexion
    $titre = "Page Connexion";
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

?>