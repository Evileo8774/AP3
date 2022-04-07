<?php

    function mainController($action) {

        $actions = array();
        $actions["default"] = "login.php";
        $actions["login"] = "login.php";
        $actions["home"] = "home.php";
        $actions["visite"] = "home.php";
        $actions["outil"] = "home.php";
        $actions["client"] = "customer.php";
        $actions["intervention"] = "home.php";

        if (array_key_exists($action, $actions)) {
            return $actions[$action];
        } else {
            return $actions["default"];
        }
    }

?>