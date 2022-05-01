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
                <?php
                    if(isset($verify)){
                        ?>
                        <a href="./?action=logout">
                            Se déconnecter
                        </a>
                        <?php
                    } else {
                        ?>
                        <a href="./?action=home">
                            <img src="data/home.png" class="homeIcon"/>
                        </a>
                        <?php
                    }
                ?>
                
            </div>
            <div class="sortButton">
                <?php
                    if(isset($customers)){
                        ?>
                        <form method="post" action="./?action=client">
                            <input type="text" name="customerSort" placeholder="Chercher un client" list="customers"/>
                            <input type="submit" name="submitSort" value="Chercher"/>
                        </form>
                        <?php
                    } else if(isset($intervention)){
                        ?>
                        <form method="post" action="./?action=intervention">
                            <input type="text" name="interventionSort" placeholder="Chercher une intervention" list="interventions"/>
                            <input type="submit" name="submitSort" value="Chercher"/>
                        </form>
                        <?php
                    }
                ?>
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
if(isset($customers)){
    echo "<datalist id='customers'>";
    for($i = 0; $i < sizeof($customers); $i++){
        echo "<option value='".$customers[$i]["numClient"]."'>".$customers[$i]["raisonSociale"]."</option>";
    }
    echo "</datalist>";
} else if(isset($intervention)){
    echo "<datalist id='interventions'>";
    for($i = 0; $i < sizeof($intervention); $i++){
        echo "<option>".$intervention[$i]["dateVisite"]."</option>";
    }
    echo "</datalist>";
}
?>
