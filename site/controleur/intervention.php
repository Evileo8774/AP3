<?php

include_once "$racine/modele/intervention.inc.php";

    $techniciens = getTechniciens();
    $employe = getEmployes();
    $clients = getClients();

  

    if(isset($_GET["Modifier"])){

        $raisonSociale = $_POST["nomClient"];
        $numIntervention = $_POST["numClient"];

        if(isset($_POST["numClient"])){ 
            $numClient = $_POST["numClient"];
            getModifClient($array, $raisonSociale);
        }
        if(isset($_POST["dateIntervention"])){ 
            $dateIntervention = $_POST["dateIntervention"];
            getModifIntervention($array, $numIntervention)
        }
        if(isset($_POST["telClient"])){ 
            $technicien = $_POST["telClient"];
            getModifClient($array, $raisonSociale);
        }
        if(isset($_POST["mailClient"])){ 
            $technicien = $_POST["mailClient"];
            getModifClient($array, $raisonSociale);
        }
        if(isset($_POST["technicienAssigné"])){ 
            $technicien = $_POST["technicienAssigné"];
            getModifIntervention($array, $numIntervention)
        }
    }     


    

    $titre = "intervention";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/pageIntervention.php";
    include "$racine/vue/pied.html.php";

?>