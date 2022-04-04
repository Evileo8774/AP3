<?php

include_once "$racine/modele/intervention.inc.php";

    $techniciens = getTechniciens();
    $employe = getEmployes();
    $clients = getClients();

    if(isset($_GET["Modifier"])

    )


    if(isset($_POST["nomClient"])){
        $nomClient = $_POST["nomClient"];
    }
    if(isset($_POST["numClient"])){
        $nomClient = $_POST["numClient"];
    }
    if(isset($_POST["nomClient"])){
        $nomClient = $_POST["nomClient"];
    }

    $titre = "intervention";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/pageIntervention.php";
    include "$racine/vue/pied.html.php";

?>