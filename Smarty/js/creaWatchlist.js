function crea() {
    var button=document.getElementById('creabutton')
    var text=document.getElementById('nome')
    if(text.value.length>0) button.disabled=false;
    else button.disabled=true;

}