let formF = document.getElementById('formValueF');
let formL = document.getElementById('formValueL');
let formE = document.getElementById('formValueE');
let spanHide = document.getElementById('resultAjax');
formF.style.display = "none";
formL.style.display = "none";
formE.style.display = "none";

let clickNumber = 0;

document.getElementById('upInfoF').addEventListener('click', () => {
    clickNumber++;
    if (clickNumber%2 === 0) {
        document.getElementById('formValueF').style.display = "none";
    }else {
        document.getElementById('formValueF').style.display = '';
        $(function ()
        {
            $('#formValueF').submit(function (e) {
                e.preventDefault();
                firstName = $('#firstName').val();

                $.post("?action=UpdateAdmin", {
                    firstName:firstName,
                }, function (data) {
                    if (data !== "1") {
                        alert('Erreur');
                    }else {
                        $('#firstName').val("");
                        $("#resultAjax").append(firstName + " a bien été enregistré <br> Modification visible lors de la prochaine connexion").slideDown("slow");
                        setTimeout(function () {
                            $("#resultAjax").slideUp('slow')
                        }, 2000)
                    }
                })
            });
        });
    }
});

document.getElementById('upInfoL').addEventListener('click', () => {
    clickNumber++;
    if (clickNumber%2 === 0) {
        document.getElementById('formValueL').style.display = "none";
    }else {
        spanHide.textContent = "";
        document.getElementById('formValueL').style.display = '';
        $(function ()
        {
            $('#formValueL').submit(function (e) {
                e.preventDefault();
                lastName = $('#lastName').val();
                $.post("?action=UpdateAdmin", {
                    lastName:lastName,
                }, function (data) {
                    if (data !== "1") {
                        alert('Erreur');
                    }else {
                        $("#resultAjax").prepend(lastName + " a bien été enregistré <br> Modification visible lors de la prochaine connexion").slideDown("slow");
                        setTimeout(function () {
                            $("#resultAjax").slideUp('slow')
                        }, 2000)
                    }
                })
            });
        });
    }
});

document.getElementById('upInfoE').addEventListener('click', () => {
    clickNumber++;
    if (clickNumber%2 === 0) {
        document.getElementById('formValueE').style.display = "none";
    }else {
        spanHide.textContent = "";
        document.getElementById('formValueE').style.display = '';
        $(function ()
        {
            $('#formValueF').submit(function (e) {
                e.preventDefault();
                email = $('#email').val();
                $.post("?action=UpdateAdmin", {
                    email:email,
                }, function (data) {
                    if (data !== "1") {
                        alert('Erreur');
                    }else {
                        $("#resultAjax").prepend(email + " a bien été enregistré <br> Modification visible lors de la prochaine connexion").slideDown("slow");
                        setTimeout(function () {
                            $("#resultAjax").slideUp('slow')
                        }, 2000)
                    }
                })
            });
        });
    }
});


