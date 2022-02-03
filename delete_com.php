<?php
include("connexion.php");
$del = "DELETE FROM commentaires WHERE id_commentaires = '".$_GET['id']."'";
$db->exec($del);
header("Location: billet.php?billet=".$_GET['billet'].""); 
?>