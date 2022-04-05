<?php

    include_once "db.user.inc.php";

    function login($matricule, $pwd){
        if(!isset($_SESSION)){
            session_start();
        }

        if($matricule != "" && $pwd != ""){
            $user = getUserByMatricule($matricule);
            if($user != false){
                $userPwd = $user["mdp"]; // fonctionne
                $hash = hashPwd($pwd); 
                if($hash["pwd"] == $userPwd){
                    $_SESSION['matricule'] = $user["matricule"];
                    $_SESSION['nom'] = $user["nom"];
                    $_SESSION['prenom'] = $user["prenom"];
                } else {
                    return "Mauvais email ou mot de passe";
                }
            } else {
                return "Mauvais email ou mot de passe";
            }
        } else {
            return "Veuillez remplir les champs correctement";
        }
    }

    function logout(){
        if(!isset($_SESSION)){
            session_start();
        }
        session_destroy();
    }

    function getUserMatricule(){
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
            $user = getUserByMatricule($_SESSION["matricule"]);
            if($user != false && $user["matricule"] == $_SESSION["matricule"]){
                $ret = true;
            }
        }
        return $ret;
    }
?>