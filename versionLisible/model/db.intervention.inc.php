<?php

    include_once "db.inc.php";

    function getInterventions($m){
        $result = array();
    
        try {
            $pdo = connectionPDO();
            $req = $pdo->prepare("SELECT client.raisonSociale, client.adresse, intervention.* from client, intervention where matricule = ? and intervention.numClient = client.numClient");
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

?>