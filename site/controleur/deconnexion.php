<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentification.inc.php";

// recuperation des donnees GET, POST, et SESSION

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

logout();
// traitement si necessaire des donnees recuperees

// appel du script de vue qui permet de gerer l'affichage des donnees
/*
$titre = "Deconnexion";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueDeconnexion.php";
include "$racine/vue/pied.html.php";
*/

?>