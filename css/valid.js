
function CheckPassword() {

    var ucase = new RegExp("[A-Z]+");
    var lcase = new RegExp("[a-z]+");
    var num = new RegExp("[0-9]+");
    if ($("#password1").val().length == 0)  {
        AlertMessage('error', 'New Password Should not be empty', true);
        return false;
    }
    if ($("#password1").val().length >= 8) {

        $("#8char").removeClass("glyphicon-remove");
        $("#8char").addClass("glyphicon-ok");
        $("#8char").css("color", "#00A41E");
        if ($("#password2").val().length == 0) {
            AlertMessage('error', 'Repeat Password Should not be empty', true);
            return false;
        }
    }
    if ($("#password1").val().length >= 8) {
        $("#8char").removeClass("glyphicon-remove");
        $("#8char").addClass("glyphicon-ok");
        $("#8char").css("color", "#00A41E");
    } else {
        $("#8char").removeClass("glyphicon-ok");
        $("#8char").addClass("glyphicon-remove");
        $("#8char").css("color", "#FF0004");
    }

    if (ucase.test($("#password1").val())) {
        $("#ucase").removeClass("glyphicon-remove");
        $("#ucase").addClass("glyphicon-ok");
        $("#ucase").css("color", "#00A41E");
    } else {
        $("#ucase").removeClass("glyphicon-ok");
        $("#ucase").addClass("glyphicon-remove");
        $("#ucase").css("color", "#FF0004");
    }

    if (lcase.test($("#password1").val())) {
        $("#lcase").removeClass("glyphicon-remove");
        $("#lcase").addClass("glyphicon-ok");
        $("#lcase").css("color", "#00A41E");
    } else {
        $("#lcase").removeClass("glyphicon-ok");
        $("#lcase").addClass("glyphicon-remove");
        $("#lcase").css("color", "#FF0004");
    }

    if (num.test($("#password1").val())) {
        $("#num").removeClass("glyphicon-remove");
        $("#num").addClass("glyphicon-ok");
        $("#num").css("color", "#00A41E");
    } else {
        $("#num").removeClass("glyphicon-ok");
        $("#num").addClass("glyphicon-remove");
        $("#num").css("color", "#FF0004");
    }
    if ($("#password1").val() == $("#password2").val()) {
        $("#pwmatch").removeClass("glyphicon-remove");
        $("#pwmatch").addClass("glyphicon-ok");
        $("#pwmatch").css("color", "#00A41E");
        AlertMessage('success', 'Both Passwords Matched ', true);
    } else {
        $("#pwmatch").removeClass("glyphicon-ok");
        $("#pwmatch").addClass("glyphicon-remove");
        $("#pwmatch").css("color", "#FF0004");

    }
}

function ModMatch() {
    var ucase = new RegExp("[A-Z]+");
    var lcase = new RegExp("[a-z]+");
    var num = new RegExp("[0-9]+");

    var password = $("#password1").val();

    if (!(password.length >= 8 && ucase.test(password) && lcase.test(password) && num.test(password))) {

        AlertMessage('error', 'Check Password policy, try again', true);

        return false;
    }
}

function Match() {
    var ucase = new RegExp("[A-Z]+");
    var lcase = new RegExp("[a-z]+");
    var num = new RegExp("[0-9]+");

    var Email = $("#MainContent_txtEmail").val();
    var password = $("#MainContent_txtPassword").val();

    if (Email == "" && password == "") {
        AlertMessage('error', 'All Fields are Mandatory', true);
        return false;
    }
    if (!(password.length >= 8 && ucase.test(password) && lcase.test(password) && num.test(password))) {
        AlertMessage('error', 'Check Password policy, try again', true);       
        return false;
    }
}







