function button() {
var file=document.getElementById('file');
var oversize=document.getElementById('oversize');
var gif=document.getElementById('gif');
var nome=document.getElementById('nome');
var trama=document.getElementById('trama');
var regista=document.getElementById('regista');

    var unlock = [true, true, true,true];
var button=document.getElementById('creabutton')
if(file.files[0].size>300000000){ unlock[0]=false; oversize.style.display='block'}
    else {unlock[0]=true;}

if(nome.value.length==0||nome.value[0]==" "||nome.value[0]=="\n")unlock[1]=false;
else unlock[1]=true;

if(regista.value.length==0||regista.value[0]==" "||regista.value[0]=="\n")unlock[2]=false;
else unlock[2]=true;

if(trama.value.length==0||trama.value[0]==" "||trama.value[0]=="\n")unlock[3]=false;
else unlock[3]=true;

if(unlock[0]&&unlock[1]&&unlock[2]&&unlock[3])button.disabled=false;
else button.disabled=true;

}