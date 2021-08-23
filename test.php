<?php


function fetch(): array
{
    $stmt = new PDO('mysql:dbname=intelligence_agency;host=localhost', 'root', 'root');
    $req = $stmt->query('
SELECT * FROM intelligence_agency.Missions 
    LEFT JOIN intelligence_agency.Agents AS Agent 
        ON Missions.codeName = Agent.agent_Mission 
    LEFT JOIN intelligence_agency.Contacts AS Contact 
        ON Missions.codeName = Contact.contact_Mission 
    LEFT JOIN intelligence_agency.Targets AS Target 
        ON Missions.codeName = Target.target_Mission 
    LEFT JOIN intelligence_agency.Safe_houses AS SafeHouse 
        ON Missions.codeName = SafeHouse.sf_Mission 
        ');

    return $req->fetchAll();
}

var_dump(fetch());

$res = fetch();

foreach ($res as $re): ?>
<table>
    <tr>
        <th>Titre</th>
        <td><?php echo $re[2] ?></td>
    </tr>
    <tr>
        <th>Description</th>
        <td><?php echo $re[3] ?></td>

    </tr>
    <tr>
        <th>Nom de code</th>
        <td><?php echo $re[0] ?></td>

    </tr>
    <tr>
        <th>Pays</th>
        <td><?php echo $re[4] ?></td>

    </tr>
    <tr>
        <th>Agent(s)</th>
        <td class="actionBtn"><?php echo $re[10] ?></td>

    </tr>
    <tr>
        <th>Contact(s)</th>
        <td class="actionBtn"><?php echo $re[20] ?></td>

    </tr>
    <tr>
        <th>Cible(s)</th>
        <td class="actionBtn"><?php echo $re[26] ?></td>

    </tr>
    <tr>
        <th>Planque</th>
        <td class="actionBtn"><?php echo $re[33]; ?></td>
    </tr>
</table>

<?php endforeach; ?>















