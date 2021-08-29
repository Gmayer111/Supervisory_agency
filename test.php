<?php


function fetch(): array
{
    $stmt = new PDO('mysql:dbname=intelligence_agency;host=localhost', 'root', 'root');
    $req = $stmt->query('
SELECT  
       Missions.*,
       AgentCodeName,
       TargetCodeName,
       ContactCodeName,
       ShCodeName
FROM 
     intelligence_agency.Missions
    LEFT JOIN 
         (SELECT  
               agent_Mission, GROUP_CONCAT(codeName) AS AgentCodeName
         FROM intelligence_agency.Agents
             GROUP BY agent_Mission) as amACN 
ON Missions.codeName = agent_Mission

    LEFT JOIN 
         (SELECT  
               target_Mission, GROUP_CONCAT(codeName) AS TargetCodeName
         FROM intelligence_agency.Targets
             GROUP BY target_Mission) as tMACN 
ON Missions.codeName = target_Mission

    LEFT JOIN 
         (SELECT  
               contact_Mission, GROUP_CONCAT(codeName) AS ContactCodeName
         FROM intelligence_agency.Contacts
             GROUP BY contact_Mission) as cMACN 
ON Missions.codeName = contact_Mission

    LEFT JOIN 
         (SELECT  
               sf_Mission, GROUP_CONCAT(code) AS ShCodeName
         FROM intelligence_agency.Safe_houses
             GROUP BY sf_Mission) as sMACN 
ON Missions.codeName = sf_Mission
        ');
    return $req->fetchAll();
}
var_dump(fetch());

$res = fetch();
$max = count($res);

foreach ($res as $re):;
?>
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
        <td><?php echo $re['codeName'] ?></td>

    </tr>
    <tr>
        <th>Pays</th>
        <td><?php echo $re['country'] ?></td>

    </tr>
    <tr>
        <th>Agent(s)</th>
        <td class="actionBtn">
            <?php
            for ($n = 0; $n <= $max; $n++) {
                //si le codeName mission est égale à un autre codeName mission
                if ($res[$n][0] === $re[0]) {
                    // si le n° de l'agent est différent de l'autre n°d'agent
                    if ($re['AgentCodeName'] !== $res[$n]['AgentCodeName']){
                        null;
                    }else {
                        echo $re['AgentCodeName'].'<br>';
                    }
                }
            }
            ?>
        </td>

    </tr>
    <tr>
        <th>Contact(s)</th>
        <td class="actionBtn">
            <?php
            for ($n = 0; $n <= $max; $n++) {
                //si le codeName mission est égale à un autre codeName mission
                if ($res[$n][0] === $re[0]) {
                    // si le n° de l'agent est différent de l'autre n°d'agent
                    if ($re['ContactCodeName'] !== $res[$n]['ContactCodeName']) {
                        null;
                    } else {
                        echo $re['ContactCodeName'] . '<br>';
                    }
                }
            }
            ?></td>

    </tr>
    <tr>
        <th>Cible(s)</th>
        <td class="actionBtn">
            <?php
            for ($n = 0; $n <= $max; $n++) {
                //si le codeName mission est égale à un autre codeName mission
                if ($res[$n][0] === $re[0]) {
                    // si le n° de l'agent est différent de l'autre n°d'agent
                    if ($re['TargetCodeName'] !== $res[$n]['TargetCodeName']) {
                        null;
                    } else {
                        echo $re['TargetCodeName'] . '<br>';
                    }
                }
            }
            ?></td>

    </tr>
    <tr>
        <th>Planque</th>
        <td class="actionBtn">
            <?php
            for ($n = 0; $n <= $max; $n++) {
                //si le codeName mission est égale à un autre codeName mission
                if ($res[$n][0] === $re[0]) {
                    // si le n° de l'agent est différent de l'autre n°d'agent
                    if ($re['ShCodeName'] !== $res[$n]['ShCodeName']) {
                        null;
                    } else {
                        echo $re['ShCodeName'] . '<br>';
                    }
                }
            }

            ?></td>
    </tr>
</table>

<?php
echo '------';
endforeach;
?>















