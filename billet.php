<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="blog.css">
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

    <div class="bloc">

    <a class="bouton" href="index.php">Retourner au blog</a>


<?php 
include("connexion.php");
$req = "SELECT * FROM `billet` WHERE id_billet =".$_GET["billet"]."";
$stmt=$db->query($req);
$billet=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
<?php
foreach($billet as $billet){
    $req2 = "SELECT * FROM commentaires WHERE ext_id_billet = '".$billet['id_billet']."'";
    $stmt2=$db->query($req2);
    $com=$stmt2->fetchAll(PDO::FETCH_ASSOC);
    echo"<div class='billet'>";
    echo"<h3>Billet n°".$billet['id_billet']."</h3>";
    echo"<p>Date : ".$billet['date']."</p>";
    echo"<p>Contenu : ".$billet['contenu']."</p>";
    echo("<div>");
    echo("<h4>Commentaires</h4>");
    foreach($com as $com){
      if($com['ext_id_billet'] = $billet['id_billet']){
        if($com['ext_pseudo_commentaires']!=null){
          echo("<p>Auteur : ".$com['ext_pseudo_commentaires']."</p>");
        }else{
          echo("<p>Auteur : L'auteur a été supprimé.</p>");

        }
       echo("<p>Date : ".$com['date']."</p>");
       echo("<p>Contenu : ".$com['contenu_com']."</p>");
      //  echo("</div>");
       if(isset($_SESSION['id']))  { 
        if($_SESSION['id'] == 1 || $com['ext_utilisateurs_commentaires'] == $_SESSION['id']){
          echo"<a href='delete_com.php?id=".$com['id_commentaires']."&billet=".$billet['id_billet']."'>Supprimer ce commentaire</a>";
        }
      }      
      
    }
   
  }
  echo"</div>";
}

    if(isset($_SESSION['id']))  { 
    echo('
    <div class="com_form">
    <form action="traite_commentaires.php?src=1&id_billet='.$billet["id_billet"].'" method="POST">
    <h5>Ajouter un commentaire au billet <br>
    <textarea name="contenu_com" id="contenu_com" cols="50" rows="3"></textarea><h5>
    <input type="submit" value="Validez" class="bouton">
    </form>
   </div>
    ');
    }
    echo"</div>";

?>

</body>
</html>