<?php
    include_once "$racine/controleur/affectation.php";
?>

<head>
    <style type="text/css">
        @import url("css/affectation.css");
    </style>

    <script type="text/javascript" src="javascript/jquery.js"></script>
    <script type="text/javascript" src="javascript/affectation.js"></script>
</head>
<body>
    <nav>
        <p class="nomPage">Affectations</p>

        <div class="btn_affectations">
            <button class="btn_sort">Affecté</button>
            <button class="btn_sort">Pas de tri</button>
            <button class="btn_sort">Non Affecté</button>
        </div>
        <a href="../index.php?action=menu">
            <div class="iconeMenu" style="cursor:pointer;">
                <div class="trait"></div>
                <div class="trait"></div>
                <div class="trait"></div>
            </div>
        </a>
    </nav>

    <div class="content">
        <?php
            for($i = 0; $i<count($affectations); $i++){
        ?>
        <div class="affect">
            <div class="numAffectation">
                fiche n°<?= $affectations[$i]["num"] ?>
            </div>
            <div class="nomTechnicien">
                <div class="divAffect">
                    <?php
                        if($affectations[$i]["etatAffectation"] == 1){
                            echo $affectations[$i]["matricule"];
                        }
                        
                    ?>
                </div>
            </div>
            <div class="etatAffectation">
                <?php
                    if($affectations[$i]["etatAffectation"] == 0){
                        ?> <button class="btn_affect">Non affectée</button> <?php
                    } else {
                        ?> <button class="btn_affect">Affectée</button> <?php
                    }
                ?>
            </div>
            <div class="derouler">
                <a href="./?action=affichage" target="_blank">Lien</a>
            </div>
        </div>
        <?php } ?>
    </div>
</body>