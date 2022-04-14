<head>
    <style type="text/css">
        @import url("css/root.css");
        @import url("css/intervention.css");
    </style>
</head>
<body>

    <div class="pageContent">
        <?php
            for($i = 0; $i<count($intervention); $i++){
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
                    <a <?php echo "href='./?action=intervention&intervention=".$intervention[$i]["num"]."'"; ?> class="button"><div>Modifier les informations</div></a>
                </div>
                <div class="interventionAdressMap">
                    <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=<?=$intervention[$i]["adresse"]?>&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                </div>
            </div>
            <?php
            }/*
            if(isset($_SESSION["i"])){
                ?>
                <form class="modifyCustomer" method="post" action="./?action=client">
                    <div>
                        Informations du client
                    </div>
                    <span>
                        Nom : <input type="text" name="name" class="inputs" <?php echo "value='".$customers[$_SESSION["i"]]["raisonSociale"]."'"; ?> required/>
                    </span>
                    <span>
                        siren : <input type="text" name="siren" class="inputs" <?php echo "value='".$customers[$_SESSION["i"]]["siren"]."'"; ?> required/>
                    </span>
                    <span>
                        code ape : <input type="text" name="ape" class="inputs" <?php echo "value='".$customers[$_SESSION["i"]]["codeApe"]."'"; ?> required/>
                    </span>
                    <span>
                        adresse : <input type="text" name="adresse" class="inputs" <?php echo "value='".$customers[$_SESSION["i"]]["adresse"]."'"; ?> required/>
                    </span>
                    <span>
                        téléphone : <input type="text" name="tel" class="inputs" <?php echo "value='".$customers[$_SESSION["i"]]["tel"]."'"; ?> required/>
                    </span>
                    <span>
                        courriel : <input type="email" name="mail" class="inputs" <?php echo "value='".$customers[$_SESSION["i"]]["email"]."'"; ?> required/>
                    </span>
                    <span>
                        durée de déplacement : <input type="time" name="time" class="inputs" <?php echo "value='".$customers[$_SESSION["i"]]["dureeDeplacement"]."'"; ?> required/>
                    </span>
                    <span>
                        distance en KM : <input type="number" name="dist" class="inputs" <?php echo "value='".$customers[$_SESSION["i"]]["distanceKM"]."'"; ?> required/>
                    </span>
                    <input type="submit" name="submit" class="submit" value="Confirmer les changements"/>
                </form>
                <?php
            }*/
        ?>
    </div>
</body>