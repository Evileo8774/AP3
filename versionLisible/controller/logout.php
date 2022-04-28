<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
        $racine="..";
    }

    include_once "$root/model/auth.inc.php";

    logout();
    unset($_SESSION["matricule"]);
    unset($_SESSION["nom"]);
    unset($_SESSION["prenom"]);

    $title = "Connexion";
    include "$root/view/header.php";
    include "$root/view/viewLogin.php";
    include "$root/view/footer.php";
?>