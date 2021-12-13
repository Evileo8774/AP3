<?php

include_once "bd.inc.php";

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

function getEmployeBymailE($mailE) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from employe where mailE=:mailE");
        $req->bindValue(':mailE', $mailE, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function verifyPassword($mail, $pwd){
    $result = array();

    try{
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from employe where matricule = :matricule and SHA2(mdp = :mdp, 256)");
        $req->bindValue(':matricule', $mail, PDO::PARAM_STR);
        $req->bindValue(':mdp', $pwd, PDO::PARAM_STR);
        $req->execute();

        $result = $req->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        print "Error : ".$e->getMessage();
        die();
    }
    return $result;
}

function hashPassword($pwd){
    $result = array();

    try{
        $cnx = connexionPDO();
        $req = $cnx->prepare("select sha2(:mdp, 256) as 'mdp'");
        $req->bindValue(':mdp', $pwd, PDO::PARAM_STR);
        $req->execute();

        $result = $req->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        print "Error : ".$e->getMessage();
        die();
    }
    return $result;
}


if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "getEmployes() : \n";
    print_r(getEmployes());

    echo "getEmployesBymailE('mathieu.capliez@gmail.com') : \n";
    print_r(getEmployeBymailE("mathieu.capliez@gmail.com"));

}
?>