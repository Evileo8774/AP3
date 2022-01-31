<?php
session_start();
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/modele/affichage.inc.php";

if(isset($_SESSION["id"])){
    $id = $_SESSION["id"];
    echo $id;
    $tech = getTechnicienById($id);

    $titre = "affichage";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/pageAffichage.php";
    include "$racine/vue/pied.html.php";
}



?>