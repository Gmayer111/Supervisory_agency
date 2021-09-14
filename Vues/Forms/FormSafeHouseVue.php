<?php


use Managers\MissionManager;
use Managers\SafeHouseManager;

session_start();
ob_start();

?>

<style><?php  include_once 'Public/Css/formSh.css'?></style>
<style><?php  include_once 'Public/Css/layout.css'?></style>
<?php
$missionManager = new MissionManager();
$missions = $missionManager->getData();
$shManager = new SafeHouseManager();
$shs = $shManager->getAll();
?>
<div>
    <h1>Création d'une planque</h1>
    <form action="?action=CreateSafeHouse" method="POST" onsubmit="return checkValueSh()"> <!--enctype="multipart/form-data" uniquement pour l'upload de fichier-->
        <div class="container">
            <div class="containerForm">
                <div>
                    <label for="code">Code de la planque</label>
                </div>
                <div>
                    <input type="text" id="code"  name="code" placeholder="Entrez le code de la planque" value="<?php if (isset($_POST['code'])) {echo $_POST['code'];} ?>">
                </div>
                <div>
                    <label for="address">Adresse de la planque</label>
                </div>
                <div>
                    <input type="text" id="address"  name="address" placeholder="Entrez l'adresse de la planque" value="<?php if (isset($_POST['address'])) {echo $_POST['address'];} ?>">
                </div>
                <div>
                    <label for="country">Pays de la planque</label>
                </div>
                <div>
                    <input type="text" id="country"  name="country" placeholder="Entrez le pays de la planque" value="">
                    <p class="country">(Attention le pays doit être similaire au pays de la mission en cours)</p>
                    <p class="countryS" id="MissionValue">Pays de la mission : <?php echo $missions[4]; ?></p>
                </div>
                <div>
                    <label for="type">Type de planque</label>
                </div>
                <div>
                    <select name="type" id="type">
                        <option value="">Selectionnez le type de planque</option>
                        <option value="house">Maison</option>
                        <option value="apartment">Appartement</option>
                        <option value="factory">Usine</option>
                        <option value="cabin">Cabane en forêt</option>
                        <option value="hotel">Hôtel</option>
                    </select>
                </div>
            </div>
            <div class="btn">
                <input class="inputBtn" type="submit" id="next" name="next" value="Suivant">
                <input class="inputBtn" type="submit" id="create" name="create" value="Créer une autre planque">
            </div>
            <div class="codeList">
                <div>
                    <ul>
                        <li>
                            <input type="checkbox" id="list-item-1">
                            <p>Nom de code des planques en cours</p>
                            <label for="list-item-1" class="first">
                                <div class="icon">
                                    <i class="fas fa-minus-square"></i>
                                </div>
                            </label>
                            <ul>
                                <?php foreach ($shs as $sh): ?>
                                    <li><?php echo $sh->getCode(); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <script src="Public/Javascript/checkValue.js"></script>
    </form>
</div>
<?php
$content = ob_get_clean();
$title = 'Formulaire d\'action';
require_once 'Vues/layout.php';
?>
