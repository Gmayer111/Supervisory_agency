
$(function ()
    {

        $('#formCom').submit(function (e) {
            e.preventDefault();
            codeName = $('#codeName').val();
            firstName = $('#firstName').val();
            lastName = $('#lastName').val();
            password = $('#password').val();
            email = $('#email').val();
            $.post("?action=CreateAdmin", {
                codeName:codeName,
                firstName:firstName,
                lastName:lastName,
                password:password,
                email:email
                }, function (data) {
                if (data !== "1") {
                    $(".error").empty().append(data);
                    alert("erreur");
                }else {
                    $('#codeName').val("");
                    $('#firstName').val("");
                    $('#lastName').val("");
                    $('#password').val("");
                    $('#email').val("");
                    $("#resultAjax").hide().append(codeName+" a bien été enregistré").slideDown("slow");
                    setTimeout(function () {
                        $("#resultAjax").slideUp('slow')
                    }, 2000)
                }
            })
        });
    });
