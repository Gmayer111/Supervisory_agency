<?php
session_start();
ob_start();
?>
<style><?php echo include_once 'Public/Css/formAdmin.css'?></style>
<style><?php echo include_once 'Public/Css/layout.css'?></style>
<div>
    <h1>Création d'un administrateur</h1>
    <form method="POST" id="formCom"> <!--enctype="multipart/form-data" uniquement pour l'upload de fichier-->
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
                    <input type="text" id="firstName" name="firstName" placeholder="Entrez le prénom" required>
                </div>
                <div>
                    <label for="lastName">Nom</label>
                </div>
                <div>
                    <input type="text" id="lastName" name="lastName" placeholder="Entrez le nom" required>
                </div>
                <div>
                    <label for="email">Email</label>
                </div>
                <div>
                    <input type="email" id="email" name="email" placeholder="Entrez l'email" required>
                </div>
                <div>
                    <label for="password">Mot de passe</label>
                </div>
                <div>
                    <input type="password" id="password" name="password" placeholder="Entrez le mot de passe" required>
                </div>
            </div>
            <div class="btn">
                <span id="resultAjax">Agent créé</span>
                <input type="submit" id="submit" name="submit" value="Créer">
            </div>
        </div>
        <script src="Public/Javascript/jQuery.js"></script>
        <script src="Public/Javascript/checkAjax.js"></script>
    </form>
</div>

<?php
$content = ob_get_clean();
$title = 'Formulaire d\'action';
require_once 'Vues/layout.php';
?>
