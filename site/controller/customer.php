<?php

    if(!isset($_SESSION)){
        session_start();
    }

    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
        $racine="..";
    }

    include_once "$root/model/db.customer.inc.php";

    $customers = getCustomers();

    if(!isset($_GET["client"]) && !isset($_POST["submit"]) && isset($_SESSION["i"])){
        unset($_SESSION["i"]);
    }

    if(isset($_POST["submitSort"]) && !empty($_POST["customerSort"])){
        $customers = getCustomersSort($_POST["customerSort"]);
    }

    if(isset($_GET["client"])){
        $sortedCustomer = getCustomersSort($_GET["client"]);
        $_SESSION["i"] = $sortedCustomer[0]["numClient"];
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
            updateClient($data[$i], $data[$i+1], $_SESSION["i"]);
        }
        header("Refresh:0; url=?action=client");
    }
    
    $title = "Gestion des Clients";
    include "$root/view/header.php";
    include "$root/view/viewCustomer.php";
    include "$root/view/footer.php";

?>