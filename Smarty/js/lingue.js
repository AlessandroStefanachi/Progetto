function button() {
var lingua=document.getElementById('lingua');
var button=document.getElementById('linguabutton');
var spazio=false;
for(var i=0; i<lingua.value.length;i++)
    if(lingua.value[i]==' ') var spazio=true;
    if(lingua.value.length>0&&!spazio)button.disabled=false;
    else button.disabled=true;
}