<?php
// connexion à la base de données
include_once "../modele/bd.utilisateur.inc.php";

if(isset($_POST['matricule']) && isset($_POST['mdp']))
{      
    $result = verifyPassword($_POST['matricule'], $_POST['mdp']);
    $passwordhashed = hashPassword($_POST['mdp']);

    $passwordverif = $result['mdp'];
    $username = $result['matricule'];
    $password = $passwordhashed['mdp'];	

    if($_POST['matricule'] !== "" && $_POST['mdp'] !== ""){  
        if($_POST['matricule'] == $username && $password == $passwordverif) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['username'] = $username;
           header('Location: ../vue/pageMenu.php');
        }
        else
        {
           header('Location: ../vue/pageConnexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: ../vue/pageConnexion.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: ../vue/pageConnexion.php');
}
?>