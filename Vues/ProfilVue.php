<?php

session_start();
ob_start();

$user = $_SESSION['User'];

if (isset($_SESSION['User'])):
    ?>
    <style><?php  include_once 'Public/Css/profil.css'?></style>
    <style><?php  include_once 'Public/Css/layout.css'?></style>
    <div>
        <h1>Profil</h1>
    </div>
    <div class="container">

        <div class="imgCreate">
            <div>
                <img src="Public/images/profil-2.jpg" alt="Image du profil" class="profilImg">
            </div>
            <div>
                <a href="?action=AdminForm" class=""><button id="btn-login" class="createA">Créer un administrateur</button></a>
            </div>
        </div>

        <div class="formContent">
            <div class="profilInfo">
                <span id="resultAjax"></span>
                <ul>
                    <li class="liDownSpan"><p>Prénom : <?php echo $_SESSION['User']->getFirstname() ?>  <button type="button" id="upInfoF"><i type="button" class="fas fa-pen-square"></i></button></p></li>
                    <form id="formValueF" method="POST">
                        <label for="firstName"></label>
                        <input type="text" name="firstName" id="firstName" placeholder="Modifier le prénom">
                        <input type="submit" id="submit" value="soumettre">
                    </form>

                    <li><p>Nom : <?php echo $user->getLastname() ?>  <button type="button" id="upInfoL"><i type="button" class="fas fa-pen-square"></i></button></p></li>
                    <form id="formValueL" method="post">
                        <label for="lastName"></label>
                        <input type="text" name="lastname" id="lastName" placeholder="Modifier le nom">
                        <input type="submit" id="submitL" value="soumettre">
                    </form>
                    <li><p>Email : <?php echo $user->getEmail() ?>  <button type="button" id="upInfoE"><i type="button" class="fas fa-pen-square"></i></button></p></li>
                    <form id="formValueE" method="post">
                        <label for="email"></label>
                        <input type="text" name="email" id="email" placeholder="Modifier l'email">
                        <input type="submit" id="submitE" value="soumettre">
                    </form>
                    <li><p id="currentCode">Nom de code : <?php echo $user->getCodeName() ?></p></li>
                </ul>
            </div>

        </div>
        <script src="Public/Javascript/jQuery.js"></script>
        <script src="Public/Javascript/updateValue.js"></script>
    </div>
<?php
endif;
$content = ob_get_clean();
$title = 'Votre profil';
require_once 'Vues/layout.php';
?>

