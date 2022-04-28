<head>
    <style type="text/css">
        @import url("css/root.css");
        @import url("css/affectation.css");
    </style>
</head>
<body>

    <div class="pageContent">
        <?php
            for($i = 0; $i<count($visitesNonAffectees); $i++){
            ?>
            <div class="customerSheet">
                <div class="customerData">
                    <div class="customerName">
                        Nom client : <strong><?= $visitesNonAffectees[$i]["raisonSociale"] ?></strong>
                    </div>
                    <div class="interventionDate">
                        Numéro de téléphone : <strong><?= $visitesNonAffectees[$i]["dateVisite"] ?></strong> 
                    </div>
                    <div class="interventionTime">
                        Adresse mail : <strong><?= $visitesNonAffectees[$i]["heureVisite"] ?></strong>
                    </div>
                    <a <?php echo "href='./?action=client&client=".$visitesNonAffectees[$i]["num"]."'"; ?> class="button"><div>Affecter un technicien</div></a>
                </div>
            </div>
            <?php
            }
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
            }
        ?>
    </div>
</body>