<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="blog.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    <title>Le blog le vrai</title>
</head>
<body>

<div class="class1">
<nav>
        <h1>Le blog, le vrai</h1>
        <?php
        session_start();
        ?>
        <div class="liens">
        <?php
        if($_SESSION["id"] == 1){
            echo('<a href="users.php">Gerer les utilisateurs</a>');
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

    <div class="bloc0">
        <div class="section1">
            <?php
            include("connexion.php");
            if(isset($_SESSION['id']))  { 
            echo"<header> Bonjour ".$_SESSION["pseudo"]. " ! </header> </br>";
           // echo"<h3>Identifiant : ".$_SESSION['id']."</h3>"; 
           }
           ?>
           <h1> Découvrez dans ce blog les meilleurs conseils d'écritures </h1>
           <a class="bouton" href="archives.php">Acceder aux archives</a>
        </div>
        
        <div class="section2">
            <img class="img1" src="illustration.png" alt="">
        </div>
    </div>
    </div>
    

    <div class="bloc1">

    <?php
            if(isset($_SESSION['id']))  { 
            if($_SESSION["id"] == 1){
            echo('
            <form action="traite_billet.php" method="POST">
                <h3>Créer un billet </h3>
                <textarea name="contenu" id="contenu" cols="175" rows="10" placeholder="Ecrivez ce qui vous passe par la tête..."></textarea>
                </br></br>
                <input type="submit" value="Poster" class="bouton">
            </form>');
                }
            }
         ?>

        <h2>Voici les trois derniers billets</h2>
        <div class="billets">
        <?php 
            $req = "SELECT * FROM `billet` ORDER BY `billet`.`date` DESC LIMIT 3";
            $stmt=$db->query($req);
            $billet=$stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($billet as $billet){
                $src=3;
                include("affiche_billet.php");
        }       
        ?>
        </div>
</br></br>
    <a class="bouton" href="archives.php">Voir les archives</a>

    </div>

    
</body>
</html>