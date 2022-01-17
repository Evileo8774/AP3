<?php

include_once "../modele/client.inc.php";

    $affectations = affecter();
    $techniciens = getTechniciens();
    $clients = getClients();


    $titre = "client";
    include "../vue/entete.html.php";
    include "../vue/pageGestionClient.php";
    include "../vue/pied.html.php";

?>