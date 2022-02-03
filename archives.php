<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="blog.css">
  <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
  <title>Document</title>
</head>
<body>

<nav>
        <h1>Le blog, le vrai</h1>
        <?php
        session_start();
        ?>
        <div class="liens">
        <?php
        if(isset($_SESSION['id']))  { 
         if($_SESSION["id"] == 1){
               echo("<a href='users.php'>Gerer les utilisateurs</a>");
           }
            echo('<a class="bouton" href="deconnexion.php">Déconnexion</a>');
        }else{
            echo('<a href="archives.php">Les Archives</a>');
            echo('<a class="bouton" href="login.php">Connexion</a>');
        }
        ?>
        </div>
    </nav>
    
<div class="bloc1">
    
    <?php
    include("connexion.php");
    ?>
    
    <a class="bouton" href="index.php"><span class="iconify" data-icon="bx:bx-arrow-back"></span> Retourner au blog</a>
</br> </br>
<h1>Les Archives</h1>
<div class="billets">
    <?php 
     $req = "SELECT * FROM billet";
     $stmt=$db->query($req);
     $billet=$stmt->fetchAll(PDO::FETCH_ASSOC);
     foreach($billet as $billet){
         $src=2;
      include("affiche_billet.php");
     }
    ?>
    </div>
    </br></br>
    <a class="bouton" href="#top">Retour en haut de la page</a>
</div> 
</body>
</html>