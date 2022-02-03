<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="blog.css">
    <title>Le blog le vrai</title>
</head>

<?php 
  echo"<div class='billet'>";
  echo"<h3>Billet n° ".$billet['id_billet']."</h3>";
  echo"<p class='p'>Publié le ".$billet['date']."</p>";
  echo"<p>".$billet['contenu']."</p>";

  if(isset($_SESSION['id']))  { 
  echo('
  <div class="com_form">
  <form action="traite_commentaires.php?src='.$src.'&id_billet='.$billet["id_billet"].'" method="POST">
  ');

  echo("<a href=billet.php?billet=".$billet['id_billet'].">Afficher les commentaires</a></br></div>
  ");
  

  echo('
  <h5>Commentaire </br>
  <textarea name="contenu_com" id="contenu_com" cols="38" rows="3" placeholder="Ecrivez ce qui vous passe par la tête..."></textarea></h5>
  <input type="submit" value="Validez" class="bouton">
  ');



  if($_SESSION["id"] == 1){
  echo("</br></br>"."<a href='delete.php?id=".$billet['id_billet']. "'><span class='iconify' data-icon='akar-icons:trash-can'></span>  Supprimer le billet</a> </br></br>");
  }
}
  

  echo('
  </form>
  </div> 
  ');
?>