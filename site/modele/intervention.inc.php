<?php

    include_once "bd.utilisateur.inc.php";

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

    function getEmployes() {
        $resultat = array();
    
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from employe");
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

    function getClients() {
        $resultat = array();
    
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from client");
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


   

        function getModif($array,$table,  ){
        
            $count = 0;
    
            try{
                $cnx = connectionPDO();
    
                //on ajoute 1 au compteur si une valeur est entrée
    
                for($i = 0; $i < sizeof($array); $i++){
                    if($array[$i] == "roleIntervenant"){
                        $index = $i+1;
                    }
                    $count++;
                }
    
                $count /= 2;
                

                param : numClient, dateVisite, matricule
                //en fonction du compteur on allonge la requête sql
                
                switch ($count) {
                    case 1:
                        $sql = "UPDATE $table SET ".$array[0]." = :a WHERE mailIntervenant like :mail";
                        $stmt = $cnx->prepare($sql);
                        if($array[1] == $array[$index]) $stmt->bindValue(':a', $array[1], PDO::PARAM_INT);
                        else $stmt->bindValue(':a', $array[1], PDO::PARAM_STR);
    
                        $stmt->bindValue(':mail', $mailAncien, PDO::PARAM_STR);
                        $stmt->execute();
                        break;
                       
                    case 2:
                        $sql = "UPDATE $table SET ".$array[0]." = :a WHERE mailIntervenant like :mail";
                        $stmt = $cnx->prepare($sql);
                        if($array[1] == $array[$index]) $stmt->bindValue(':a', $array[1], PDO::PARAM_INT);
                        else $stmt->bindValue(':a', $array[1], PDO::PARAM_STR);
    
                        if($array[3] == $array[$index]) $stmt->bindValue(':b', $array[3], PDO::PARAM_INT);
                        else $stmt->bindValue(':b', $array[3], PDO::PARAM_STR);
    
                        $stmt->bindValue(':mail', $mailAncien, PDO::PARAM_STR);
                        $stmt->execute();
                        break;
                         
                    case 3:
                        $sql = "UPDATE $table SET ".$array[0]." = :a WHERE mailIntervenant like :mail";
                        $stmt = $cnx->prepare($sql);
                        if($array[1] == $array[$index]) $stmt->bindValue(':a', $array[1], PDO::PARAM_INT);
                        else $stmt->bindValue(':a', $array[1], PDO::PARAM_STR);
    
                        if($array[3] == $array[$index]) $stmt->bindValue(':b', $array[3], PDO::PARAM_INT);
                        else $stmt->bindValue(':b', $array[3], PDO::PARAM_STR);
    
                        if($array[5] == $array[$index]) $stmt->bindValue(':c', $array[5], PDO::PARAM_INT);
                        else $stmt->bindValue(':c', $array[5], PDO::PARAM_STR);
    
                        
                        $stmt->bindValue(':mail', $mailAncien, PDO::PARAM_STR);
                        $stmt->execute();
                        break; 

    }
?>