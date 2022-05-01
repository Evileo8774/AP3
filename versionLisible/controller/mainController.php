<?php

    function mainController($action) {

        $actions = array();
        $actions["default"] = "login.php";
        $actions["login"] = "login.php";
        $actions["home"] = "home.php";
        $actions["visite"] = "affectation.php";
        $actions["outil"] = "tool.php";
        $actions["client"] = "customer.php";
        $actions["intervention"] = "intervention.php";
        $actions["logout"] = "logout.php";

        if(array_key_exists($action, $actions)) {
            return $actions[$action];
        } else {
            return $actions["default"];
        }
    }

?>