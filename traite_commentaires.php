<?php 
session_start();
include("connexion.php");
$requete = "INSERT INTO commentaires VALUES (NULL, :ext_id_billet, :contenu_com, NOW(), :ext_utilisateurs_commentaires, :ext_pseudo_commentaires)";
// $req = "SELECT * FROM utilisateur WHERE id='{$_SESSION['id']}'";
 $stmt = $db ->prepare($requete);
 $stmt -> bindValue(':contenu_com', $_POST["contenu_com"], PDO::PARAM_STR);
 $stmt -> bindValue(':ext_id_billet', $_GET["id_billet"], PDO::PARAM_STR);
 $stmt -> bindValue(':ext_utilisateurs_commentaires', $_SESSION['id'], PDO::PARAM_STR);
 $stmt -> bindValue(':ext_pseudo_commentaires', $_SESSION['pseudo'], PDO::PARAM_STR);
 $stmt -> execute();
 if(isset($_GET['src'])){
     if($_GET['src'] == 1){
        header("Location: billet.php?billet=".$_GET['id_billet'].""); 
     }else if($_GET['src'] == 2){
        header("Location: archives.php"); 
     }else{
      header("Location: index.php"); 
     }
 }


?>