<?php

include_once "$racine/modele/client.inc.php";

    $techniciens = getTechniciens();
    $clients = getClients();


    $titre = "client";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/pageGestionClient.php";
    include "$racine/vue/pied.html.php";

?>