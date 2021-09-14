
<?php
use Managers\MissionManager;
session_start();
ob_start();
?>
<style><?php echo include_once 'Public/Css/listMission.css' ?></style>
<style><?php echo include_once 'Public/Css/layout.css'?></style>
<h1>Détails de la mission</h1>
<h2>Nom de code mission </h2>
<div class="container">

    <div class="containerForm">
        <table>
            <thead>
            <tr>
                <th class="titleTh">TITRE</th>
                <th>CODE</th>
                <th>PAYS</th>
                <th>DEBUT</th>
                <th>FIN</th>
                <th class="stateTh">ETAT</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php

                $manager = new MissionManager();
                $missions = $manager->getAll();

                foreach ($missions as $mission): ?>

                <td class="missionTTd"><?php echo $mission->getTitle(); ?></td>
                <td><?php echo $mission->getCodeName(); ?></td>
                <td><?php echo $mission->getCountry(); ?></td>
                <td><?php echo substr($mission->getStartDate(), 0, -9); ?></td>
                <td><?php echo substr($mission->getEndDate(), 0, -9); ?></td>
                <td class="ledTd">
                    <?php if ($mission->getState() === 'En préparation'): ?>
                        <div class="ledDivTable">
                            <div class="led ledP"></div>
                        </div>
                    <?php elseif ($mission->getState() === 'En cours'): ?>
                        <div class="ledDivTable">
                            <div class="led ledO"></div>
                        </div>
                    <?php elseif ($mission->getState() === 'Terminée'): ?>
                        <div class="ledDivTable">
                            <div class="led ledF"></div>
                        </div>
                    <?php elseif ($mission->getState() === 'Echec'): ?>
                        <div class="ledDivTable">
                            <div class="led ledD"></div>
                        </div>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="ledContainer">
        <div class="ledSubContain">
            <div>
                <div class="ledExt">
                    <div class="led ledP ledM"></div>
                </div>
                <p>En préparation</p>
            </div>

            <div>
                <div class="ledExt">
                    <div class="led ledO"></div>
                </div>
                <p>En cours</p>
            </div>
            <div>
                <div class="ledExt">
                    <div class="led ledF"></div>
                </div>
                <p>Terminé</p>
            </div>
            <div>
                <div class="ledExt">
                    <div class="led ledD"></div>
                </div>
                <p>Echec</p>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
$title = 'Liste des missions';
 require_once 'Vues/layout.php';
?>
