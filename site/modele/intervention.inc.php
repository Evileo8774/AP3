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

    function getEmployesByName() {
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


   

        function getModifIntervention($array, $numIntervention){
          
            
            try{
                $cnx = connectionPDO();
    
                //on ajoute 1 au compteur si une valeur est entrée
    
                for($i = 0; $i < sizeof($array); $i++){
                    $count++;
                }
    
                $count /= 2;
                

             
                //en fonction du compteur on allonge la requête sql
                
                switch ($count) {
                    case 1:
                        $sql = "UPDATE intervention SET ".$array[0]." = :a WHERE num like :num";
                        $stmt = $cnx->prepare($sql);
                        $stmt->bindValue(':a', $array[1], PDO::PARAM_STR);
    
                        $stmt->bindValue(':num', $numIntervention, PDO::PARAM_STR);
                        $stmt->execute();
                        break;
                       
                    case 2:
                        $sql = "UPDATE intervention SET ".$array[0]." = :a , ".$array[2]." = :b WHERE num like :num";
                        $stmt = $cnx->prepare($sql);
                        $stmt->bindValue(':a', $array[1], PDO::PARAM_STR);
                        $stmt->bindValue(':b', $array[3], PDO::PARAM_STR);
    
                        $stmt->bindValue(':num', $numIntervention, PDO::PARAM_STR);
                        $stmt->execute();
                        break;
                }
                
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage();
                die();
            }
        }


        function getModifClient($array, $raisonSociale){
              
            try{
                $cnx = connectionPDO();
    
                
    
                for($i = 0; $i < sizeof($array); $i++){
                    $count++;
                }
    
                $count /= 2;
                
                switch ($count) {
                    case 1:
                        $sql = "UPDATE client SET ".$array[0]." = :a WHERE num like :num";
                        $stmt = $cnx->prepare($sql);
                        $stmt->bindValue(':a', $array[1], PDO::PARAM_STR);
    
                        $stmt->bindValue(':num', $raisonSociale, PDO::PARAM_STR);
                        $stmt->execute();
                        break;
                       
                    case 2:
                        $sql = "UPDATE client SET ".$array[0]." = :a , ".$array[2]." = :b WHERE num like :num";
                        $stmt = $cnx->prepare($sql);
                        $stmt->bindValue(':a', $array[1], PDO::PARAM_STR);
                        $stmt->bindValue(':b', $array[3], PDO::PARAM_STR);
    
                        $stmt->bindValue(':num', $raisonSociale, PDO::PARAM_STR);
                        $stmt->execute();
                        break;

                    case 3:
                        $sql = "UPDATE client SET ".$array[0]." = :a , ".$array[2]." = :b ".$array[4]." = :c WHERE num like :num";
                        $stmt = $cnx->prepare($sql);
                        $stmt->bindValue(':a', $array[1], PDO::PARAM_STR);
                        $stmt->bindValue(':b', $array[3], PDO::PARAM_STR);
                        $stmt->bindValue(':c', $array[5], PDO::PARAM_STR);

                        $stmt->bindValue(':num', $raisonSociale, PDO::PARAM_STR);
                        $stmt->execute();
                        break;
                }
                
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage();
                die();
            }
        }
?>