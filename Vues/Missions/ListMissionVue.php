<?php

use Managers\MissionManager;

session_start();
ob_start();

$manager = new MissionManager();
$missions = $manager->getAll();

foreach ($missions as $mission): ?>




<?php endforeach; ?>
<style><?php echo include_once 'Public/Css/mission.css'?></style>
<style><?php echo include_once 'Public/Css/layout.css'?></style>
<div class="container">
    <table>
        <thead>
        <tr>
            <th>TITRE</th>
        </tr>
        <tr>
            <th>CODE</th>
        </tr>
            <th>PAYS</th>
            <th>DEBUT</th>
            <th>FIN</th>
            <th>ETAT</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>TITRE</th>
            <th>CODE</th>
            <th>PAYS</th>
            <th>DEBUT</th>
            <th>FIN</th>
            <th>ETAT</th>
        </tr>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
$title = 'Liste des missions';
echo require_once 'Vues/layout.php';
?>