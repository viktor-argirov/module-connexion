<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=moduleconnexion;charset=utf8', 'root', '123456789'); //Database connexion`

if(isset($_POST['submit'])) {
    if(isset($_POST['mail']) && isset($_POST['password'])) {
        $mail = $_POST['mail'];
        $password = $_POST['password'];

        $requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE mail = ? AND password = ?");
        $requser->execute(array($mail, $password));
        $userexist = $requser->rowCount();

        if($userexist == 1) {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['mail'] = $userinfo['mail'];
            $_SESSION['password'] = $userinfo['password'];
            header("Location: profil.php?id=".$_SESSION['id']);
            exit();
        } else {
            $error = "Identifiant ou mot de passe incorrect.";
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <video autoplay muted loop id="myVideo">
  <source src="https://cdn.pixabay.com/vimeo/345209742/3d-24718.mp4?width=1280&hash=572719f99554ee905da759acd11b5e391289b4ee" type="video/mp4">
</video>
    <title>Connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        h1 {
            margin: 0;
            margin-right: 15px;
        }
        h2{
            color: #333;
        }
        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
            text-align: center;
        }
        form {
            margin-top: 30px;
            margin-left: 38%;
        }
        label, input {
            display: block;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-left: 27px;    
        }
        a{
            text-decoration: none;
        }
        .error-message {
            color: red;
        }
        #myVideo {
        position: fixed;
        right: 0;
        bottom: 0;
        min-width: 100%;
        min-height: 100%;
        }
        .content {
        position: fixed;
        top: 0;
        background: rgba(0, 0, 0, 0.5);
        color: #f1f1f1;
        width: 100%;
        }
    </style>
</head>
<body>
<div class="content">
    <header>
        <h1>Connexion</h1>
    </header>
    <main>
        <h2>Entrez vos informations de connexion :</h2>
        <form method="POST" action="connexion.php">
            <input type="email" name="mail" placeholder="Mail" />
            <input type="password" name="password" placeholder="Mot de passe" />
            <br /><br />
           <a href="profil.php"><input type="submit" name="submit" value="Se connecter !" /></a> 
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
</body>
</html>
