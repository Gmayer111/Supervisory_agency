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
    <link href='http://fonts.googleapis.com/css?family=Ubuntu Condensed' rel='stylesheet' type='text/css'>
    <title><?php echo $title; ?></title>
</head>
<body>
<header class="headerForm">
    <nav class="navForm">
        <div>
            <ul class="liste">
                <?php if (isset($_SESSION['User'])): ?>
                    <li><a href="index.php">ACCUEIL</a></li>
                    <li><a href="?action=Profil">PROFIL</a></li>
                    <li><a href="?action=MissionForm">CRÉER MISSION</a></li>
                    <li><a href="?action=List">MISSIONS</a></li>
                    <div class="dropdown">
                        <button class="dropBtn">DÉTAIL MISSION</button>
                        <div class="dropContent">
                            <?php foreach ($missions as $mission): ?>
                                <a href="?action=Detail&codeName=<?php echo $mission->getCodeName() ?>"><?php echo $mission->getCodeName() ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <li><a href="?action=Logout" class="btn-login btnLogD">DÉCONNEXION</a></li>
                <?php endif; ?>
                <?php if (!isset($_SESSION['User'])): ?>
                    <li class="liHome"><a href="index.php">ACCUEIL</a></li>
                    <li><a href="?action=List">MISSIONS</a></li>
                    <div class="dropdown">
                        <button class="dropBtn btnH">DÉTAIL MISSION</button>
                        <div class="dropContent">
                            <?php foreach ($missions as $mission): ?>
                                <a href="?action=Detail&codeName=<?php echo $mission->getCodeName() ?>"><?php echo $mission->getCodeName() ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <li class="logLi"><a href="?action=Logout" class="btn-login btnLogC">CONNEXION</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <div>

        </div>
    </nav>
</header>
<main class="logoBg">
    <div class="backgroundLogo"></div>
    <section>
        <?php echo $content; ?>
    </section>
</main>
<footer>
    <div>
        <h3>ASF</h3>
        <ul class="ulFoot">
            <li class="liFoot">Politque de confidentialité</li>
        </ul>
    </div>
</footer>
</body>
</html>