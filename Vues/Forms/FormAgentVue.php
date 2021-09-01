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
<div>
    <h1>Création d'un agent</h1>
    <div>
        <form action="?action=CreateAgent" method="POST"> <!--enctype="multipart/form-data" uniquement pour l'upload de fichier-->
            <div class="container agentInfo">
                    <label for="codeName">Nom de code</label>
                    <input type="text" id="codeName"  name="codeName" placeholder="Entrez le nom de code" required>
                    <label for="firstName">Prénom</label>
                    <input type="text" name="firstName" placeholder="Entrez le prénom" required>
                    <label for="lastName">Nom</label>
                    <input type="text" name="lastName" placeholder="Entrez le nom" required>
                    <label for="nationality">Nationalité</label>
                    <input type="text" name="nationality" placeholder="Entrez la nationalité" required>
                    <label for="dateOfBirth">Date de naissance</label>
                    <input type="date" id="dateOfBirth" name="dateOfBirth" placeholder="Entrez la date de naissance" required>
            </div>
            <div class="container">

                    <p>Sélectionnez une première compétence :</p>

                    <input type="radio" id="Cyber renseignement" name="competenceOne" value="Cyber renseignement" checked>
                    <label for="Cyber renseignement">Cyber renseignement</label>

                    <input type="radio" id="Décrypteur - décodeur" name="competenceOne" value="Décrypteur - décodeur" checked>
                    <label for="Décrypteur - décodeur">Décrypteur - décodeur</label>

                    <input type="radio" id="Traducteur de conversation" name="competenceOne" value="Traducteur de conversation" checked>
                    <label for="Traducteur de conversation">Traducteur de conversation</label>

                    <p>Sélectionnez une seconde compétence (optionnel) :</p>

                    <input type="radio" id="" name="competenceTwo" value="" checked>
                    <label for="">Aucune</label>

                    <input type="radio" id="Cyber renseignement" name="competenceTwo" value="Cyber renseignement" checked>
                    <label for="Cyber renseignement">Cyber renseignement</label>

                    <input type="radio" id="Décrypteur - décodeur" name="competenceTwo" value="Décrypteur - décodeur" checked>
                    <label for="Décrypteur - décodeur">Décrypteur - décodeur</label>

                    <input type="radio" id="Traducteur de conversation" name="competenceTwo" value="Traducteur de conversation" checked>
                    <label for="Traducteur de conversation">Traducteur de conversation</label>



                    <p>Sélectionnez une troisième compétence (optionnel) :</p>

                    <input type="radio" id="" name="competenceThree" value="" checked>
                    <label for="">Aucune</label>

                    <input type="radio" id="opt1" name="competenceThree" value="opt1" checked>
                    <label for="opt1">Cyber renseignement</label>

                    <input type="radio" id="Décrypteur - décodeur" name="competenceThree" value="Décrypteur - décodeur" checked>
                    <label for="Décrypteur - décodeur">Décrypteur - décodeur</label>

                    <input type="radio" id="Traducteur de conversation" name="competenceThree" value="Traducteur de conversation" checked>
                    <label for="Traducteur de conversation">Traducteur de conversation</label>

            </div>
            <div class="container btn">
                <div>
                    <input type="submit" id="next" name="next" value="Suivant">
                </div>
                <div>
                    <input type="submit" id="create" name="create" value="Créer un autre agent">
                </div>
            </div>
        </form>
    </div>
</div>
<?php
$content = ob_get_clean();
$title = 'Formulaire d\'action';
require_once 'Vues/layout.php';
?>