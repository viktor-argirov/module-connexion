<!DOCTYPE html>
<html>
<head>
<video autoplay muted loop id="myVideo">
  <source src="https://cdn.pixabay.com/vimeo/345209742/3d-24718.mp4?width=1280&hash=572719f99554ee905da759acd11b5e391289b4ee" type="video/mp4">
</video>
    <title>Mon Site</title>
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
        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        a {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            text-decoration: none;
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
        <h1>Connector Web</h1>
    </header>
    <main>
        <h2>Bienvenue!</h2>
        <a href="inscription.php">Inscription</a>
        <a href="connexion.php">Connexion</a>
    </main>
    <footer>
        &copy; <?php echo date("Y"); ?> Mon Site. Tous droits réservés.
    </footer>
</body>
</html>
