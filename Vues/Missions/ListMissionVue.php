<?php

use Managers\MissionManager;

session_start();
ob_start();

?>
    <style><?php echo include_once 'Public/Css/mission.css'?></style>
    <style><?php echo include_once 'Public/Css/layout.css'?></style>


    <table>
        <thead>
            <tr>
                <th>TITRE</th>
                <th>CODE</th>
                <th>PAYS</th>
                <th>DEBUT</th>
                <th>FIN</th>
                <th>ETAT</th>
            </tr>
        </thead>
        <tbody>
            <tr>
    <?php

    $manager = new MissionManager();
    $missions = $manager->getAll();

    foreach ($missions as $mission): ?>

                <td><?php echo $mission->getTitle(); ?></td>
                <td><?php echo $mission->getCodeName(); ?></td>
                <td><?php echo $mission->getCountry(); ?></td>
                <td><?php echo $mission->getStartDate(); ?></td>
                <td><?php echo $mission->getEndDate(); ?></td>
                <td><?php echo $mission->getState(); ?></td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>


</div>

<?php
$content = ob_get_clean();
$title = 'Liste des missions';
echo require_once 'Vues/layout.php';
?>