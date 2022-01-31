<head>
    <title>Page Connexion</title>
    <style type="text/css">
        @import url("css/connexion.css");
    </style>
</head>
<body>
    <div class="container">
        <div class="tete"></div>
        <form action="./?action=verification" method="post">
            <div class="content">
                <h1>CashCash connexion</h1>
                <div class="inputs">
                    <input type="text" name="matricule" id="matricule" tabindex="1" placeholder="Identifiant">
                    <input type="password" name="mdp" id="mdp" tabindex="2" placeholder="Mot de passe">
                </div>
            </div>
            <div class="login">
                <div class="bouton">
                    <input type="submit" tabindex="3" value="Connexion">
                </div>
            </div>
        </form>
    </div>
</body>