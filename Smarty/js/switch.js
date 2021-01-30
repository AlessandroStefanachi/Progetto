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

function userrbar() {
    var plc=document.getElementById('scbar')
    var bartv=document.getElementById('tvbar');
    var userbar=document.getElementById('userbar');
    var form=document.getElementById('ricerca');
    bartv.style.display='inline-flex';
    userbar.style.display='none';
    plc.placeholder='Cerca Serie Tv'
    ricerca.action='/Progetto/SerieTv/byname?name='


}

function bartv() {
    var userbar=document.getElementById('userbar');
    var bartv=document.getElementById('tvbar');
    var plc=document.getElementById('scbar')
    var form=document.getElementById('ricerca');
    bartv.style.display='none';
    userbar.style.display='inline-flex';
    plc.placeholder='Cerca Utente'
    ricerca.action='/Progetto/Utente/user?id='
    console.log('c');

}