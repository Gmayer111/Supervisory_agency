<?php

use Managers\AgentManager;
use Managers\TargetManager;

session_start();
ob_start();
$manager = new TargetManager();
$targets = $manager->getAll();
$manager = new AgentManager();
$agent = $manager->getData();
?>
<style><?php echo include_once 'Public/Css/formTarget.css'?></style>
<style><?php echo include_once 'Public/Css/layout.css'?></style>
<div>
    <h1>Création d'une cible</h1>
    <form action="?action=CreateTarget" method="POST" id="checkNationality" onsubmit="return checkValueTarget()"> <!--enctype="multipart/form-data" uniquement pour l'upload de fichier-->
        <div class="container">
            <div class="containerForm">
                <div>
                    <label for="codeName">Nom de code</label>
                </div>
                <div>
                    <input type="text" id="codeName"  name="codeName" placeholder="Entrez le nom de code" value="<?php if (isset($_POST['codeName'])) {echo $_POST['codeName'];} ?>" required>
                </div>
                <div>
                    <label for="firstName">Prénom</label>
                </div>
                <div>
                    <input type="text" id="firstName" name="firstName" placeholder="Entrez le prénom" value="<?php if (isset($_POST['firstName'])) {echo $_POST['firstName'];} ?>"  required>
                </div>
                <div>
                    <label for="lastName">Nom</label>
                </div>
                <div>
                    <input type="text" id="lastName" name="lastName" placeholder="Entrez le nom" value="<?php if (isset($_POST['lastName'])) {echo $_POST['lastName'];} ?>"  required>
                </div>
            </div>
            <div class="containerForm">
                <div>
                    <label for="nationality">Nationalité</label>
                </div>
                <div>
                    <input type="text" id="nationality" name="nationality" placeholder="Entrez la nationalité" required value="">
                    <p class="nationality">(Attention la nationalité doit être<br> différente de l'agent sur la mission en cours)</p>
                    <p class="nationalityA" id="AgentValue">Nationalité de l'agent : <?php echo $agent[3]; ?></p>
                    <div id="result"></div>
                </div>
                <div>
                    <label for="Localisation">Localisation</label>
                </div>
                <div>
                    <input type="text" id="Localisation" name="Localisation" placeholder="Entrez la localisation de la cible" value="<?php if (isset($_POST['Localisation'])) {echo $_POST['Localisation'];} ?>"  required>
                </div>
                <div>
                    <label for="dateOfBirth">Date de naissance</label>
                </div>
                <div>
                    <input type="date" id="dateOfBirth" name="dateOfBirth" value="<?php if (isset($_POST['dateOfBirth'])) {echo $_POST['dateOfBirth'];} ?>"  required>
                </div>
                <div class="containerBtn">
                    <div class="btn">
                        <input type="submit" id="next" name="next" value="Suivant">
                        <input type="submit" id="create" name="create" value="Créer une autre cible">
                    </div>
                </div>
            </div>


            <div class="codeList">
                <div>
                    <ul>
                        <li>
                            <input type="checkbox" id="list-item-1">
                            <p>Nom de code des agents en cours</p>
                            <label for="list-item-1" class="first">
                                <div class="icon">
                                    <i class="fas fa-minus-square"></i>
                                </div>
                            </label>
                            <ul>
                                <?php foreach ($targets as $target): ?>
                                    <li><?php echo $target->getCodeName(); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="Public/Javascript/checkValue.js"></script>
<?php
$content = ob_get_clean();
$title = 'Formulaire d\'action';
require_once 'Vues/layout.php';
?>
