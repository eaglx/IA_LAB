function isEmpty(arg){
    if(arg.length)
        return false
    else
        return true
}

function isWhiteSpace(str) {
     var ws = "\t\n\r ";
     for (var i = 0; i < str.length; i++) {
         var c = str.charAt(i);
         if (ws.indexOf(c) == -1) {
             return false;
             }
         }
     return true;
}

function checkEmail(obj) {
    var str = obj.value;

    if (isWhiteSpace(str)) {
        alert("Podaj właściwy e-mail");
        return false;
    }
    else {
        var at = str.indexOf("@");
        if (at < 1) {
            alert("Nieprawidłowy e-mail");
            return false;
        }
        else {
            var l = -1;
            for (var i = 0; i < str.length; i++) {
                var c = str.charAt(i);
                if (c == ".") {
                    l = i;
                }
            }
            if ((l < (at + 2)) || (l == str.length - 1)) {
                alert("Nieprawidłowy e-mail");
                return false;
            }
        }
        return true;
    }
}

function checkString(toCheck, message) {
    if(isEmpty(toCheck.value) || isWhiteSpace(toCheck.value)){
        alert(message)
        return false
    }
    return true
}

function validate(form){
    if((!checkString(form.elements["f_imie"], "Podaj imie"))
        || (!checkString(form.elements["f_nazwisko"], "Podaj nazwisko"))
        || (!checkString(form.elements["f_kod"], "Podaj kod"))
        || (!checkString(form.elements["f_ulica"], "Podaj ulice"))
        || (!checkString(form.elements["f_miasto"], "Podaj miasto"))
        || (!checkEmail(form.elements["f_email"]))){
        return false;
    }

    return true;
}
