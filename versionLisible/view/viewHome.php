<?php
    if(isset($_SESSION["i"])) unset($_SESSION["i"]);
?>
<head>
    <style type="text/css">
        @import url("css/root.css");
        @import url("css/home.css");
    </style>
</head>
<body>
    <div class="pageContent">
        <?php
            //si $verify équivaut à FALSE, cela signifie que l'employé n'est pas un technicien.
            if($verify == false){
                ?>
                <a class="redirect" href="./?action=visite">
                    Affecter des visites
                </a>
                <a class="redirect" href="./?action=outil">
                    Outil statistique
                </a>
                <?php
            } else {
                ?>
                <a class="redirect" href="./?action=client">
                    Gestion des clients
                </a>
                <a class="redirect" href="./?action=intervention">
                    Gestion des interventions
                </a>
                <?php
            }
        ?>
    </div>
</body>