<?php

    include_once "db.inc.php";

    function editMonth($date, $index){
        $result = array();
    
        try {
            $pdo = connectionPDO();
            $req = $pdo->prepare("SELECT DATE_ADD(?, INTERVAL 1 MONTH) AS dateadded");
            $req->execute([$date]);
    
            $result = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Error : " . $e->getMessage();
            die();
        }
        return $result;
    }

    function getNombreInterventions($date, $datePlus1){
        $result = array();
    
        try {
            $pdo = connectionPDO();
            $req = $pdo->prepare("SELECT COUNT(num) AS 'nb' FROM intervention WHERE intervention.faite='oui' AND dateVisite BETWEEN ? AND ?");
            $req->execute([$date, $datePlus1["dateadded"]]);
    
            $result = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Error : " . $e->getMessage();
            die();
        }
        return $result;
    }

    function getKMParcourus($date, $datePlus1){
        $result = array();
        try {
            $pdo = connectionPDO();
            $req = $pdo->prepare("SELECT SUM(distanceKM) AS 'km' FROM intervention, client WHERE intervention.faite='oui' AND client.numClient = intervention.numClient AND dateVisite BETWEEN ? AND ?");
            $req->execute([$date, $datePlus1["dateadded"]]);
    
            $result = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Error : " . $e->getMessage();
            die();
        }
        return $result;
    }

    function getTemps($date, $datePlus1){
        $result = array();
    
        try {
            $pdo = connectionPDO();
            $req = $pdo->prepare("SELECT SUM(tempsPasse) AS 'tps' FROM controler, intervention WHERE faite='oui' AND controler.num = intervention.num AND dateVisite BETWEEN ? AND ?");
            $req->execute([$date, $datePlus1["dateadded"]]);
    
            $result = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Error : " . $e->getMessage();
            die();
        }
        return $result;
    }

?>