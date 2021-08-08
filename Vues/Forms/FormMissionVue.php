<?php

session_start();
ob_start();

use Managers\AgentManager;
use Managers\ContactManager;
use Managers\SafeHouseManager;
use Managers\TargetManager;

?>
<style><?php echo include_once 'Public/Css/form.css'?></style>
<style><?php echo include_once 'Public/Css/layout.css'?></style>
<div class="container">
    <div class="container">
        <form action="?action=CreateMission" method="POST"> <!--enctype="multipart/form-data" uniquement pour l'upload de fichier-->
            <div class="container1">
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
            <div class="containerSelect">
                <div>
                    <label for="creation-selector">Séléctionnez un agent :</label>
                </div>
                <div>
                    <select name="agent" id="agent" multiple size="5">
                        <optgroup label="Indiqués le ou les agents">
                            <?php
                            $manager = new AgentManager();
                            $agents = $manager->getAll();
                            foreach ($agents as $agent): ?>
                                <option value="<?php echo $agent->getCodeName() ?>"><?php echo $agent->getCodeName() ?></option>
                            <?php endforeach; ?>
                        </optgroup>
                    </select>

                </div>
                <div>
                    <label for="creation-selector">Séléctionnez une cible :</label>
                </div>
                <div>
                    <select name="target" id="target">
                        <option>Selectionnez votre action</option>
                        <?php
                        $manager = new TargetManager();
                        $targets = $manager->getAll();
                        foreach ($targets as $target): ?>
                            <option value="<?php echo $target->getCodeName() ?>"><?php echo $target->getCodeName() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="creation-selector">Séléctionnez une planque :</label>
                </div>
                <div>
                    <select name="safeHouse" id="safeHouse">
                        <option>Selectionnez votre action</option>
                        <?php
                        $manager = new SafeHouseManager();
                        $safeHouses = $manager->getAll();
                        foreach ($safeHouses as $safeHouse): ?>
                            <option value="<?php echo $safeHouse->getCode() ?>"><?php echo $safeHouse->getCode() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="creation-selector">Séléctionnez un contact :</label>
                </div>
                <div>
                    <select name="contact" id="contact">
                        <option>Selectionnez votre action</option>
                        <?php
                        $manager = new ContactManager();
                        $contacts = $manager->getAll();
                        foreach ($contacts as $contact): ?>
                            <option value="<?php echo $contact->getCodeName() ?>"><?php echo $contact->getCodeName() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="container3">
                <div>
                    <label for="type">Type de mission</label>
                </div>
                <div>
                    <select name="type" id="type">
                        <option value="">Selectionnez votre action</option>
                        <option value="Surveillance">Surveillance</option>
                        <option value="Infiltration">Infiltration</option>
                        <option value="Reconnaissance">Reconnaissance</option>
                    </select>
                </div>
                <div>
                    <label for="state">Etat de la mission</label>
                </div>
                <div>
                    <select name="state" id="state">
                        <option value="">Selectionnez votre action</option>
                        <option value="En préparation">En préparation</option>
                        <option value="En cours">En cours</option>
                        <option value="Terminée">Terminée</option>
                        <option value="Echec">Echec</option>
                    </select>
                </div>
                <div>
                    <label for="competence">Compétences requises</label>
                </div>
                <div>
                    <input type="text" id="competence" name="competence" placeholder="Entrez le nom de la planque" required>
                </div>
                <div>
                    <label for="startDate">Début de la mission</label>
                </div>
                <div>
                    <input type="date" id="startDate" name="startDate" placeholder="Entrez la date de début de mission" required>
                </div>

                <div>
                    <label for="endDate">Fin de la mission</label>
                </div>
                <div>
                    <input type="date" id="endDate" name="endDate" placeholder="Entrez la date de fin de mission" required>
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
