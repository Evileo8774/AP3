<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
        $racine="..";
    }

    include_once "$root/model/auth.inc.php";

    if(isset($_POST["matricule"])){
        $matricule = $_POST["matricule"];
        $mdp = $_POST["mdp"];

        $error = login($matricule, $mdp);
        if($error != ""){
            //connexion échouée
            $title = "Connexion";
            include "$root/view/header.php";
            include "$root/view/viewLogin.php";
            include "$root/view/footer.php";
        } else {
            header("Refresh:0; url=?action=home");
        }
    } else {
        $title = "Connexion";
        include "$root/view/header.php";
        include "$root/view/viewLogin.php";
        include "$root/view/footer.php";
    }
?>