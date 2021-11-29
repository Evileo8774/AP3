<?php

include_once "bd.utilisateur.inc.php";

function login($mailE, $mdpE) {
    if (!isset($_SESSION)) {
        session_start();
        var_dump($_SESSION);
    }

    $util = getEmployeBymailE($mailE);
    $mdpBD = $util["mdpE"];

    if (trim($mdpBD) == trim(crypt($mdpE, $mdpBD))) {
        // le mot de passe est celui de l'employe dans la base de donnees
        $_SESSION["mailE"] = $mailE;
        $_SESSION["mdpE"] = $mdpBD;
    }
}

function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["mailE"]);
    unset($_SESSION["mdpE"]);
}

function getmailELoggedOn(){
    if (isLoggedOn()){
        $ret = $_SESSION["mailE"];
    }
    else {
        $ret = "";
    }
    return $ret;
        
}

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["mailE"])) {
        $util = getEmployeBymailE($_SESSION["mailE"]);
        if ($util["mailE"] == $_SESSION["mailE"] && $util["mdpE"] == $_SESSION["mdpE"]
        ) {
            $ret = true;
        }
    }
    return $ret;
}
/*
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    // test de connexion
    if (isLoggedOn()) {
        echo "logged\n";
    } else {
        echo "not logged\n";
    }
    
    login("test@bts.sio", "sio");
    
    if (isLoggedOn()) {
        echo "logged\n";
    } else {
        echo "not logged\n";
    }

    $mail=getmailELoggedOn();
    echo "utilisateur connecté avec cette adresse : $mail \n";
    
    // deconnexion
    logout();
}*/
?>