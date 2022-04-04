<?php
    include_once "$racine/controleur/intervention.php";
?>

<head>
    <title>Page intervention</title>
    <style type="text/css">
        @import url("css/intervention.css");
    </style>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="javascript/jquery.js"></script>
    <script type="text/javascript" src="javascript/intervention.js"></script>
</head>
<body>
    <nav>
        <p class="nomPage">Intervention</p>

        <form method="POST" action="">
            <input type="date" id="date">
            <select>
                <?php
                for($i = 0; $i < sizeof($employe); $i++){
                    ?><option><?php echo $employe[$i]["nom"];?></option><?php 
                }
                ?>
            </select>
            <input type="submit" value="Modifier">
        </form>

        <div class="iconeMenu">
            <a href="?action=menu" target="_self">
                <span class="material-icons">home</span>
            </a>    
        </div>
    </nav>

    <div class="content">
        <?php
            for($i = 0; $i<count($clients); $i++){
        ?>
        <div class="client">
            <div class="numClient">
                Client n°<?= $clients[$i]["numClient"] ?>
            </div>
            <div class="derouler">
                <img src="images/arrow.png" alt="arrow" class="arrowDeploy">
            </div>
        </div>
        <div class="hiddenForm">
            <div class="fiche">
                <div class="container">
                    <div class="nomClient">
                        Nom client : <?= $clients[$i]["raisonSociale"] ?>
                    </div>
                    <div class="infoClient">
                        <div class="numClient">
                            Num Client : <?= $clients[$i]["numClient"] ?>
                        </div>
                        <div class="telClient">
                            Numéro de téléphone : <?= $clients[$i]["tel"] ?> 
                        </div>
                        <div class="mailClient">
                            Adresse mail : <?= $clients[$i]["email"] ?>
                        </div>
                        <div class="dateIntervention">
                            Date Intervention : <?= $clients[$i]["dateVisite"] ?>
                        </div>
                        <div class="technicienAssigné">
                           Matricule technicien : <?= $clients[$i]["matricule"] ?>
                        </div>
                        <div class ="bouton">
                            <input type ="button" name="Modifier">
                        </div>
                    </div>
                </div>
                <div class="adresse">
                    <!-- Adresse : <?= $clients[$i]["adresse"] ?> -->
                <div class="map"><iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=<?=$clients[$i]["adresse"]?>&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">j'ai fais ça lol</a></iframe></div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</body>