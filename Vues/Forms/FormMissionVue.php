<?php

use Managers\MissionManager;

session_start();
ob_start();
?>
<style><?php echo include_once 'Public/Css/formMission.css'?></style>
<style><?php echo include_once 'Public/Css/layout.css'?></style>
<?php
$manager = new MissionManager();
$missions = $manager->getAll();?>
<div>
    <h1>Création d'une mission</h1>
    <div>
        <form action="?action=CreateMission" method="POST"> <!--enctype="multipart/form-data" uniquement pour l'upload de fichier-->
            <div class="container blockOne">
                <div>
                    <label for="codeName">Nom de code</label>
                </div>

                <div>
                    <input type="text" id="codeName"  name="codeName" placeholder="Entrez le nom de code" required>
                </div>

                <div>
                    <label for="title">Titre</label>
                </div>

                <div>
                    <input type="text" name="title" placeholder="Entrez le titre" required>
                </div>
                <div>
                    <label for="description">Description</label>
                </div>

                <div>
                <textarea
                    name="description"
                    placeholder="Entrez le description"
                    rows="5" cols="33"
                    required>
                </textarea>
                </div>

                <div>
                    <label for="country">Pays</label>
                </div>
                <div>
                    <input type="text" id="country"  name="country" placeholder="Entrez le pays" required>
                </div>
            </div>

            <div class="container blockTwo">
                <div>
                    <label for="type">Type de mission</label>
                    <select name="type" id="type">
                        <option value="">Sélectionnez votre action</option>
                        <option value="Surveillance">Surveillance</option>
                        <option value="Infiltration">Infiltration</option>
                        <option value="Reconnaissance">Reconnaissance</option>
                    </select>
                </div>
<!--                <div>
                    <label for="state">Etat de la mission</label>
                    <select name="state" id="state">
                        <option value="">Sélectionnez votre action</option>
                        <option value="En préparation">En préparation</option>
                        <option value="En cours">En cours</option>
                        <option value="Terminée">Terminée</option>
                        <option value="Echec">Echec</option>
                    </select>
                </div>-->
                <div>
                    <label for="competence">Compétences requises</label>
                    <input type="text" id="competence" name="competence" placeholder="Entrez le nom de la planque" required>
                </div>
                <div>
                    <label for="startDate">Début de la mission</label>
                    <input type="date" id="startDate" name="startDate" placeholder="Entrez la date de début de mission" required>
                </div>
                <div>
                    <label for="endDate">Fin de la mission</label>
                    <input type="date" id="endDate" name="endDate" placeholder="Entrez la date de fin de mission" required>
                </div>

                <div class="btn">
                    <input type="submit" id="submit" name="submit" value="Suivant">
                </div>
            </div>

            <div class="container">
                <table>
                    <thead>
                        <tr>
                            <th>Nom de code des missions en cours</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($missions as $mission): ?>
                        <tr>
                            <td><?php echo $mission->getCodeName(); ?></td>
                        </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>
<?php
$content = ob_get_clean();
$title = 'Formulaire d\'action';
require_once 'Vues/layout.php';
?>
