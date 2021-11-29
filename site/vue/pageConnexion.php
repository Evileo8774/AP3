<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Page de connexion</title>
        <link href="css/base.css" rel="stylesheet">
        <link href="css/connexion.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="tete"></div>
            <form action="vue/pageMenu.php" method="POST">
                <div class="content">
                    <h1>CashCash connexion</h1>
                    <input type="text" name="id" id="id" tabindex="1" placeholder="Identifiant" required>
                    <input type="password" name="mdp" idx²="mdp" tabindex="2" placeholder="Mot de passe" required>
                </div>
                <div class="login">
                    <input type="submit" tabindex="3" value="Connexion">
                </div>
            </form>
        </div>
    </body>
</html>