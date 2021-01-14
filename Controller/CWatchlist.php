<?php


class CWatchlist
{
static function aggiungiserie ($watch){
    session_start();
if (!FPersistentManager::existCorr($watch,$_SESSION['adding']));{
FPersistentManager::storeCorrispondenze($watch,$_SESSION['adding']);
unset($_SESSION['adding']);}//dovrebbe essere un array
    if(isset($_SESSION['location']))
header('Location: /Progetto'.$_SESSION['location']);
else header('Location: /Progetto/Utente/homelog');

}
}