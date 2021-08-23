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
    <h1>Création d'un contact</h1>
    <div class="container">
        <form action="?action=CreateContact" method="POST"> <!--enctype="multipart/form-data" uniquement pour l'upload de fichier-->
            <div class="container1">
                <div>
                    <label for="codeName">Nom de code</label>
                </div>
                <div>
                    <input type="text" id="codeName"  name="codeName" placeholder="Entrez le nom de code" required>
                </div>
                <div>
                    <label for="firstName">Prénom</label>
                </div>
                <div>
                    <input type="text" name="firstName" placeholder="Entrez le prénom" required>
                </div>
                <div>
                    <label for="lastName">Nom</label>
                </div>
                <div>
                    <input type="text" name="lastName" placeholder="Entrez le nom" required>
                </div>
                <div>
                    <label for="nationality">Nationalité</label>
                </div>
                <div>
                    <input type="text" name="nationality" placeholder="Entrez la nationalité" required>
                </div>
                <div>
                    <label for="dateOfBirth">Date de naissance</label>
                </div>
                <div>
                    <input type="date" id="dateOfBirth" name="dateOfBirth" placeholder="Entrez la date de naissance" required>
                </div>
            </div>
            <div class="btn">
                <input type="submit" id="next" name="next" value="Suivant">
            </div>
            <div class="btn">
                <input type="submit" id="create" name="create" value="Créer un autre contact">
            </div>
        </form>
    </div>
</div>
<?php
$content = ob_get_clean();
$title = 'Formulaire d\'action';
echo require_once 'Vues/layout.php';
?>
