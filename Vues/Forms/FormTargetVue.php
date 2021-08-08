<?php
session_start();
ob_start();

?>

<style><?php echo include_once 'Public/Css/form.css'?></style>
<style><?php echo include_once 'Public/Css/layout.css'?></style>
<div class="container">
    <div class="container">
        <form action="?action=CreateTarget" method="POST"> <!--enctype="multipart/form-data" uniquement pour l'upload de fichier-->
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
                <div>
                    <label for="Localisation">Localisation</label>
                </div>
                <div>
                    <input type="text" id="Localisation" name="Localisation" placeholder="Entrez la localisation de la cible" required>
                </div>
            </div>
            <div class="btn">
                <input type="submit" id="submit" name="submit" value="Créer">
            </div>
        </form>
    </div>
</div>
<?php
$content = ob_get_clean();
$title = 'Formulaire d\'action';
echo require_once 'Vues/layout.php';
?>
