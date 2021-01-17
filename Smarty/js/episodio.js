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