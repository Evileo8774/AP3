<?php
    include_once "$racine/controleur/affectation.php";
    session_start();
?>

<head>
    <title>Page affectation</title>
    <style type="text/css">
        @import url("css/affectation.css");
    </style>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
        <div class="iconeMenu">
            <a href="?action=menu" target="_self">
                <span class="material-icons">home</span>
            </a>    
        </div>
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
                <form method="post" action="./?action=affichage" target="_blank">
                    <?php $_SESSION["id"] = "salut" ?>
                    <input type="submit" value="soumettre">
                </form>
            </div>
        </div>
        <?php } ?>
    </div>
</body>