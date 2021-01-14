function show( id) {
    var show = document.getElementById('season'.concat(id));
    var down = document.getElementById('down'.concat(id));
    var up = document.getElementById('up'.concat(id));

    down.style.display="none";
    up.style.display="inline-block";
    show.style.display="block";
}

function hide( id) {
    var show = document.getElementById('season'.concat(id));
    var down = document.getElementById('down'.concat(id));
    var up = document.getElementById('up'.concat(id));

    down.style.display="inline-block";
    up.style.display="none";
    show.style.display="none";
}

function activeadd(){
    console.log("parte la funzione")
    btn = document.getElementById('addbutton');

    btn.disabled=false;




}