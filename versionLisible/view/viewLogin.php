<head>
    <style type="text/css">
        @import url("css/root.css");
        @import url("css/login.css");
    </style>
</head>
<body>
    <div class="container">
        <div class="containerHead"></div>
        <form action="./?action=login" method="post">
            <div class="containerTitle">
                CashCash connexion
            </div>
            <?php
                if(isset($error)){
                    echo "<div class='errorMessage'>$error</div>";
                }
            ?>
            <div class="content">
                <input type="text" name="matricule" id="matricule" class="inputs" tabindex="1" placeholder="Identifiant" required/>
                <input type="password" name="mdp" id="mdp" class="inputs" tabindex="2" placeholder="Mot de passe" required/>
            </div>
            <input type="submit" tabindex="3" id="cnx" value="Connexion">
        </form>
    </div>
</body>