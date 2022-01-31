<?php

    include_once "bd.utilisateur.inc.php";

    function getTechnicienById($id){
        $result = array();

        try{
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from technicien where matricule = :id");
            $req->bindValue("id", $id, PDO::PARAM_STR);
            $req->execute();
    
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            
        }
    }



?>