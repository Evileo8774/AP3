<head>
    <style type="text/css">
        @import url("css/root.css");
        @import url("css/affectation.css");
    </style>
</head>
<body>

    <div class="pageContent">
        <div class="createIntervention">
            <a href="./?action=visite&create=intervention" class="button2"><div>Créer une intervention</div></a>
        </div>
        <?php
            for($i = 0; $i<count($visitesNonAffectees); $i++){
            ?>
            <div class="interventionSheet">
                <div class="interventionData">
                    <div class="customerName">
                        Nom client : <strong><?= $visitesNonAffectees[$i]["raisonSociale"] ?></strong>
                    </div>
                    <div class="interventionDate">
                        Date de visite : <strong><?= $visitesNonAffectees[$i]["dateVisite"] ?></strong> 
                    </div>
                    <div class="interventionTime">
                        Heure de visite : <strong><?= substr($visitesNonAffectees[$i]["heureVisite"], 0, 5) ?></strong>
                    </div>
                    <a <?php echo "href='./?action=visite&visite=".$visitesNonAffectees[$i]["num"]."'"; ?> class="button"><div>Modifier l'intervention</div></a>
                </div>
            </div>
            <?php
            }
            if(isset($_SESSION["i"])){
                ?>
                <form class="modifyIntervention" method="post" action="./?action=visite">
                    <div>
                        Informations de l'intervention
                    </div>
                    <span>
                        Date de visite : <input type="date" name="dateVisite" class="inputs" <?php echo "value='".$visiteAAffecter["dateVisite"]."'"; ?> required/>
                    </span>
                    <span>
                        heure de visite : <input type="time" name="heureVisite" class="inputs" <?php echo "value='".$visiteAAffecter["heureVisite"]."'"; ?> required/>
                    </span>
                    <span>
                        matricule : <input type="text" name="matricule" class="inputs" <?php echo "value='".$visiteAAffecter["matricule"]."'"; ?> list="techniciens" required/>
                    </span>
                    <input type="submit" name="submitUpdate" class="submit" value="Confirmer les changements"/>
                </form>
                <?php
            }
            if(isset($_GET["create"])){
                ?>
                <form class="modifyIntervention" method="post" action="./?action=visite">
                    <div>
                        Informations de l'intervention
                    </div>
                    <span>
                        Date de visite : <input type="date" name="dateVisite" class="inputs" required/>
                    </span>
                    <span>
                        heure de visite : <input type="time" name="heureVisite" class="inputs" required/>
                    </span>
                    <span>
                        Raison sociale du client : <input type="text" name="raisonSociale" class="inputs" list="clients" required/>
                    </span>
                    <input type="submit" name="submitCreate" class="submit" value="Créer l'intervention"/>
                </form>
                <?php
            }
        ?>
    </div>

    <datalist id="techniciens">
        <?php
            for($i = 0; $i < sizeof($techniciens); $i++) echo "<option value='".$techniciens[$i]["matricule"]."'>".$techniciens[$i]["nom"]." ".$techniciens[$i]["prenom"]."</option>";
        ?>
    </datalist>
    <datalist id="clients">
        <?php
            for($i = 0; $i < sizeof($clients); $i++) echo "<option value='".$clients[$i]["numClient"]."'>".$clients[$i]["raisonSociale"]."</option>";
        ?>
    </datalist>
</body>