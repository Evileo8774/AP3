<?php

    if(!isset($_SESSION)){
        session_start();
    }

    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
        $racine="..";
    }

    include_once "$root/model/db.affectation.inc.php";

    $visitesNonAffectees = getVisitesNonAffectees();
    $clients = getClients();

    if(!isset($_GET["visite"]) && !isset($_POST["submitUpdate"]) && !isset($_POST["submitCreate"]) && isset($_SESSION["i"])){
        unset($_SESSION["i"]);
    }

    if(isset($_GET["visite"])){
        $_SESSION["i"] = $_GET["visite"];
        $visiteAAffecter = getInterventionById($_GET["visite"]);
        $techniciens = getTechniciensInAgenceOfClient($visiteAAffecter["num"]);
    } else {
        $techniciens = getTechniciens();
    }

    if(isset($_POST["submitCreate"])){
        $data = array();
        array_push($data, $_POST["dateVisite"], ($_POST["heureVisite"].":00"), $_POST["raisonSociale"]);
        createIntervention($data);
        header("Refresh:0; url=?action=visite");
    }

    if(isset($_POST["submitUpdate"])){
        if(empty($_POST["matricule"])){
            $_POST["matricule"] = NULL;
        }
        $data = array();
        array_push($data, $_POST["dateVisite"], $_POST["heureVisite"], $_POST["matricule"]);
        updateIntervention($data, $_SESSION["i"]);
        header("Refresh:0; url=?action=visite");
    }

    $title = "Gestion des Clients";
    include "$root/view/header.php";
    include "$root/view/viewAffectation.php";
    include "$root/view/footer.php";

?>