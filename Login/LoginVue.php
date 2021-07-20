<?php
ob_start();

?>

    <style><?php echo include_once 'Public/Css/login.css'?></style>
    <style><?php echo include_once 'Public/Css/layout.css'?></style>
    <style><?php echo include_once 'Public/Javascript/layout.js'?></style>
    <div class="container-connexion">
        <form action="./LoginControl.php" method="POST"> <!--enctype="multipart/form-data" uniquement pour l'upload de fichier-->
            <h1>Page de connexion</h1>
            <div>
                <label for="CodeName">Nom de code</label>
            </div>
            <input type="text" name="CodeName" placeholder="Entrez votre nom de code" required>
            <div>
                <label for="password">Mot de passe</label>
            </div>
            <input type="password" name="password" placeholder="Entrez votre mot de passe" required  maxlength="20"><!--pattern="[A-z\d!-$]"-->
            <div class="btn">
                <input type="submit" id="submit" name="submit" value="Connexion">
            </div>
        </form>
    </div>

<?php
$content = ob_get_clean();
$title = 'Authentification';
echo require_once 'Vues/layout.php';
?>