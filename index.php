<?php
require_once('Utility/autoload.inc.php');
require_once ('SetupSmarty.php');

//Viene verificata se l'installazione è già avvenuta altrimenti viene effettuata
if (Installazione::verifica()){
    $front_controller=new CFrontController();
    $front_controller->run($_SERVER['REQUEST_URI']);
}
else {







if($_SERVER['REQUEST_URI']=='/Progetto/installazione')
    Installazione::inizia();
else{
    setcookie("cookie_test", "cookie_value", time()+3600);
    header('Location: /Progetto/installazione');}
}