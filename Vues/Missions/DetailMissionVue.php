<?php
use Managers\MissionManager;

session_start();
ob_start();

?>
<style><?php echo include_once 'Public/Css/mission.css'?></style>
<style><?php echo include_once 'Public/Css/layout.css'?></style>
<?php

$manager = new MissionManager();
$missions = $manager->getAll();

foreach ($missions as $mission): ?>

    <table>
        <tr>
            <th>Titre</th>
            <td><?php echo $mission->getTitle() ?></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><?php echo $mission->getDescription() ?></td>
        </tr>
        <tr>
            <th>Nom de code</th>
            <td><?php echo $mission->getCodeName() ?></td>
        </tr>
        <tr>
            <th>Pays</th>
            <td><?php echo $mission->getCountry() ?></td>
        </tr>
        <tr>
            <th>Agent(s)</th>
            <td><?php echo $mission->getAgent() ?></td>
        </tr>
        <tr>
            <th>ContactsModel(s)</th>
            <td><?php echo $mission->getContact() ?></td>
        </tr>
        <tr>
            <th>Cibles(s)</th>
            <td><?php echo $mission->getTarget() ?></td>
        </tr>
        <tr>
            <th>Type de mission</th>
            <td><?php echo $mission->getType() ?></td>
        </tr>
        <tr>
            <th>Statut de la mission</th>
            <td><?php echo $mission->getState() ?></td>
        </tr>
        <tr>
            <th>Planque</th>
            <td><?php echo $mission->getSafeHouse() ?></td>
        </tr>
        <tr>
            <th>Spécialités</th>
            <td><?php echo $mission->getCompetence() ?></td>
        </tr>
        <tr>
            <th>Date de début</th>
            <td><?php echo $mission->getStartDate() ?></td>
        </tr>
        <tr>
            <th>Date de fin</th>
            <td><?php echo $mission->getEndDate() ?></td>
        </tr>
    </table>

<?php endforeach; ?>


<?php

$content = ob_get_clean();
$title = 'Détail des missions';
echo require_once 'Vues/layout.php';
?>
