<!doctype html>
<html lang="fr">
    <head>
        <!--Require meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>ASF</title>
    </head>
    <body>
        <header>
            <h1 class="montitre">ASF</h1>
            <nav>
                <ul class="navbar">
                    <li><a href="index.php">Accueil</a></li>
                    <?php
                        if (isset($_POST['submit'])) {
                            '<li><a href="?action=Profil">Profil</a></li>';
                        }else {
                            //Problème avec la page
                            echo 'problème';
                        }
                    ?>
                    <li><a href="?action=List">Missions</a></li>
                    <li><a href="?action=Mission">Mission en cours</a></li>
                    <li><a href="?action=Login"><button>Connexion</button></a></li>
                </ul>
            </nav>
        </header>
        <main>
            <section>
