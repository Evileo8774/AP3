<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- lier la page aux fichiers css -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri&display=swap" rel="stylesheet">
    <style type="text/css">
        @import url("css/root.css");
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title><?php echo $title; ?></title>
</head>
<?php
if(isset($_SESSION["matricule"])){
    ?>
    <body>
        <nav>
            <div class="homeButton">
                <a href="./?action=home">
                    <img src="data/home.png" class="homeIcon"/>
                </a>
            </div>
            <div class="sortButton">
            
            </div>
            <div class="employeeName">
                <?php
                    if(isset($_SESSION["nom"])){
                        echo $_SESSION["nom"]." ".$_SESSION["prenom"];
                    }
                ?>
            </div>
        </nav>    
    </body>
    <?php
}    
?>
