<head>
    <style type="text/css">
        @import url("css/root.css");
        @import url("css/intervention.css");
    </style>
</head>
<body>

    <div class="pageContent">
        <?php
            for($i = 0; $i<sizeof($intervention); $i++){
            ?>
            <div class="interventionSheet">
                <div class="interventionData">
                    <div class="interventionName">
                        Nom client : <strong><?= $intervention[$i]["raisonSociale"] ?></strong>
                    </div>
                    <div class="interventionDate">
                        Date de l'intervention : <strong><?= $intervention[$i]["dateVisite"] ?></strong> 
                    </div>
                    <div class="interventionMail">
                        Heure de l'intervention : <strong><?= $intervention[$i]["heureVisite"] ?></strong>
                    </div>
                    <div class="interventionAdress">
                        Adresse du client : <strong><?= $intervention[$i]["adresse"] ?></strong>
                    </div>
                    <a <?php echo "href='./?action=intervention&intervention=".$intervention[$i]["num"]."&modif=false'"; ?> class="button"><div>Intervention effectuée</div></a>
                    <a <?php echo "href='./?action=intervention&intervention=".$intervention[$i]["num"]."&modif=true'"; ?> class="button"><div>Modifier l'intervention</div></a>
                    <a <?php echo "href='./?action=intervention&fiche=".$intervention[$i]["num"]."'"; ?> class="button"><div>Générer la fiche</div></a>
                </div>
                <div class="interventionAdressMap">
                    <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=<?=$intervention[$i]["adresse"]?>&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                </div>
            </div>
            <?php
            }
            if(isset($_SESSION["i"]) && isset($_GET["modif"]) && $_GET["modif"] == "true"){
                ?>
                <form class="modifyIntervention" method="post" action="./?action=intervention">
                    <div>
                        Informations
                    </div>
                    <span>
                        Date : <input type="date" name="date" class="inputs" <?php echo "value='".$intervention[$_SESSION["i"]]["dateVisite"]."'"; ?> required/>
                    </span>
                    <span>
                        Heure : <input type="time" name="heure" class="inputs" <?php echo "value='".$intervention[$_SESSION["i"]]["heureVisite"]."'"; ?> required/>
                    </span>
                    <input type="submit" name="submit" class="submit" value="Confirmer les changements"/>
                </form>
                <?php
            } else if(isset($_SESSION["i"]) && isset($_GET["modif"]) && $_GET["modif"] == "false"){
                ?>
                <form class="modifyIntervention" method="post" action="./?action=intervention">
                    <div>
                        Informations
                    </div>
                    <span>
                        Commentaire : <input type="text" name="commentaire" class="inputs" required/>
                    </span>
                    <span>
                        Temps passé : <input type="time" name="temps" class="inputs" required/>
                    </span>
                    <input type="submit" name="submitEnd" class="submit" value="Intervention terminée"/>
                </form>
                <?php
            }
        ?>
    </div>
</body>