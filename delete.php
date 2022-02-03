<?php
include("connexion.php");
$del = "DELETE FROM billet WHERE id_billet = '".$_GET['id']."'";
$db->exec($del);
header("Location: index.php"); 
?>