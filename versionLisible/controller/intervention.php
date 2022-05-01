<?php

    if(!isset($_SESSION)){
        session_start();
    }

    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
        $racine="..";
    }

    include_once "$root/model/db.intervention.inc.php";

    $intervention = getInterventions($_SESSION["matricule"]);

    if(!isset($_GET["intervention"]) && !isset($_POST["submit"]) && isset($_SESSION["i"]) && !isset($_POST["submitEnd"])){
        unset($_SESSION["i"]);
    }

    if(isset($_GET["modif"])){
        $interventionIndex = getInterventionById($_GET["intervention"]);
        $_SESSION["i"] = $interventionIndex["num"];
    }

    if(isset($_POST["submitEnd"])){
        var_dump($_SESSION);
        $materiel = getMateriel($_SESSION["i"]);
        controler($_POST["commentaire"], $_POST["temps"], $_SESSION["i"], $materiel["numSerie"]);
        interventionFinie($_SESSION["i"]);
        header("Refresh:0; url=?action=intervention");
    }

    if(isset($_POST["submit"])){
        $data = array();
        array_push($data, "dateVisite", $_POST["date"]);
        array_push($data, "heureVisite", $_POST["heure"]);
        for($i = 0; $i < sizeof($data); $i += 2){
            updateIntervention($data[$i], $data[$i+1], $_SESSION["i"]);
        }
        header("Refresh:0; url=?action=intervention");
    }

    /*

    if(!isset($_GET["client"]) && !isset($_POST["submit"]) && isset($_SESSION["i"])){
        unset($_SESSION["i"]);
    }

    if(isset($_GET["client"])){
        $_SESSION["i"] = ($_GET["client"] - 1);
    }

    if(isset($_POST["submit"])){
        $data = array();
        array_push($data, "raisonSociale", $_POST["name"]);
        array_push($data, "siren", $_POST["siren"]);
        array_push($data, "codeApe", $_POST["ape"]);
        array_push($data, "adresse", $_POST["adresse"]);
        array_push($data, "tel", $_POST["tel"]);
        array_push($data, "email", $_POST["mail"]);
        array_push($data, "dureeDeplacement", $_POST["time"]);
        array_push($data, "distanceKM", $_POST["dist"]);
        for($i = 0; $i < sizeof($data); $i += 2){
            updateClient($data[$i], $data[$i+1], ($_SESSION["i"] + 1));
        }
        header("Refresh:0; url=?action=client");
    }
    */

    $title = "Gestion des interventions";
    include "$root/view/header.php";
    include "$root/view/viewIntervention.php";
    include "$root/view/footer.php";

?>