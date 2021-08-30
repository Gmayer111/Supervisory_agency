<?php
session_start();
ob_start();
?>
<style><?php  include_once 'Public/Css/profil.css'?></style>
<style><?php  include_once 'Public/Css/layout.css'?></style>
<div class="container">
    <div>
        <img src="Public/images/profil.jpg" alt="Image du profil">
    </div>
    <div>
        <ul>
            <li><p>Prénom : Gaël</p></li>
            <li><p>Nom : MAYER</p></li>
            <li><p>Nationalité : française</p></li>
            <li><p>Nom de code : <?php echo $_SESSION['CodeName'] ?></p></li>
            <li><p>Mail : gael-mayer@asf.fr</p></li>
        </ul>
    </div>
</div>
<?php
$content = ob_get_clean();
$title = 'Votre profil';
require_once 'Vues/layout.php';
?>
