<?php


function fetch(): array
{
    $stmt = new PDO('mysql:dbname=intelligence_agency;host=localhost', 'root', 'root');
    $req = $stmt->query("
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
WHERE codeName = 'MISSION 3'
        ");
    return $req->fetch();
}
var_dump(fetch());

$res = fetch();
$max = count($res);















