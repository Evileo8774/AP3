<?php
    include "getRoot.php";
    include "$root/controller/mainController.php";
    include_once "$root/model/auth.inc.php";



    if (isset($_GET["action"])){
        $action = $_GET["action"];
    } else {
        $action = "default";
    }

    $file = mainController($action);
    include "$root/controller/$file";
?>
