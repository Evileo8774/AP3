<?php

    include_once "db.inc.php";

    function getCustomers(){
        $result = array();
    
        try {
            $pdo = connectionPDO();
            $req = $pdo->prepare("select * from client");
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

    function updateClient($key, $value, $id){
        try {
            $pdo = connectionPDO();
            $req = $pdo->prepare("UPDATE client SET ".$key."= ? WHERE numClient = ?");
            $req->execute([$value, $id]);
        } catch (PDOException $e) {
            print "Error : " . $e->getMessage();
            die();
        }
    }

?>