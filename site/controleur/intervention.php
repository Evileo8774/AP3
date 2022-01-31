<?php

include_once "$racine/modele/intervention.inc.php";

    $techniciens = getTechniciens();
    $clients = getClients();


    $titre = "intervention";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/pageIntervention.php";
    include "$racine/vue/pied.html.php";

?>