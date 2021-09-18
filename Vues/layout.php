<?php
use Managers\MissionManager;
$manager = new MissionManager();
$missions = $manager->getAll();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/b5efc1d547.js" crossorigin="anonymous"></script>
    <title><?php echo $title; ?></title>
</head>
<body>
<header>
    <nav>
        <ul class="liste">
            <?php if (isset($_SESSION['CodeName'])): ?>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="?action=Profil">Profil</a></li>
                <li><a href="?action=MissionForm">Créer mission</a></li>
                <li><a href="?action=List">Missions</a></li>
                <div class="dropdown">
                    <button class="dropBtn">Détail mission</button>
                    <div class="dropContent">
                        <?php foreach ($missions as $mission): ?>
                        <a href="?action=Detail&codeName=<?php echo $mission->getCodeName() ?>"><?php echo $mission->getCodeName() ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <li><a href="?action=Logout" class="btn-login">Déconnexion</a></li>


            <?php endif; ?>
            <?php if (!isset($_SESSION['CodeName'])): ?>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="?action=List">Missions</a></li>
                <div class="dropdown">
                    <button class="dropBtn btnH">Détail mission</button>
                    <div class="dropContent">
                        <?php foreach ($missions as $mission): ?>
                            <a href="?action=Detail&codeName=<?php echo $mission->getCodeName() ?>"><?php echo $mission->getCodeName() ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <li><a href="?action=Logout" class="btn-login">Connexion</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
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