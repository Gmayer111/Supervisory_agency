<?php
session_start();
ob_start();

if (isset($_SESSION['CodeName'])):
?>
<style><?php  include_once 'Public/Css/profil.css'?></style>
<style><?php  include_once 'Public/Css/layout.css'?></style>
    <h1>Profil</h1>
<div class="container">

    <div>
        <img src="Public/images/profil-2.jpg" alt="Image du profil" class="profilImg">
    </div>
    <div class="profilInfo">
        <ul>
            <li><p>Prénom : Gaël</p></li>
            <li><p>Nom : MAYER</p></li>
            <li><p>Nationalité : française</p></li>
            <li><p>Nom de code : <?php echo $_SESSION['CodeName'] ?></p></li>
            <li><p>Mail : gael-mayer@asf.fr</p></li>
        </ul>
    </div>
    <div class="adminCreateCont">
        <a href="?action=AdminForm" class=""><button id="btn-login" class="createA">Créer un administrateur</button></a>
    </div>
</div>
<?php
endif;
$content = ob_get_clean();
$title = 'Votre profil';
require_once 'Vues/layout.php';
?>
