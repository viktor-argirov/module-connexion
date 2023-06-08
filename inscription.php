<?php

$bdd = new PDO('mysql:host=localhost;dbname=moduleconnexion;charset=utf8', 'root', '123456789'); //Database connexion`


if(isset($_POST['submit'])){
    if(isset($_POST['mail']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['password'])){
        $mail = $_POST['mail'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $password = $_POST['password'];

        $sql = "INSERT INTO utilisateurs (mail, prenom, nom, password) VALUES (?, ?, ?, ?);";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$mail, $prenom, $nom, $password]);
        header("Location: connexion.php");
        exit();

    } else {
        echo "Tous les champs ne sont pas remplis.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
<video autoplay muted loop id="myVideo">
  <source src="https://cdn.pixabay.com/vimeo/345209742/3d-24718.mp4?width=1280&hash=572719f99554ee905da759acd11b5e391289b4ee" type="video/mp4">
</video>
    <title>Inscription</title>
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
        }
        h2{
            margin-left: 23%;
            color: #333;
        }
        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }
        form {
            margin-top: 20px;
            margin-left: 40%;
            color: #333;
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
            margin-left: 50px;
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
        <h1>Inscription</h1>
    </header>
    <main>
        <h2>Remplissez le formulaire d'inscription :</h2>
        <form method="POST" action="inscription.php">

      <p>
      <label for="mail">Mail </label>
      <input type="text" name="mail" id="mail">
      </p>
      <p>
      <label for="prenom">Prenom </label>
      <input type="text" name="prenom" id="prenom">
      </p>
      <p>
      <label for="nom">Nom</label>
      <input type="text" name="nom" id="nom">
      </p>
      <p>
      <label for="password">Password</label>
      <input type="text" name="password" id="password">
      </p>
      <p>
      <input type="submit" name="submit" id="submit" value="Submit">
      </p>
    </form>
    </main>
</body>
</html>
