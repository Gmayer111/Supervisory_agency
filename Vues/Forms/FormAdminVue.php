<?php
session_start();
ob_start();
?>
<style><?php echo include_once 'Public/Css/formAdmin.css'?></style>
<style><?php echo include_once 'Public/Css/layout.css'?></style>
<form action="?action=CreateAdmin" method="POST"> <!--enctype="multipart/form-data" uniquement pour l'upload de fichier-->
    <div class="container">
        <div class="containerForm">
            <div>
                <label for="codeName">Nom de code (unique)</label>
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
                <label for="password">Mot de passe</label>
            </div>
            <div>
                <input type="password" name="password" placeholder="Entrez le mot de passe" required>
            </div>
        </div>
        <div class="containerForm">
            <div class="btn">
                <input type="submit" id="submit" name="submit" value="Créer">
            </div>
        </div>
    </div>
</form>
<?php
$content = ob_get_clean();
$title = 'Formulaire d\'action';
require_once 'Vues/layout.php';
?>
