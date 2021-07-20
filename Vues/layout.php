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
            <?php
            if (isset($_POST['submit'])) {
               echo '<li><a href="?action=Profil">Profil</a></li>';
            }else {
                //Problème avec la page

            }
            ?>
            <li><a href="?action=List">Missions</a></li>
            <li><a href="?action=Detail">Mission en cours</a></li>
            <button><a href="?action=Login" id="btn-login">Connexion</a></button>
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