<?php

    /*if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
        $racine="..";
    }*/
    include_once "../modele/affectation.inc.php";

    $affectations = affecter();
    $techniciens = getTechniciens();
    


    $titre = "affectation";
    include "../vue/entete.html.php";
    include "../vue/pageAffectation.php";
    include "../vue/pied.html.php";


?>