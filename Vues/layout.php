<!doctype html>
<html lang="fr">
<head>
    <!--Require meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="Public/Css/layout.css">
    <title><?php echo $title; ?></title>
</head>
<body>
<header>
    <h1 class="montitre"><?php echo $title; ?></h1>
    <nav>
        <ul class="navbar">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="?action=List">Missions</a></li>
            <li><a href="?action=Mission">Mission en cours</a></li>
            <li><a href="?action=Login"><button>Connexion</button></a></li>
        </ul>
    </nav>
</header>
<main>
    <section>
        <?php echo $content; ?>
    </section>
</main>
<footer>
    <div class="foot">
        <h3>ASF</h3>
    </div>
</footer>
</body>
</html>