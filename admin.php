<?php
// Vérification de l'authentification

session_start(); 

if ($_SESSION['mail'] !== 'admin') {
    // Redirection si l'utilisateur n'est pas authentifié en tant qu'admin
    header('Location: connexion.php');
    exit();
}
// Connexion à la base de données
$host = 'localhost';
$dbname = 'moduleconnexion';
$username = 'root';
$password = '123456789';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
    exit();
}

// Récupération des informations des utilisateurs
$query = "SELECT * FROM utilisateurs";
$stmt = $db->query($query);
$utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
<video autoplay muted loop id="myVideo">
  <source src="https://cdn.pixabay.com/vimeo/345209742/3d-24718.mp4?width=1280&hash=572719f99554ee905da759acd11b5e391289b4ee" type="video/mp4">
</video>
    <title>Page d'administration</title>
    </head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f7f7f7;
            border: 1px solid #ddd;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
<body>
    <div class="container">
        <h1>Liste des utilisateurs</h1>
        <?php if (count($users) > 0): ?>
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Autre information</th>
                </tr>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['nom'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['autre_information'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Aucun utilisateur trouvé.</p>
        <?php endif; ?>
    </div>
</body>
</html>
