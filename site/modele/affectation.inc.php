<?php

    include_once "bd.utilisateur.inc.php";

    function affecter(){
        $result = array();

        try{
            $cnx = connexionPDO();
            $date = $cnx->prepare("select date(now())");
            $date->execute();
            $date = $date->fetchColumn();

            $req = $cnx->prepare("select * from intervention where dateVisite > :date");
            $req->bindValue(':date', $date, PDO::PARAM_STR);
            $req->execute();
    
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while ($ligne) {
                $result[] = $ligne;
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch(PDOException $e){
            print("Erreur : ".$e->getMessage());
            die();
        }

        return $result;
    }

    function getTechniciens() {
        $resultat = array();
    
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from technicien");
            $req->execute();
    
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while ($ligne) {
                $resultat[] = $ligne;
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

?>