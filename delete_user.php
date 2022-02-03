<?php
include("connexion.php");
$del = "DELETE FROM utilisateur WHERE id_utilisateur = '".$_GET['id']."'";
$db->exec($del);
header("Location: users.php"); 
?>