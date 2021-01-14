function check(){
    console.log("parte la funzione")
    btn = document.getElementById('registratibutton');
    var pw = checkPW();
    var email =checkEmail();
    var user = checkUser();

    if(pw==true&&email==true&&user==true ){
        btn.disabled=false;
    }

    else{
        btn.disabled=true;

    }

}


function checkPW(){
    var check=false;
    var special = false;
    var number = false;
    err = document.getElementById('pass alert');
    ok = document.getElementById('pass ok');
    pw = document.getElementById('Password');

    for(var i=0; i<pw.value.length; i++){
        if(pw.value[i].charCodeAt(0)==33||pw.value[i].charCodeAt(0)>=35&&pw.value[i].charCodeAt(0)<=37||pw.value[i].charCodeAt(0)==33||pw.value[i].charCodeAt(0)==45||pw.value[i].charCodeAt(0)==95){
            special = true;
        }
    }

    for(var i=0; i<pw.value.length; i++){
        if(pw.value[i].charCodeAt(0)>=48 && pw.value[i].charCodeAt(0)<=57){
            number = true;
        }
    }

    if(pw.value.length < 8 || number!=true || special!=true){
        ok.style.display = "none";
        err.style.display = "block";
        check=false;
    }
    else{
        err.style.display = "none";
        ok.style.display = "block";
        check=true;
    }
    return check;
}


function checkEmail(){
    var check = false;
    err = document.getElementById('email alert');
    ok = document.getElementById('email ok');
    email = document.getElementById('email');


    var regolare= /^[A-z0-9\.\+_-]+@[A-z0-9\._-]+\.[A-z]{2,6}$/;

    if(!regolare.test(email.value)){
        ok.style.display = "none";
        err.style.display = "block";
        check=false;
    }
    else{
        err.style.display = "none";
        ok.style.display = "block";
        check=true;
    }
    return check;
}

function checkUser(){
    var check=false;
    var err = document.getElementById('username alert');
    var input=document.getElementById('nickname');
    if(input.value.length==0||input.value.length>16){

        err.style.display = "block";
        check=false;

    }
    else{
        err.style.display = "none";
        console.log("ok");
        check=true;
    }
    return check;
}

function reset(){
    btn = document.getElementById('registratibutton');
    btn.disabled=true;
    var x=document.getElementsByClassName("alert");
    for(var i=0;i<x.length;i++){
        console.log(i);
        x[i].style.display="none";
    }

}
