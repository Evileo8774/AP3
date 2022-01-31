<?php
    include_once "controleur/menu.php";
?>

<head>
    <title>Page menu</title>
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
            <div class="boutons">
                <button class="bouton" type="button" onclick="window.location.href = '?action=client'">Gestion client</button>
                <button class="bouton" type="button" onclick="window.location.href = '?action=intervention'" >Gestion Intervention</button>
                
            </div>
            <div class="deconnexion">
                <button class="boutonDeco" type="button" onclick="window.location.href = '?action=connexion'">Déconnexion</button>
            </div>
            
            
            <?php
        } else {
            ?>
            
            <!-- Code HTML du gestionnaire -->
            
            <div class="boutons">
                <button class="bouton" type="button" onclick="window.location.href = '?action=?'">Outil Statistique</button>
                <button class="bouton" type="button" onclick="window.location.href = '?action=affectation'" >Affectation Visite</button>
            </div>
            <div class="deconnexion">
                <button class="boutonDeco" type="button" onclick="window.location.href = '?action=connexion'">Déconnexion</button>
            </div>
            
            <?php
        }
    ?>
    

</body>
