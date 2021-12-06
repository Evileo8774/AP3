<?php

    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
        $racine="..";
    }
    include_once "$racine/modele/affectation.inc.php";

    if(isset($_POST["affecter"])){
        affecter();
    }

?>