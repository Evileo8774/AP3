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

function GetTechnicien(){
       
    try{$cnx=connexionPDO();
        $req = $cnx -> prepare("select * from technicien");
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

function GetPrenom($matricule){
    $resultat = array();
    
    try{$cnx=connexionPDO();
        $req = $cnx -> prepare("select nom,prenom from employe where matricule=:matricule");
        $req->bindValue("matricule", $matricule, PDO::PARAM_STR);
        $req->execute();
    
        $resultat = $req->fetch(PDO::FETCH_ASSOC);

    } catch(PDOException $e){
        print("Erreur : ".$e->getMessage());
        die();
    }
    return $resultat;
}

?>