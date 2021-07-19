<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="Public/Css/layout.css">
    <title><?php echo $title; ?></title>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="?action=List">Missions</a></li>
            <li><a href="?action=Detail">Mission en cours</a></li>
            <li><a href="?action=Login">Connexion</a></li>
        </ul>
    </nav>
</header>
<div>
    <h1><?php echo $title; ?></h1>
</div>
<main>
    <section>
        <?php echo $content; ?>
    </section>
</main>
<footer>
    <div>
        <h3>ASF</h3>
    </div>
</footer>
</body>
</html>