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
                <a href="?action=Logout" class="btnLogin"><button id="btn-login">Deconnexion</button></a>
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
            <a href="?action=Login" class="btnLogin btnH"><button id="btn-login">Connexion</button></a>
            <?php endif; ?>
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