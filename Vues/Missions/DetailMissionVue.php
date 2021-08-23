<?php

use Managers\MissionManager;

session_start();
ob_start();
?>
<style><?php echo include_once 'Public/Css/mission.css'?></style>
<style><?php echo include_once 'Public/Css/layout.css'?></style>
<?php
$manager = new MissionManager();
$missions = $manager->getAllDatas();
foreach ($missions as $mission):
?>
    <table>
        <tr>
            <th>Titre</th>
            <td><?php echo $mission[2] ?></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><?php echo $mission[3] ?></td>
        </tr>
        <tr>
            <th>Nom de code</th>
            <td><?php echo $mission[0] ?></td>
        </tr>
        <tr>
            <th>Pays</th>
            <td><?php echo $mission[4] ?></td>
        </tr>
        <tr>
            <th>Nom de code agent(s)</th>
            <td class="actionBtn"><?php echo $mission[10] ?></td>
        </tr>
        <tr>
            <th>Nom de code contact(s)</th>
            <td class="actionBtn"><?php echo $mission[20] ?></td>
        </tr>
        <tr>
            <th>Nom de code cible(s)</th>
            <td class="actionBtn"><?php echo $mission[26] ?></td>
        </tr>
        <tr>
            <th>Nom de code planque</th>
            <td class="actionBtn"><?php echo $mission[33]; ?></td>
        </tr>
        <tr>
            <th>Type de mission</th>
            <td><?php echo $mission[5] ?></td>
        </tr>
        <tr>
            <th>Statut de la mission</th>
            <td><?php echo $mission[6] ?></td>
        </tr>
        <tr>
            <th>Spécialités</th>
            <td><?php echo $mission[7] ?></td>
        </tr>
        <tr>
            <th>Date de début</th>
            <td><?php echo $mission[8] ?></td>
        </tr>
        <tr>
            <th>Date de fin</th>
            <td><?php echo $mission[9] ?></td>
        </tr>
    </table>
<?php endforeach; ?>
<?php
$content = ob_get_clean();
$title = 'Détail des missions';
echo require_once 'Vues/layout.php';
?>
