<?php
    include_once "../controleur/client.php";
?>

<head>
    <style type="text/css">
        @import url("../css/client.css");
    </style>

    <script type="text/javascript" src="../javascript/jquery.js"></script>
    <!-- <script type="text/javascript" src="../javascript/client.js"></script> -->
</head>
<body>
    <nav>
        <p class="nomPage">Gestion client</p>

        <div class="iconeMenu">
            <div class="trait"></div>
            <div class="trait"></div>
            <div class="trait"></div>
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
                <img src="../images/arrow.png" alt="arrow" class="arrowDeploy">
            </div>
        </div>
        <div class="hiddenForm">
            <div class="fiche">
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
                </div>
                <div class="adresse">
                    Adresse : <?= $clients[$i]["adresse"] ?>
                    <div class="map"><iframe width="40%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=<?=$clients[$i]["adresse"]?>&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">j'ai fais ça lol</a></iframe></div>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</body>