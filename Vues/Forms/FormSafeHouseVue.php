<?php

use Managers\MissionManager;

session_start();
ob_start();

?>

<style><?php echo include_once 'Public/Css/form.css'?></style>
<style><?php echo include_once 'Public/Css/layout.css'?></style>
<?php
$missionManager = new MissionManager();
$missions = $missionManager->getAll();
?>
<div class="container">
    <h1>Création d'une planque</h1>
    <div class="container">
        <form action="?action=CreateSafeHouse" method="POST"> <!--enctype="multipart/form-data" uniquement pour l'upload de fichier-->
            <div class="container1">
                <div>
                    <label for="code">Code de la planque</label>
                </div>
                <div>
                    <input type="text" id="code"  name="code" placeholder="Entrez le code de la planque">
                </div>
                <div>
                    <label for="address">Adresse de la planque</label>
                </div>
                <div>
                    <input type="text" id="address"  name="address" placeholder="Entrez l'adresse de la planque">
                </div>
                <div>
                    <label for="country">Pays de la planque</label>
                </div>
                <div>
                    <input type="text" id="country"  name="country" placeholder="Entrez le pays de la planque">
                </div>
                <div>
                    <label for="type">Type de planque</label>
                </div>
                <div>
                    <select name="type" id="state">
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
                </div>
                <div class="btn">
                    <input type="submit" id="create" name="create" value="Créer une autre planque">
                </div>
        </form>
    </div>
</div>
<?php
$content = ob_get_clean();
$title = 'Formulaire d\'action';
echo require_once 'Vues/layout.php';
?>
