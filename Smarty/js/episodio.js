function checked(num) {
    var x=document.getElementsByClassName("votebt");
    for(var i=0;i<x.length;i++){

        x[i].style.display="none";
    }

    var button=document.getElementById('btn'.concat(num.toString()));
    button.style.display="inline-block";
while (num>0){

var n=num.toString()
star=document.getElementById('check'.concat(n));
removestar=document.getElementById('uncheck'.concat(n));
    removestar.style.display="none";
    star.style.display="inline-block";
    num=num-1;



}
}

function unchecked(num) {

    var x=document.getElementsByClassName("votebt");
    for(var i=0;i<x.length;i++){

        x[i].style.display="none";
    }

    var button=document.getElementById('btn'.concat((num-1).toString()));
    button.style.display="inline-block";

    var dem=5;
    while (dem>=num){
        var d=dem.toString()
        removestar=document.getElementById('check'.concat(d));
        star=document.getElementById('uncheck'.concat(d));
        removestar.style.display="none";
        star.style.display="inline-block";
        dem=dem-1;}
}


function show( ) {
    var show = document.getElementById('BoxCommenti');
    var down = document.getElementById('down');
    var up = document.getElementById('up');

    down.style.display="none";
    up.style.display="inline-block";
    show.style.display="block";
}

function hide() {
    var show = document.getElementById('BoxCommenti');
    var down = document.getElementById('down');
    var up = document.getElementById('up');

    down.style.display="inline-block";
    up.style.display="none";
    show.style.display="none";
}

function comment() {
    var text=document.getElementById('comments');
    var button=document.getElementById('CommentButton');
    if(text.value.length==0||text.value[0]==" "||text.value[0]=="\n"){
        console.log("disabilita")
        button.disabled=true;}
    else{ button.disabled=false;
        console.log("abilita")
    }

}

function edit(id) {
    var text=document.getElementById("testo".concat(id));
var togliform=document.getElementById("commentform");
var action=document.getElementById('editaction');
    var mostraform=document.getElementById("editform");
    var area=document.getElementById("editarea");
    togliform.style.display="none";
mostraform.style.display="block";
area.innerText=text.innerText;
action.action="/Progetto/Episodio/modificaCommento?id=".concat(id);
}

function editcheck() {
    var text = document.getElementById('editarea');
    var button = document.getElementById('EditButton');
    if (text.value.length == 0 || text.value[0] == " " || text.value[0] == "\n") {
        console.log("disabilita")
        button.disabled = true;
    } else {
        button.disabled = false;
        console.log("abilita")
    }
}