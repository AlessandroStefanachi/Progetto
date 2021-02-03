function activatefilter(){
    console.log("parte la funzione")
    btn = document.getElementById('filterbutton');

        btn.disabled=false;




}

function activeadd(){
    console.log("parte la funzione")
    btn = document.getElementById('addbutton');

    btn.disabled=false;




}

function searchbutton() {
    var ricerca=document.getElementById('scbar');
    var button=document.getElementById('barButton');
    if(ricerca.value.length==0||ricerca.value[0]==' ')button.disabled=true;
    else button.disabled=false;

}