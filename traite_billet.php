<?php
session_start();
include("connexion.php");
$requete = "INSERT INTO billet VALUES (NULL, NOW(), :contenu, :ext_utilisateurs_billet, :ext_commentaires)";
 $stmt = $db ->prepare($requete);
 $stmt -> bindValue(':contenu', $_POST["contenu"], PDO::PARAM_STR);
 $stmt -> bindValue(':ext_utilisateurs_billet', "", PDO::PARAM_STR);
 $stmt -> bindValue(':ext_commentaires', "", PDO::PARAM_STR);

 $stmt -> execute();
 header("Location: index.php"); 
?>