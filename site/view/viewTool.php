<head>
    <style type="text/css">
        @import url("css/root.css");
        @import url("css/tool.css");
    </style>
</head>
<body>
    <div class="pageContent">
        <div class="selectMonth quarter">
            <h3>Mois sélectionné</h3>
            <form method="post" action="./?action=outil">
                <input type="month" name="monthPick" <?php if(isset($month)) echo "value='".$year."-".$month."'";?>/>
                <input type="submit" value="trier"/><br>
            </form>
        </div>
        <?php
            if(isset($month)){
            ?>
            <div class="interventionCount quarter">
                <h3>Nombre d'interventions réalisées</h3>
                <?php echo $nbInterventions["nb"]; ?>
            </div>
            <div class="KMCount quarter">
                <h3>Distance parcourue (en KM)</h3>
                <?php echo $kmParcourus["km"]." kilomètres"; ?>
            </div>
            <div class="amountOfTime quarter">
                <h3>Durée de contrôle du matériel</h3>
                <?php echo substr($temps["tps"], 0, -2)." minutes"; ?>
            </div>
            <?php
            }
        ?>
    </div>
</body>