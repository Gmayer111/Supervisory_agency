<?php

use Managers\AgentManager;
use Managers\ContactManager;
use Managers\MissionManager;
use Managers\SafeHouseManager;
use Managers\TargetManager;

session_start();
ob_start();
?>
<style><?php echo include_once 'Public/Css/mission.css'?></style>
<style><?php echo include_once 'Public/Css/layout.css'?></style>
<?php
$agentManager = new AgentManager();
$agents = $agentManager->getAll();
$contactManager = new ContactManager();
$contacts = $contactManager->getAll();
$targetManager = new TargetManager();
$targets = $targetManager->getAll();
$shManager = new SafeHouseManager();
$shs = $shManager->getAll();



$manager = new MissionManager();
$res = $manager->getAllDatas();
foreach ($res as $re):?>
    <table>
        <tr>
            <th>Titre</th>
            <td><?php echo $re['title'] ?></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><?php echo $re['description'] ?></td>

        </tr>
        <tr>
            <th>Nom de code</th>
            <td><?php echo ucfirst(strtolower($re['codeName'])) ?></td>

        </tr>
        <tr>
            <th>Pays</th>
            <td><?php echo $re['country'] ?></td>

        </tr>
        <tr>

            <th>Agent(s)
                <?php
                $data = ucfirst(strtolower($re['AgentCodeName']));
                $pattern = '/,/';
                $ds = explode(',', $data);
                if (isset($_SESSION['CodeName'])): ?>
                <form action="?action=DeleteAgent" method="post">
                    <label for="dta"></label>
                    <select name="dta" id="dta">
                        <option value="">Supprimer un agent</option>
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
                $data = ucfirst(strtolower($re['ContactCodeName']));
                $pattern = '/,/';
                $ds = explode(',', $data);
                if (isset($_SESSION['CodeName'])): ?>
                <form action="?action=DeleteContact" method="post">
                    <label for="dtc"></label>
                    <select name="dtc" id="dtc">
                        <option value="">Supprimer un contact</option>
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
                $data = ucfirst(strtolower($re['TargetCodeName']));
                $pattern = '/,/';
                $ds = explode(',', $data);
                if (isset($_SESSION['CodeName'])): ?>
                <form action="?action=DeleteTarget" method="post">
                    <label for="dtt"></label>
                    <select name="dtt" id="dtt">
                        <option value="">Supprimer une cible</option>
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
                Planque
                <?php
                $data = ucfirst(strtolower($re['ShCodeName']));
                $pattern = '/,/';
                $ds = explode(',', $data);
                if (isset($_SESSION['CodeName'])): ?>
                <form action="?action=DeleteSh" method="post">
                    <label for="dtsh"></label>
                    <select name="dtsh" id="dtsh">
                        <option value="">Supprimer une planque</option>
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
            <td><?php echo $re['type'] ?></td>
        </tr>
        <tr>
            <th>Statut de la mission</th>
            <td><?php echo $re['state'] ?></td>
        </tr>
        <tr>
            <th>Spécialités</th>
            <td><?php echo $re['competence'] ?></td>
        </tr>
        <tr>
            <th>Date de début</th>
            <td><?php echo substr($re['startDate'], 0, -9) ?></td>
        </tr>
        <tr>
            <th>Date de fin</th>
            <td><?php echo substr($re['endDate'], 0, -9) ?></td>
        </tr>
    </table>
<?php
endforeach;

$content = ob_get_clean();
$title = 'Détail des missions';
echo require_once 'Vues/layout.php';
?>
