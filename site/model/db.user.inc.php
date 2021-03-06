<?php

    include_once "db.inc.php";

    function getUsers(){
        $result = array();

        try{
            $cnx = connectionPDO();
            $req = $cnx->prepare("select * from employe");
            $req->execute();

            $line = $req->fetch(PDO::FETCH_ASSOC);
            while($line){
                $result[] = $line;
                $line = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch(PDOException $e){
            print "Error : ".$e->getMessage();
            die();
        }
        return $result;
    }

    function getUserByMatricule($matricule){
        $result = array();

        try{
            $cnx = connectionPDO();
            $req = $cnx->prepare("select * from employe where matricule = ?");
            $req->execute([$matricule]);

            $result = $req->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            print "Error : ".$e->getMessage();
            die();
        }
        return $result;
    }

    function hashPwd($pwd){
        $result = array();

        try{
            $cnx = connectionPDO();
            $req = $cnx->prepare("select SHA2('".$pwd."', 256) AS 'pwd'");
            $req->bindValue('pwd', $pwd, PDO::PARAM_STR);
            $req->execute();

            $result = $req->fetch(PDO::FETCH_ASSOC);
            
        } catch(PDOException $e){
            print "Error : ".$e->getMessage();
            die();
        }
        return $result;
    }

?>