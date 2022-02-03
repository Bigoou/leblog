<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="blog.css">
    <title>Le blog le vrai</title>
</head>

<nav>
        <h1>Le blog, le vrai</h1>
        <?php
        session_start();
        ?>
        <div class="liens">
        <?php
         if($_SESSION["id"] == 1){
               echo("<a href='users.php'>Gerer les utilisateurs</a>");
           }
        echo('<a href="archives.php">Les Archives</a>');
        if(isset($_SESSION['id']))  { 
            echo('<a class="bouton" href="deconnexion.php">Déconnexion</a>');
        }else{
            echo('<a class="bouton" href="login.php">Connexion</a>');
        }
        ?>
        </div>
    </nav>