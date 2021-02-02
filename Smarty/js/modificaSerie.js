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

function modtitolo(){
    var valore=document.getElementById('titolo');
    var button=document.getElementById('titolobutton');
    if(valore.value.length>0)button.disabled=false;
    else button.disabled=true;
}
function modregista() {
    var value=document.getElementById('regista');
    var button=document.getElementById('registabutton');
    if(value.value.length>0&&value.value[0]!=' ')button.disabled=false;
    else button.disabled=true;

}
function modtrama() {
    var value=document.getElementById('trama');
    var button=document.getElementById('tramabutton');
    if(value.value.length>0&&value.value[0]!=' ')button.disabled=false;
    else button.disabled=true;

}

function modfile() {
    var value=document.getElementById('file');
    var button=document.getElementById('filebutton');
    if(value.files[0].size>300000000)button.disabled=true;
    else button.disabled=false;

}

function moddata() {
    var value=document.getElementById('data');
    var button=document.getElementById('databutton');
    if(value.value.length!=0)button.disabled=false;
    else button.disabled=true;

}

function modtitoloep() {
    var value=document.getElementById('titolo episodio');
    var button=document.getElementById('titoloEpbutton');
    if(value.value.length>0&&value.value[0]!=' ')button.disabled=false;
    else button.disabled=true;

}

function moddurata() {
    var value=document.getElementById('durata');
    var button=document.getElementById('duratabutton');
    if(value.value.length!=0)button.disabled=false;
    else button.disabled=true;

}

function seasondown() {
    var box=document.getElementById('season-box');
    var btnup=document.getElementById('Allup');
    var btndown=document.getElementById('Alldown');
    box.style.display="block";
    btndown.style.display="none";
    btnup.style.display="inline-block";

}

function seasonup() {
    var box=document.getElementById('season-box');
    var btnup=document.getElementById('Allup');
    var btndown=document.getElementById('Alldown');
    box.style.display='none';
    btndown.style.display='inline-block';
    btnup.style.display='none';

}

function modseason() {
    var numero=document.getElementById('numero');
    var data=document.getElementById('createdata');
    var button=document.getElementById('creaStagione');
    var sblocca=[true,true];
    if(numero.value==null){sblocca[0]=false;console.log('no numero')}
    if(data.value.length==0){sblocca[1]=false;console.log('no data')}
    if(sblocca[0]&&sblocca[1]){button.disabled=false;console.log('sblocco')}
    else
    { button.disabled=true;console.log('blocco')}

}

function modep() {
    var titolo=document.getElementById('titoloep');
    var durata=document.getElementById('creadurata');
    var button=document.getElementById('episodiobutton');
    var sblocca=[true,true];
    if(titolo.value.length==0||titolo.value[0]==' '){sblocca[0]=false;console.log('no numero')}
    if(durata.value.length==0){sblocca[1]=false;console.log('no data')}
    if(sblocca[0]&&sblocca[1]){button.disabled=false;console.log('sblocco')}
    else
    { button.disabled=true;console.log('blocco')}

}

function setaction(id) {
    var form=document.getElementById('episodioform');
    console.log(id);
    form.action="/Progetto/Admin/inserisciEpisodio?id=".concat(id);

}