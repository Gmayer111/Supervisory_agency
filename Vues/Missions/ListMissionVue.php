<?php

ob_start()
?>
<style><?php echo include_once 'Public/Css/mission.css'?></style>
<div class="container">
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
            <th>TITRE</th>
            <th>CODE</th>
            <th>PAYS</th>
            <th>DEBUT</th>
            <th>FIN</th>
            <th>ETAT</th>
        </tr>
        </tbody>
    </table>
</div>'

<?php
$content = ob_get_clean();
$title = 'Détail des mission';
echo require_once 'Vues/layout.php';
?>