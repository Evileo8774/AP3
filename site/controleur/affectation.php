<?php

    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
        $racine="..";
    include_once "$racine/modele/affectation.inc.php";

    $affectations = affecter();
    $techniciens = getTechniciens();
    $clients = getClients();


    $titre = "affectation";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/pageAffectation.php";
    include "$racine/vue/pied.html.php";


?>