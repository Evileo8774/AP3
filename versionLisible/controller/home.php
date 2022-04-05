<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
        $racine="..";
    }

    include_once "$root/model/home.inc.php";

    
    $title = "Accueil";
    include "$root/view/header.php";
    include "$root/view/viewHome.php";
    include "$root/view/footer.php";
?>