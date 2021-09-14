<?php

use Managers\ContactManager;
use Managers\MissionManager;

session_start();
ob_start();

?>

<style><?php echo include_once 'Public/Css/formContact.css'?></style>
<style><?php echo include_once 'Public/Css/layout.css'?></style>
<?php
$managerM = new MissionManager();
$missions = $managerM->getData();
$manager = new ContactManager();
$contacts = $manager->getAll();
?>
<div>
    <h1>Création d'un contact</h1>
    <form action="?action=CreateContact" method="POST" onsubmit="return checkValueContact()"> <!--enctype="multipart/form-data" uniquement pour l'upload de fichier-->
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
                   <input type="text" name="firstName" placeholder="Entrez le prénom" value="<?php if (isset($_POST['firstName'])) {echo $_POST['firstName'];} ?>" required>
                </div>
                <div>
                   <label for="lastName">Nom</label>
                </div>
                <div>
                   <input type="text" name="lastName" placeholder="Entrez le nom" value="<?php if (isset($_POST['lastName'])) {echo $_POST['lastName'];} ?>" required>
                </div>
            </div>
            <div class="containerForm">
                <div>
                   <label for="nationality">Nationalité</label>
                </div>
                <div>
                    <input type="text" name="nationality" id="nationality" placeholder="Entrez la nationalité"required value="">
                    <p class="nationality">(Attention la nationalité doit être similaire au pays de la mission en cours)</p>
                    <p class="nationalityA" id="MissionValue">Pays de la mission : <?php echo $missions[4]; ?></p>
                </div>
                <div>
                  <label for="dateOfBirth">Date de naissance</label>
                </div>
                <div>
                  <input type="date" id="dateOfBirth" name="dateOfBirth" placeholder="Entrez la date de naissance" value="<?php if (isset($_POST['dateOfBirth'])) {echo $_POST['dateOfBirth'];} ?>" required>
                </div>
                <div class="containerBtn">
                    <div class="btn">
                        <input type="submit" id="next" name="next" value="Suivant">
                        <input type="submit" id="create" name="create" value="Créer un autre contact">
                    </div>
                </div>
            </div>
            <div class="codeList">
                <div>
                    <ul>
                        <li>
                            <input type="checkbox" id="list-item-1">
                            <p>Nom de code des contacts en cours</p>
                            <label for="list-item-1" class="first">
                                <div class="icon">
                                    <i class="fas fa-minus-square"></i>
                                </div>
                            </label>
                            <ul>
                                <?php foreach ($contacts as $contact): ?>
                                    <li><?php echo $contact->getCodeName(); ?></li>
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
