<?php
    if(!isset($_SESSION)){
        session_start();
    }

    if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
        $racine="..";
    }

    include_once "$root/model/db.tool.inc.php";

    if(isset($_POST["monthPick"])){
        $year = substr($_POST["monthPick"], 0, 4);
        $month = substr($_POST["monthPick"], 5, 2);
        $date = $year."-".$month."-01";
        $monthPlus1 = editMonth($date, 1);
        $nbInterventions = getNombreInterventions($date, $monthPlus1);
        $kmParcourus = getKMParcourus($date, $monthPlus1);
        if(gettype($kmParcourus["km"]) != "string") $kmParcourus["km"] = "0";
        $temps = getTemps($date, $monthPlus1);
        if(gettype($temps["tps"]) != "string") $temps["tps"] = 0;
    }

    
    $title = "Outil statistique";
    include "$root/view/header.php";
    include "$root/view/viewTool.php";
    include "$root/view/footer.php";
?>