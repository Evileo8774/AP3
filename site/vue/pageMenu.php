<?php
    include_once "controleur/menu.php";
?>

<head>
    <title>Page Menu</title>
    <style type="text/css">
        @import url("css/menu.css");
    </style>
</head>
<body>
    <nav>
        <p class="nomPage">CashCash</p>
        <p class="userConnect"><?php echo $username['prenom']." ".$username['nom'] ?></p>
    </nav>
    
    

    <?php
        if(isset($tmp) && $tmp == true){
            ?>
            
            <!-- code HTML du technicien -->
            <div class="content">
                <button class="bouton" type="button" onclick="window.location.href = '?action=client'">Gestion client</button>
                <button class="bouton" type="button" onclick="window.location.href = '?action=?'" >Gestion Intervention</button>
            </div>
            
            
            <?php
        } else {
            ?>
            
            <!-- Code HTML du gestionnaire -->
            
            <div class="content">
                <button class="bouton" type="button" onclick="window.location.href = '?action=?'">Outil Statistique</button>
                <button class="bouton" type="button" onclick="window.location.href = '?action=affectation'" >Affectation Visite</button>
            </div>
            
            <?php
        }
    ?>
    

</body>
