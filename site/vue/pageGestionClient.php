<?php
    include_once "../controleur/client.php";
?>

<head>
    <style type="text/css">
        @import url("../css/client.css");
    </style>

    <script type="text/javascript" src="../javascript/jquery.js"></script>
    <script type="text/javascript" src="../javascript/affectation.js"></script>
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
                fiche n°<?= $clients[$i]["numClient"] ?>
            </div>
            <div class="derouler">
                <img src="../images/arrow.png" alt="arrow" class="arrowDeploy">
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</body>