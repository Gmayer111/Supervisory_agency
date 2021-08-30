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
    <h1>Création d'une cible</h1>
    <form action="?action=CreateTarget" method="POST"> <!--enctype="multipart/form-data" uniquement pour l'upload de fichier-->
        <div class="container">
            <div>
                <label for="codeName">Nom de code</label>
                <input type="text" id="codeName"  name="codeName" placeholder="Entrez le nom de code" required>
                <label for="firstName">Prénom</label>
                <input type="text" id="firstName" name="firstName" placeholder="Entrez le prénom" required>
                <label for="lastName">Nom</label>
                <input type="text" id="lastName" name="lastName" placeholder="Entrez le nom" required>
                <label for="nationality">Nationalité</label>
                <input type="text" id="nationality" name="nationality" placeholder="Entrez la nationalité" required>
                <label for="Localisation">Localisation</label>
                <input type="text" id="Localisation" name="Localisation" placeholder="Entrez la localisation de la cible" required>
                <label for="dateOfBirth">Date de naissance</label>
                <input type="date" id="dateOfBirth" name="dateOfBirth" required>
            </div>
            <div class="btn">
                <input type="submit" id="next" name="next" value="Suivant">
                <input type="submit" id="create" name="create" value="Créer une autre cible">
            </div>
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
$title = 'Formulaire d\'action';
require_once 'Vues/layout.php';
?>
