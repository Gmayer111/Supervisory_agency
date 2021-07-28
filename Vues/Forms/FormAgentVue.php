<?php
session_start();
ob_start();

?>

<style><?php echo include_once 'Public/Css/form.css'?></style>
<style><?php echo include_once 'Public/Css/layout.css'?></style>
<div class="container">
    <div class="container">
        <form action="?action=Create" method="POST"> <!--enctype="multipart/form-data" uniquement pour l'upload de fichier-->
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
                    <div>
                        <p>Sélectionnez une première compétence :</p>
                    </div>
                    <div>
                        <input type="radio" id="opt1" name="competenceOne" value="opt1" checked>
                        <label for="opt1">Cyber renseignement</label>
                    </div>
                    <div>
                        <input type="radio" id="opt2" name="competenceOne" value="opt2" checked>
                        <label for="opt2">Décrypteur - décodeur</label>
                    </div>
                    <div>
                        <input type="radio" id="opt3" name="competenceOne" value="opt3" checked>
                        <label for="opt3">Traducteur de conversation</label>
                    </div>
                </div>
                <div>
                    <div>
                        <p>Sélectionnez une seconde compétence (optionnel) :</p>
                    </div>
                    <div>
                        <input type="radio" id="opt1" name="competenceTwo" value="opt1" checked>
                        <label for="opt1">Cyber renseignement</label>
                    </div>
                    <div>
                        <input type="radio" id="opt2" name="competenceTwo" value="opt2" checked>
                        <label for="opt2">Décrypteur - décodeur</label>
                    </div>
                    <div>
                        <input type="radio" id="opt3" name="competenceTwo" value="opt3" checked>
                        <label for="opt3">Traducteur de conversation</label>
                    </div>
                </div>
                <div>
                    <div>
                        <p>Sélectionnez une troisième compétence (optionnel) :</p>
                    </div>
                    <div>
                        <input type="radio" id="opt1" name="competenceTwo" value="opt1" checked>
                        <label for="opt1">Cyber renseignement</label>
                    </div>
                    <div>
                        <input type="radio" id="opt2" name="competenceTwo" value="opt2" checked>
                        <label for="opt2">Décrypteur - décodeur</label>
                    </div>
                    <div>
                        <input type="radio" id="opt3" name="competenceTwo" value="opt3" checked>
                        <label for="opt3">Traducteur de conversation</label>
                    </div>
                </div>
                <div>
                    <label for="dateOfBirth">Date de naissance</label>
                </div>
                <div>
                    <input type="date" id="dateOfBirth" name="startDate" placeholder="Entrez la date de naissance" required>
                </div>
                <div>
                    <label for="mission">Mission en cours</label>
                </div>
                <div>
                    <input type="date" id="mission" name="mission" placeholder="Entrez la mission en cours" required>
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
