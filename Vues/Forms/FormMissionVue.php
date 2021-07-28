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

                <div>
                    <label for="agent">Agent</label>
                </div>
                <div>
                    <input type="text" id="agent"  name="agent" placeholder="Entrez le nom de l'agent" required>
                </div>
            </div>
            <div class="container2">
                <div>
                    <label for="target">Cible</label>
                </div>
                <div>
                    <input type="text" id="target"  name="target" placeholder="Entrez le nom de la cible" required>
                </div>
                <div>
                    <label for="safehouse">Planque</label>
                </div>
                <div>
                    <input type="text" id="safehouse" name="safehouse" placeholder="Entrez le nom de la planque" required>
                </div>
                <div>
                    <label for="contact">Contact</label>
                </div>
                <div>
                    <input type="text" id="contact" name="contact" placeholder="Entrez le nom du contact" required>
                </div>


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
                        <option value="inProgress">En préparation</option>
                        <option value="inProcess">En cours</option>
                        <option value="finish">Terminée</option>
                        <option value="failure">Echec</option>
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
