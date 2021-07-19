<?php
ob_start()
?>

<style><?php echo include_once 'Public/Css/profil.css'?></style>
<style><?php echo include_once 'Public/Css/layout.css'?></style>
<div class="container">
    <div>
        <img src="Public/images/profil.jpg" alt="Image du profil">
    </div>
    <div>
        <ul>
            <li><p>Prénom : Gaël</p></li>
            <li><p>Nom : MAYER</p></li>
            <li><p>Nationalité : française</p></li>
            <li><p>Nom de code : HUNT</p></li>
            <li><p>Mail : gael-mayer@asf.fr</p></li>
        </ul>
    </div>
    <div>
        <form action="?action=Form" method="POST">
            <label for="action-selector">Action :</label>
            <select name="action-selector" id="action-selector">
                <option value="">Selectionnez votre action</option>
                <option value="rep1">Créer un agent</option>
                <option value="rep2">Créer une mission</option>
                <option value="rep3">Créer un contact</option>
                <option value="rep4">Créer une cible</option>
                <option value="rep5">Créer une planque</option>
            </select>
            <div>
                <input type="submit" value="" id="submit" name="submit">
            </div>
        </form>
    </div>
</div>
<?php
$content = ob_get_clean();
$title = 'Votre profil';
echo require_once 'Vues/layout.php';
?>