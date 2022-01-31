<?php
    include_once "../controleur/menu.php";
?>

<?php
   if(isset($tech) && $tech == true){
       //la partie technicien
       ?>

       <body>
    <nav>
        <ul>
            <li>CashCash</li>
            <li>Gestionnaire</li>
        </ul>
    </nav>
    <h1>Page menu</h1>
    
    <button class="Gestionnaire" type="button" href="outilStatistique.php"> Outil Statistique
    </button>

    <button class="Gestionnaire" type="button" href="affectationVisite.php" > Affectation Visite
    </button>

</body>

       

       <?php
     } else {
        //la partie gestionnaire
        ?>
        
        ici l'autre code
        
        <?php
     }
     ?>

<body>
    <nav>
        <ul>
            <li>CashCash</li>
            <li>Gestionnaire</li>
        </ul>
    </nav>
    <h1>Page menu</h1>
    
    <button class="Gestionnaire" type="button" href="outilStatistique.com"> Outil Statistique
    </button>

    <button class="Gestionnaire" type="button" href="affectationVisite.com" > Affectation Visite
    </button>


</body>
