<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=moduleconnexion;charset=utf8', 'root', '123456789'); //Database connexion`

echo "ma session".$_SESSION["id"];
// Récupération des informations actuelles de l'utilisateur depuis la base de données
$userID =  $_SESSION['id']; // Remplacez cette valeur par l'ID de l'utilisateur connecté


$req = $bdd->prepare("SELECT * FROM utilisateurs WHERE id = ?");
$req->execute(array($userID));

if ($req->rowCount() > 0) {
    $row = $req->fetch(PDO::FETCH_ASSOC);
    $nom = $row["nom"];
    $prenom = $row["prenom"];
    $login = $row["mail"];
    $password = $row["password"];


    print_r($row); // Utilisation de print_r pour afficher les détails de l'utilisateur
} else {
    echo "Utilisateur non trouvé.";
}

// Traitement du formulaire de modification
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nouveauNom = $_POST["nom"];
    $nouveauPrenom = $_POST["prenom"];
    $nouveauEmail = $_POST["mail"];

    // Mise à jour des informations dans la base de données
    $updateSql = "UPDATE utilisateurs SET nom = '$nouveauNom', prenom = '$nouveauPrenom', mail = '$nouveauEmail' WHERE id = $userID";
    if ($bdd->query($updateSql) === TRUE) {
        echo "Profil mis à jour avec succès.";
        // Vous pouvez rediriger l'utilisateur vers une autre page après la mise à jour du profil si nécessaire
    } else {
        echo "Erreur lors de la mise à jour du profil: "; 
    }
}
?>

<!DOCTYPE html>
<html>
<video autoplay muted loop id="myVideo">
  <source src="https://cdn.pixabay.com/vimeo/345209742/3d-24718.mp4?width=1280&hash=572719f99554ee905da759acd11b5e391289b4ee" type="video/mp4">
</video>
      <title>Document</title>
      <meta charset="utf-8">
   </head>
   <body>
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
            margin-top: 40px;
            margin-left: 42%;
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
            margin-left: 42px;    
        }
        a{
            text-decoration: none;
            margin-left: 27px;   
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
<body>
    <section>
    <div class="content">
        <form class="formulaire" action="profil.php" method="post">
            <ul>
                <br />
                    <h1>Modifier votre profil</h1>
                <br />
                <li>
                    <label for="login">Mail</label>
                    <input type="text" id="login" name="mail" value="<?php echo $login; ?>" required>
                </li>
                <br />
                <li>
                    <label for="prenom">Prénom:</label>
                    <input type="text" id="prenom" name="prenom" value="<?php echo $prenom; ?>" required>
                </li>
                <br>
                <li>
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>" required>
                </li>
                <br />
                <li>
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" value="<?php echo $password; ?>" required>
                </li>
                <br />
                    <input type="submit" name="valider" value="Valider &#10004;" />
                    <a href="deconnexion.php">Deconnexion</a>
                    <br />
            </ul>
        </form>
    </div>
    </section>
</body>

</html>