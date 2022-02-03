
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include("connexion.php");
    $req = "SELECT * FROM utilisateur WHERE pseudo='{$_POST['login']}'";
    $stmt=$db->query($req);
    $pwd = htmlspecialchars($_POST["password"]);

    if($stmt->rowcount()==1){
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        if($_POST["password"] == $result["motdepasse"]){
            session_start();
        // if(password_verify($pwd, $result["motdepasse"])){
            $_SESSION["pseudo"]=$result["pseudo"];
            $_SESSION["id"]=$result["id_utilisateur"];

            echo"nom session ".$_SESSION["pseudo"];
            echo"<h3>Identifiant : ".$result['id_utilisateur']."</h3>";
            // session_destroy();
            header("Location: index.php"); 

        } else{
            // $_SESSION=array();
            // $_SESSION=destroy();
            header("Location: login.php?erreur=motdepasse"); 
            // echo("password");
        }
     }else{
        // $_SESSION=array();
        // $_SESSION=destroy();
         header("Location: login.php?erreur=login");
        //  echo("login");
     }

    
    ?>
</body>
</html>