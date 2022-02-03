<?php

include("connexion.php");
 if($_GET['pseudo'] != null && $_GET['password'] != null) {
    $req1 = "SELECT * FROM utilisateur WHERE pseudo='{$_GET['pseudo']}'";
    $stmt1=$db->query($req1);
    if($stmt1->rowcount() > 0){
        header("Location: inscription.php?erreur=pseudo"); 
    }else{
        $requete = "INSERT INTO utilisateur VALUES (NULL, :pseudo, :motdepasse)";
        $stmt = $db ->prepare($requete);
        $hash = password_hash($_GET['password'], PASSWORD_DEFAULT);
        $stmt -> bindValue(':pseudo', $_GET["pseudo"], PDO::PARAM_STR);
        $stmt -> bindValue(':motdepasse', /*$hash*/$_GET["password"], PDO::PARAM_STR);
        $stmt -> execute();
        header("Location: login.php"); 
    }
    }else{
    header("Location: inscription.php?erreur=null"); 
    }


?>
