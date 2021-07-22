let btnLogin = document.getElementById('btn-login');
let menu = document.getElementById('liste');
let link = document.createElement('div')

btnLogin.addEventListener('click', change, back)

function change() {
    return 'none';
}

function back() {
    return link.innerHTML = "<a href='#'>Retour</a>";
}

menu.style.display = change();
btnLogin.style.display = change();
menu.append(back());
