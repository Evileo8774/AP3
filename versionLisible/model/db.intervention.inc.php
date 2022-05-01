<?php

    include_once "db.inc.php";

    function getInterventions($m){
        $result = array();
    
        try {
            $pdo = connectionPDO();
            $req = $pdo->prepare("SELECT client.raisonSociale, client.adresse, intervention.*, CURRENT_DATE AS dateDuJour from client, intervention where matricule = ? and intervention.numClient = client.numClient and faite = 'non' ORDER BY distanceKM");
            $req->execute([$m]);
    
            $line = $req->fetch(PDO::FETCH_ASSOC);
            while ($line) {
                $result[] = $line;
                $line = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            print "Error : " . $e->getMessage();
            die();
        }
        return $result;
    }

    function getInterventionById($num){
        $result = array();
    
        try {
            $pdo = connectionPDO();
            $req = $pdo->prepare("SELECT * from intervention where num = ? AND faite = 'non'");
            $req->execute([$num]);
    
            $result = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Error : " . $e->getMessage();
            die();
        }
        return $result;
    }

    function updateIntervention($key, $value, $id){
        try {
            $pdo = connectionPDO();
            $req = $pdo->prepare("UPDATE intervention SET ".$key."= ? WHERE num = ?");
            $req->execute([$value, $id]);
        } catch (PDOException $e) {
            print "Error : " . $e->getMessage();
            die();
        }
    }

    function interventionFinie($id){
        try {
            $pdo = connectionPDO();
            $req = $pdo->prepare("UPDATE intervention SET faite = 'oui' WHERE num = ?");
            $req->execute([$id]);
        } catch (PDOException $e) {
            print "Error : " . $e->getMessage();
            die();
        }
    }

    function controler($comm, $temps, $num, $numSerie){
        try {
            $pdo = connectionPDO();
            $req = $pdo->prepare("INSERT INTO controler (commentaire, tempsPasse, num, numSerie) VALUES (?, ?, ?, ?)");
            $req->execute([$comm, $temps, $num, $numSerie]);
        } catch (PDOException $e) {
            print "Error : " . $e->getMessage();
            die();
        }
    }

    function getMateriel($interventionNum){
        $result = array();
    
        try {
            $pdo = connectionPDO();
            $req = $pdo->prepare("SELECT numSerie from materiel, client, intervention where intervention.num = ? AND intervention.numClient = client.numClient AND materiel.numClient = client.numClient");
            $req->execute([$interventionNum]);
    
            $result = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Error : " . $e->getMessage();
            die();
        }
        return $result;
    }

?>