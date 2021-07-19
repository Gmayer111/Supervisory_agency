<?php

ob_start()

?>
<style><?php echo include_once 'Public/Css/mission.css'?></style>
<style><?php echo include_once 'Public/Css/layout.css'?></style>
<table>
    <tr>
        <th>Titre</th>
        <td></td>
    </tr>
    <tr>
        <th>Description</th>
        <td></td>
    </tr>
    <tr>
        <th>Nom de code</th>
        <td></td>
    </tr>
    <tr>
        <th>Pays</th>
        <td>AAAAAAAAAAAAAAAAAAAAAASQDFVSDG SBSDFV S DFBSGBS GFBS SIFHGVQJFNQLKUERJFHQL JKSDHQBL SJDHBLQS DHJKGVQBHJSDGVCQBKSYHD </td>
    </tr>
    <tr>
        <th>Agent(s)</th>
        <td>STGHSRTHZRTHRTH</td>
    </tr>
    <tr>
        <th>ContactsModel(s)</th>
        <td></td>
    </tr>
    <tr>
        <th>Cibles(s)</th>
        <td></td>
    </tr>
    <tr>
        <th>Type de mission</th>
        <td></td>
    </tr>
    <tr>
        <th>Statut de la mission</th>
        <td></td>
    </tr>
    <tr>
        <th>Planque</th>
        <td></td>
    </tr>
    <tr>
        <th>Spécialités</th>
        <td></td>
    </tr>
    <tr>
        <th>Date de début</th>
        <td></td>
    </tr>
    <tr>
        <th>Date de fin</th>
        <td></td>
    </tr>
</table>
<?php

$content = ob_get_clean();
$title = 'Détail des missions';
echo require_once 'Vues/layout.php';
?>
