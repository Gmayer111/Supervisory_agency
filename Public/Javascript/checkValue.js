// Verif nationalité Agent et ciblefunction checkValueTarget(){    let targetN = document.getElementById("nationality").value;    let agentN = document.getElementById("AgentValue").textContent;    if (targetN === agentN.substr(25)) {        alert('Attention, la nationalité est similaire à l\'agent');        alert(targetN.value);        return false    }else {        return true;    }}// Verif nationalité Contact et Missionfunction checkValueContact(){    alert('ici');    let contactN = document.getElementById("nationalities").value;    let missionN = document.getElementById("MissionValue").textContent;    if (contactN !== missionN.substr(21)) {        alert('Attention, la nationalité est différente du pays de la mission');        return false    }else {        return true;    }}// Verif pays Planques et Missionfunction checkValueSh(){    let shC = document.getElementById("country").value;    let missionN = document.getElementById("MissionValue").textContent;    if (shC !== missionN.substr(21)) {        alert('Attention, le pays est différent du pays de la mission');        return false    }else {        return true;    }}// Verif compétence mission et agentfunction checkValueAgent(){        let aC = document.getElementById("cyber").value;        let aD = document.getElementById("decrypt").value;        let aT = document.getElementById("translate").value;        let missionV = document.getElementById("CompMissionValue").textContent;        alert(aC);        alert(missionV.substr(22));        if (missionV.substr(22) === aC || missionV === aD || missionV === aT) {            alert('ok');            return true;        }else {            alert('pas ok')            return false;        }}