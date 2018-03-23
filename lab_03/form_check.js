var errorField = "";

function startTimer(fName) {
    errorField = fName;
    window.setTimeout("clearError(errorField)", 2000);
}

function clearError(objName) {
    document.getElementById(objName).innerHTML = "";
}

function showElement(e) {
    document.getElementById(e).style.visibility = 'visible';
}

function hideElement(e) {
    document.getElementById(e).style.visibility = 'hidden';
}

function isEmpty(arg){
    if(arg.length)
        return false;
    else
        return true;
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

function checkEmailRegEx(obj) {
    var str = obj.value;
    var email = /[a-zA-Z_0-9\.]+@[a-zA-Z_0-9\.]+\.[a-zA-Z][a-zA-Z]+/;
    if (email.test(str))
        return true;
    else {
        alert("Podaj właściwy e-mail");
        return false;
    }
}

function checkZIPCodeRegEx(str) {
    var postalcode = /[0-9]{2}-[0-9]/;
    if(postalcode.test(str)) {
        document.getElementById("kod").innerHTML = " OK";
        document.getElementById("kod").className = "green";
        return false;
    }
    else {
        document.getElementById("kod").innerHTML = " Źle";
        document.getElementById("kod").className = "red";
        return true;
    }
}

function checkStringAndFocus(obj, msg) {
    var str = obj.value;
    var errorFieldName = "e_" + obj.name.substr(2, obj.name.length);
    if (isWhiteSpace(str) || isEmpty(str)) {
         document.getElementById(errorFieldName).innerHTML = msg;
         obj.focus();
         startTimer(errorFieldName);
         return false;
     }
     else {
         return true;
     }
}

function validate(form){
    if((!checkStringAndFocus(form.elements["f_imie"], "Podaj imie"))
        || (!checkStringAndFocus(form.elements["f_nazwisko"], "Podaj nazwisko"))
        || (!checkZIPCodeRegEx(form.elements["f_kod"].value))
        || (!checkStringAndFocus(form.elements["f_ulica"], "Podaj ulice"))
        || (!checkStringAndFocus(form.elements["f_miasto"], "Podaj miasto"))
        || (checkEmailRegEx(form.elements["f_email"]))){

            for(var i in form.elements) {
                form.elements[i].className = "wrong";
            }
            return false;
    }

    return true;
}
