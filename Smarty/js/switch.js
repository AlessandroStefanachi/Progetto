function change() {
    var x=document.getElementsByClassName("series");
    for(var i=0;i<x.length;i++){
        console.log(i);
        x[i].style.display="none";
    }
    var x=document.getElementsByClassName("watch");
    for(var i=0;i<x.length;i++){
        console.log(i);
        x[i].style.display="block";
    }
}

function change2() {
    var x=document.getElementsByClassName("watch");
    for(var i=0;i<x.length;i++){
        console.log(i);
        x[i].style.display="none";
    }
    var x=document.getElementsByClassName("series");
    for(var i=0;i<x.length;i++){
        console.log(i);
        x[i].style.display="block";
    }
}