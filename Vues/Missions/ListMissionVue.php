<?php

use Managers\MissionManager;

session_start();
ob_start();

?>
<div>
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
                <th>METTRE A JOUR</th>
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
                <td><?php echo substr($mission->getStartDate(), 0, -9); ?></td>
                <td><?php echo substr($mission->getEndDate(), 0, -9); ?></td>
                <td>
                <?php if ($mission->getState() === 'En préparation'): ?>
                <div class="ledExt">
                    <div class="led ledP"></div>
                </div>
                <?php elseif ($mission->getState() === 'En cours'): ?>
                    <div class="ledExt">
                        <div class="led ledO"></div>
                    </div>
                <?php elseif ($mission->getState() === 'Terminé'): ?>
                    <div class="ledExt">
                        <div class="led ledF"></div>
                    </div>
                <?php elseif ($mission->getState() === 'Echec'): ?>
                    <div class="ledExt">
                        <div class="led ledD"></div>
                    </div>
                <?php endif; ?>
                </td>
                <td>
                    <form action="?action=UpdateMission" method="post">
                        <label for="uM"></label>
                        <select name="uM" id="uM">
                            <option value="">Mettre à jour la mission</option>
                            <option value="inProgress">En préparation</option>
                            <option value="onGoing">En cours</option>
                            <option value="finish">Terminé</option>
                            <option value="fail">Echec</option>
                        </select>
                        <div>
                            <input type="submit" id="submit" name="submit" value="Confirmer">
                        </div>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="bledI">
    <div class="ledI">
        <div>
            <div class="ledExt">
                <div class="led ledP"></div>
            </div>
            <p>En progression</p>
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

<?php
$content = ob_get_clean();
$title = 'Liste des missions';
echo require_once 'Vues/layout.php';
?>