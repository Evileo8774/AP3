<?php
    include_once "../controleur/affectation.php";
?>

<head>
    <link href="../css/affectation.css?v=<?php echo time(); ?>" rel="stylesheet">
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
            <div class="trait"></div>
            <div class="trait"></div>
            <div class="trait"></div>
        </div>
    </nav>

    <div class="content">
        <?php
            for($i = 0; $i<count($affectations); $i++){
        ?>
        <div class="affect">
            <div class="numAffectation">
                fiche n°<?= $affectations[i]["num"] ?>
            </div>
            <div class="nomTechnicien">
                <select>
                    <?php
                        for($i = 0; $i<count($techniciens); $i++){
                    ?>
                    <option>
                    <?= $techniciens[i]["nom"] ?>
                    &nbsp;
                    <?= $techniciens[i]["prenom"] ?>
                    </option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="etatAffectation">
                <?php
                    if($affectations[i]["etatAffectation"] == 0){
                        ?> <button class="btn_nonAffect">Non affectée</button> <?php
                    } else {
                        ?> <button class="btn_affect" disabled>Affectée</button> <?php
                    }
                ?>
            </div>
            <div class="derouler">

            </div>
        </div>
        <?php
            }
        ?>
    </div>
</body>