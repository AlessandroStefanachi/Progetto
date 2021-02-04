function check() {
    var nome=document.getElementById('nome');
    var password=document.getElementById('password');
    var db=document.getElementById('db');
    var unlock=[true,true,true];
    var button=document.getElementById('installa');
    if(nome.value.length==0)unlock[0]=false;
    if(password.value.length==0)unlock[1]=false;
    if(db.value.length==0)unlock[2]=false;
    if(unlock[0]&&unlock[1]&&unlock[2])button.disabled=false;
    else button.disabled=true;

}