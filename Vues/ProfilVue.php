<?php
session_start();
ob_start();
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
            <li><p>Nom de code : <?php echo $_SESSION['CodeName'] ?></p></li>
            <li><p>Mail : gael-mayer@asf.fr</p></li>
        </ul>
    </div>
    <div>
        <form action="?action=Form" method="get">
            <label for="creation-selector">Création :</label>
            <select name="creation-selector" id="creation-selector">
                <option value="">Selectionnez votre action</option>
                <option value="rep1" name="rep1">Créer un agent</option>
                <option value="rep2" name="rep2">Créer une mission</option>
                <option value="rep3">Créer un contact</option>
                <option value="rep4">Créer une cible</option>
                <option value="rep5">Créer une planque</option>
                <option value="rep6">Créer un administrateur</option>
            </select>
            <div class="btn">
                <input type="submit" id="submit" name="create" value="Afficher">
            </div>
        </form>

        <form action="?action=Form" method="POST">
            <label for="delete-selector">Suppression:</label>
            <select name="delete-selector" id="delete-selector">
                <option value="">Selectionnez votre action</option>
                <option value="rep1">Supprimer un agent</option>
                <option value="rep2">Supprimer une mission</option>
                <option value="rep3">Supprimer un contact</option>
                <option value="rep4">Supprimer une cible</option>
                <option value="rep5">Supprimer une planque</option>
                <option value="rep6">Supprimer un administrateur</option>
            </select>
            <div class="btn">
                <input type="submit" id="delete" name="delete" value="Afficher">
            </div>
        </form>

        <form action="?action=Form" method="POST">
            <label for="update-selector">Misa à jour :</label>
            <select name="update-selector" id="update-selector">
                <option value="">Selectionnez votre action</option>
                <option value="rep1">Mettre à jour un agent</option>
                <option value="rep2">Mettre à jour une mission</option>
                <option value="rep3">Mettre à jour un contact</option>
                <option value="rep4">Mettre à jour une cible</option>
                <option value="rep5">Mettre à jour une planque</option>
                <option value="rep6">Mettre à jour un administrateur</option>
            </select>
            <div class="btn">
                <input type="submit" id="update" name="update" value="Afficher">
            </div>
        </form>
    </div>
</div>
<?php
$content = ob_get_clean();
$title = 'Votre profil';
echo require_once 'Vues/layout.php';
?>
