<?php

    include_once "db.inc.php";

    function getVisitesNonAffectees(){
        $result = array();
    
        try {
            $pdo = connectionPDO();
            $req = $pdo->prepare("SELECT intervention.*, client.raisonSociale FROM intervention, client WHERE intervention.numClient = client.numClient AND faite = 'non'");
            $req->execute();
    
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

    function getInterventionById($id){
        $result = array();
    
        try {
            $pdo = connectionPDO();
            $req = $pdo->prepare("SELECT * FROM intervention WHERE num = ?");
            $req->execute([$id]);
    
            $result = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Error : " . $e->getMessage();
            die();
        }
        return $result;
    }

    function updateIntervention($data, $num){
        try {
            $pdo = connectionPDO();
            $req = $pdo->prepare("UPDATE intervention SET dateVisite = ?, heureVisite = ?, matricule = ? WHERE num = ?");
            $req->execute([$data[0], $data[1], $data[2], $num]);
        } catch (PDOException $e) {
            print "Error : " . $e->getMessage();
            die();
        }
    }

    function getTechniciens(){
        $result = array();
    
        try {
            $pdo = connectionPDO();
            $req = $pdo->prepare("SELECT nom, prenom, matricule FROM technicien");
            $req->execute();
    
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

    function getClients(){
        $result = array();
    
        try {
            $pdo = connectionPDO();
            $req = $pdo->prepare("SELECT raisonSociale, numClient FROM client");
            $req->execute();
    
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

    function createIntervention($data){
        try {
            $pdo = connectionPDO();
            $req = $pdo->prepare("INSERT INTO intervention (dateVisite, heureVisite, numClient, faite) VALUES (?, ?, ?, 'non')");
            $req->execute([$data[0], $data[1], $data[2]]);
        } catch (PDOException $e) {
            print "Error : " . $e->getMessage();
            die();
        }
    }

    function getTechniciensInAgenceOfClient($num){
        $result = array();
    
        try {
            $pdo = connectionPDO();
            $req = $pdo->prepare("SELECT technicien.nom, technicien.prenom, technicien.matricule FROM technicien, client, employe WHERE employe.agence = client.num AND technicien.matricule = employe.matricule");
            $req->execute();
    
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

?>