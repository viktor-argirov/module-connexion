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
        color: black;
        width: 100%;
        }
        a{
            text-decoration: none;
            color: violet;
        }

    </style>
<body>
    <div class="content">
        <a href="deconnexion.php">Deconnexion</a>
    <?php
        session_start(); 

        $servername = "localhost";
        $username = "root";
        $password = "123456789";
        $dbname = "moduleconnexion";



        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }


        if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin') {
            $sql = "SELECT * FROM utilisateurs";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            echo "<table border='1'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Mail</th>";
            echo "<th>Password</th>";
            echo "<th>Prenom</th>";
            echo "<th>Nom</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            foreach ($utilisateurs as $key =>$user){
                echo '<tr>';
                echo '<td>' . $user['mail'] . '</td>';
                echo '<td>' . $user['password'] . '</td>';
                echo '<td>' . $user['prenom'] . '</td>';
                echo '<td>' . $user['nom'] . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        }
        else{
            header("Location: index.php");
        }
        ?>
    </div>
</body>
</html>
