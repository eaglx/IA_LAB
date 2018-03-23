function isEmpty(arg){
    var str = arg.value;
    if(str.length)
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

function validate(form){
    if(isEmpty(form.elements["f_imie"])){
        alert("Podaj imie");
        return false;
    }

    return true;
}
