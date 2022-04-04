<?php

    include_once "db.user.inc.php";

    function login($matricule, $pwd){
        if(!isset($_SESSION)){
            session_start();
        }

        if($matricule != "" && $pwd != ""){
            $user = getUserByMail($matricule);
            if($user != false){
                $userPwd = $user["mdp"]; // fonctionne
                $hash = hashPwd($pwd); 
                if($hash["pwd"] == $userPwd){
                    $_SESSION['matricule'] = $user["matricule"];
                    $_SESSION['nom'] = $user["nom"];
                    $_SESSION['prenom'] = $user["prenom"];
                } else {
                    echo "<script>alert('Mauvais email ou mot de passe')</script>";
                }
            } else {
                echo "<script>alert('Mauvais email ou mot de passe')</script>";
            }
        } else {
            echo "<script>alert('Veuillez remplir les champs correctement')</script>";
        }
    }

    function logout(){
        if(!isset($_SESSION)){
            session_start();
        }
        session_destroy();
    }

    function getMailLoggedOn(){
        if(isLoggedOn()){
            $ret = $_SESSION["matricule"];
        } else {
            $ret = "";
        }
        return $ret;
    }

    function isLoggedOn(){
        if(!isset($_SESSION)){
            session_start();
        }
        $ret = false;

        if(isset($_SESSION["matricule"])){
            $user = getUserByMail($_SESSION["matricule"]);
            if($user != false && $user["matricule"] == $_SESSION["matricule"]){
                $ret = true;
            }
        }
        return $ret;
    }
?>