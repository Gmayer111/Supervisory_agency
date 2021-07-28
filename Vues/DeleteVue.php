<?php
session_start();
ob_start();

?>

<div class="container">
    <div>
        <form action="?action=Create" method="POST">
            //Suppresion Agent
            <?php

            $manager = new AgentManager();
            $agents = $manager->delete();
            foreach ($agents as $agent): ?>

            <?php endforeach; ?>
        </form>
    </div>

    <div>
        <form action="?action=Create" method="POST">
            //Suppresion Mission
            <?php

            $manager = new MissionManager();
            $missions = $manager->delete();
            foreach ($missions as $mission): ?>

            <?php endforeach; ?>
        </form>
    </div>

    <div>
        <form action="?action=Create" method="POST">
            //Suppresion Contact
            <?php

            $manager = new MissionManager();
            $contacts = $manager->delete();
            foreach ($contacts as $contact): ?>

            <?php endforeach; ?>
        </form>
    </div>

    <div>
        <form action="?action=Create" method="POST">
            //Suppresion Cible
            <?php

            $manager = new TargetManager();
            $targets = $manager->delete();
            foreach ($targets as $target): ?>

            <?php endforeach; ?>
        </form>
    </div>

    <div>
        <form action="?action=Create" method="POST">
            //Suppresion Planque
            <?php

            $manager = new SafeHouseManager();
            $safeHouses = $manager->delete();
            foreach ($safeHouses as $safeHouse): ?>

            <?php endforeach; ?>
        </form>
    </div>
</div>


<?php
$content = ob_get_clean();
$title = 'Formulaire de suppression';
echo require_once 'Vues/layout.php';
?>
