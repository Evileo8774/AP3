<?php

include_once "bd.inc.php";

function GetEmploie(){

    try{
        $cnx=connexionPDO();
        $req = $cnx -> prepare("select * from employe");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }

    } catch(PDOException $e){
        print("Erreur : ".$e->getMessage());
        die();
    }
    return $resultat;
}
?>