<?php

use Managers\MissionManager;

session_start();
ob_start();

?>

<style><?php echo include_once 'Public/Css/formTarget.css'?></style>
<style><?php echo include_once 'Public/Css/layout.css'?></style>
<?php
$missionManager = new MissionManager();
$missions = $missionManager->getAll();
?>
<div>
    <h1>Création d'une planque</h1>
        <form action="?action=CreateSafeHouse" method="POST"> <!--enctype="multipart/form-data" uniquement pour l'upload de fichier-->
            <div class="container">
                <div>
                    <label for="code">Code de la planque</label>
                    <input type="text" id="code"  name="code" placeholder="Entrez le code de la planque">
                    <label for="address">Adresse de la planque</label>
                    <input type="text" id="address"  name="address" placeholder="Entrez l'adresse de la planque">
                    <label for="country">Pays de la planque</label>
                    <input type="text" id="country"  name="country" placeholder="Entrez le pays de la planque">
                    <label for="type">Type de planque</label>
                    <select name="type" id="type">
                        <option value="">Selectionnez le type de planque</option>
                        <option value="house">Maison</option>
                        <option value="apartment">Appartement</option>
                        <option value="factory">Usine</option>
                        <option value="cabin">Cabane en forêt</option>
                        <option value="hotel">Hôtel</option>
                    </select>
                </div>
                <div class="btn">
                    <input type="submit" id="next" name="next" value="Suivant">
                    <input type="submit" id="create" name="create" value="Créer une autre planque">
                </div>
            </div>
        </form>
</div>
<?php
$content = ob_get_clean();
$title = 'Formulaire d\'action';
echo require_once 'Vues/layout.php';
?>
