<?php

use Controllers\MissionController;
use Managers\MissionManager;

session_start();
ob_start();
?>
<style><?php echo include_once 'Public/Css/detailMission.css'?></style>
<style><?php echo include_once 'Public/Css/layout.css'?></style>
<?php
$controller = new MissionController();
$codeName = $controller->DetailMissionVue();
$manager = new MissionManager();
$res = $manager->getAllDatas($codeName);?>
<h1>Détails de la mission</h1>
<h2>Nom de code mission : <?php echo ucfirst(strtolower($res['codeName'])) ?></h2>
<div class="container">
    <table>
        <tr>
            <th class="titleTh">Titre</th>
            <td class="titleTd"><?php echo $res['title'] ?></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><?php echo $res['description'] ?></td>

        </tr>
        <tr>
            <th>Nom de code</th>
            <td><?php echo ucfirst(strtolower($res['codeName'])) ?></td>

        </tr>
        <tr>
            <th>Pays</th>
            <td><?php echo $res['country'] ?></td>

        </tr>
        <tr>

            <th>Agent(s)
                <?php
                $data = ucfirst(strtolower($res['AgentCodeName']));
                $pattern = '/,/';
                $ds = explode(',', $data);
                if (isset($_SESSION['User'])): ?>
                    <form action="?action=DeleteAgent&codeName=<?php echo $res['codeName'] ?>" method="post">
                        <label for="dta"></label>
                        <select name="dta" id="dta">
                            <option value="">Supprimer agent</option>
                            <?php if (!preg_match($pattern, $data)): ?>
                                <option value="<?php echo $data; ?>"><?php echo $data; ?></option>
                            <?php endif; ?>
                            <?php if (preg_match($pattern, $data)): ?>
                                <?php foreach ($ds as $key => $value): ?>
                                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <div>
                            <input type="submit" id="submit" name="submit" value="Confirmer">
                        </div>
                    </form>
                <?php endif; ?>
            </th>
            <td>
                <div>
                    <div class="btnD">
                        <?php
                        foreach ($ds as $key => $value) {
                            echo $value.'<br>';
                        }?>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <th>
                Contact(s)
                <?php
                $data = ucfirst(strtolower($res['ContactCodeName']));
                $pattern = '/,/';
                $ds = explode(',', $data);
                if (isset($_SESSION['User'])): ?>
                    <form action="?action=DeleteContact&codeName=<?php echo $res['codeName'] ?>" method="post">
                        <label for="dtc"></label>
                        <select name="dtc" id="dtc">
                            <option value="">Supprimer contact</option>
                            <?php if (!preg_match($pattern, $data)): ?>
                                <option value="<?php echo $data; ?>"><?php echo $data; ?></option>
                            <?php endif; ?>
                            <?php if (preg_match($pattern, $data)): ?>
                                <?php foreach ($ds as $key => $value): ?>
                                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <div>
                            <input type="submit" id="submit" name="submit" value="Confirmer">
                        </div>
                    </form>
                <?php endif; ?>
            </th>
            <td>
                <div class="btnD">
                    <?php
                    foreach ($ds as $key => $value) {
                        echo $value.'<br>';
                    }?>
                </div>
            </td>
        </tr>
        <tr>
            <th>
                Cible(s)
                <?php
                $data = ucfirst(strtolower($res['TargetCodeName']));
                $pattern = '/,/';
                $ds = explode(',', $data);
                if (isset($_SESSION['User'])): ?>
                    <form action="?action=DeleteTarget&codeName=<?php echo $res['codeName'] ?>" method="post">
                        <label for="dtt"></label>
                        <select name="dtt" id="dtt">
                            <option value="">Supprimer cible</option>
                            <?php if (!preg_match($pattern, $data)): ?>
                                <option value="<?php echo $data; ?>"><?php echo $data; ?></option>
                            <?php endif; ?>
                            <?php if (preg_match($pattern, $data)): ?>
                                <?php foreach ($ds as $key => $value): ?>
                                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <div>
                            <input type="submit" id="submit" name="submit" value="Confirmer">
                        </div>
                    </form>
                <?php endif; ?>
            </th>
            <td>
                <div class="btnD">
                    <?php
                    foreach ($ds as $key => $value) {
                        echo $value.'<br>';
                    }?>
                </div>
            </td>
        </tr>
        <tr>
            <th>
                Planque(s)
                <?php
                $data = ucfirst(strtolower($res['ShCodeName']));
                $pattern = '/,/';
                $ds = explode(',', $data);
                if (isset($_SESSION['User'])): ?>
                    <form action="?action=DeleteSh&codeName=<?php echo $res['codeName'] ?>" method="post">
                        <label for="dtsh"></label>
                        <select name="dtsh" id="dtsh">
                            <option value="">Supprimer planque</option>
                            <?php if (!preg_match($pattern, $data)): ?>
                                <option value="<?php echo $data; ?>"><?php echo $data; ?></option>
                            <?php endif; ?>
                            <?php if (preg_match($pattern, $data)):
                                foreach ($ds as $key => $value): ?>
                                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <div>
                            <input type="submit" id="submit" name="submit" value="Confirmer">
                        </div>
                    </form>
                <?php endif; ?>
            </th>
            <td>
                <div class="btnD">
                    <?php
                    foreach ($ds as $key => $value) {
                        echo $value.'<br>';
                    }?>
                </div>
            </td>
        </tr>
        <tr>
            <th>Type de mission</th>
            <td><?php echo $res['type'] ?></td>
        </tr>
        <tr>
            <th>
                Statut de la mission
                <?php if (isset($_SESSION['User'])): ?>
                    <form action="?action=UpdateMission&codeName=<?php echo $res['codeName']; ?>" method="post">
                        <label for="uM"></label>
                        <select name="uM" id="uM">
                            <option value="">Mettre à jour la mission</option>
                            <option value="En préparation">En préparation</option>
                            <option value="En cours">En cours</option>
                            <option value="Terminée">Terminée</option>
                            <option value="Echec">Echec</option>
                        </select>
                        <div>
                            <input type="submit" id="submit" name="submit" value="Confirmer">
                        </div>
                    </form>
                <?php endif; ?>
            </th>
            <td><?php echo $res['state'] ?></td>
        </tr>
        <tr>
            <th>Spécialités</th>
            <td><?php echo $res['competence'] ?></td>
        </tr>
        <tr>
            <th>Date de début</th>
            <td><?php echo substr($res['startDate'], 0, -9) ?></td>
        </tr>
        <tr>
            <th class="endDateTh">Date de fin</th>
            <td class="endDateTd"><?php echo substr($res['endDate'], 0, -9) ?></td>
        </tr>
    </table>
</div>

<?php

$content = ob_get_clean();
$title = 'Détail des missions';
require_once 'Vues/layout.php';
?>
