<?php

    if(!isset($_SESSION)){
        session_start();
    }

    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
        $racine="..";
    }

    include_once "$root/model/db.affectation.inc.php";

    $visitesNonAffectees = getVisitesNonAffectees();

    if(!isset($_GET["client"]) && !isset($_POST["submit"]) && isset($_SESSION["i"])){
        unset($_SESSION["i"]);
    }

    if(isset($_GET["client"])){
        $_SESSION["i"] = ($_GET["client"] - 1);
    }

    if(isset($_POST["submit"])){
        $data = array();
        array_push($data, $_POST["numClient"], $_POST["dateVisite"], $_POST["heureVisite"], $_POST["technicien"]);
        for($i = 0; $i < sizeof($data); $i++){
            createIntervention($data);
        }
        header("Refresh:0; url=?action=visite");
    }

    $title = "Gestion des Clients";
    include "$root/view/header.php";
    include "$root/view/viewAffectation.php";
    include "$root/view/footer.php";

?>