<?php

use Dompdf\Dompdf;

if(!isset($_SESSION)){
    session_start();
}

$html = "Date de la visite : ".$_SESSION["dateVisite"]."<br>Heure de la visite : ".$_SESSION["heureVisite"]."<br>Nom du client : ".$_SESSION["raisonSociale"]."<br>Adresse : ".$_SESSION["adresse"];
unset($_SESSION["dateVisite"]);
unset($_SESSION["heureVisite"]);
unset($_SESSION["raisonSociale"]);
unset($_SESSION["adresse"]);

require_once "dompdf/autoload.inc.php";
$dompdf = new Dompdf();

$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream();

?>