<?php
    include_once "$racine/controleur/affectation.php";
?>

<head>
    <style type="text/css">
        @import url("css/affectation.css");
    </style>

    <script type="text/javascript" src="../javascript/jquery.js"></script>
    <script type="text/javascript" src="../javascript/affectation.js"></script>
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
                <img src="../images/arrow.png" alt="arrow" class="arrowDeploy">
            </div>
        </div>
        <?php
            if($affectations[$i]["etatAffectation"] == 0){  
        ?>
            <div class="hidden">
                <form method="post" action="./affectation.php" class="hidden">
                    <input type="date" name="dateAffectation" class="affectationForm"/>
                    <input type="time" name="timeAffectation" class="affectationForm"/>
                    <input type="text" name="detailAffectation" class="affectationForm" placeholder="Details de l'affectation" size="100"/>
                    <select>
                        <?php
                            for($j = 0; $j < count($techniciens); $j++){
                                ?> <option><?php echo $techniciens[$j]["prenom"].$techniciens[$j]["nom"]; ?></option> <?php
                            }
                        ?>
                    </select>
                    <select>
                    <?php
                            for($j = 0; $j < count($clients); $j++){
                                ?> <option><?php echo $clients[$j]["raisonSociale"]; ?></option> <?php
                            }
                        ?>
                    </select>
                    <input type="submit" value="affecter"/>
                </form>
            </div>
        <?php
        } else{
            ?>
            <div class="hidden">
                <div class="affectatationDisplay" id="aDate"><?php echo $affectations[$i]["dateVisite"] ?></div>
                <div class="affectatationDisplay" id="aTime"><?php echo $affectations[$i]["heureVisite"] ?></div>
                <div class="affectatationDisplay" id="aDetail"><?php echo $affectations[$i]["detail"] ?></div>
                <div class="affectatationDisplay" id="aRaison"><?php echo $affectations[$i]["numClient"] ?></div>
            </div>
            <?php
        }
        }
        ?>
    </div>
</body>