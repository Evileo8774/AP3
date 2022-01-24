<?php
    include_once "controleur/menu.php";
?>

<head>
    <style type="text/css">
        @import url("css/menu.css");
    </style>
</head>
<body>
    <nav>
        <p class="nomPage">CashCash</p>
        <p class="userConnect"><?php echo $_SESSION['matricule']?></p>
    </nav>
    
    <div class="content">
        <button class="bouton" type="button" onclick="window.location.href = '?action=?'">Outil Statistique</button>
        <button class="bouton" type="button" onclick="window.location.href = '?action=affectation'" >Affectation Visite</button>
        <button class="bouton" type="button" onclick="window.location.href = '?action=client'">Gestion client</button>
        <button class="bouton" type="button" onclick="window.location.href = '?action=?'" >Gestion Intervention</button>
    </div>
    

</body>
