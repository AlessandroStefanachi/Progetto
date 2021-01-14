<?php


class CWatchlist
{
static function aggiungiserie ($watch){
    session_start();
if (!FPersistentManager::existCorr($watch,$_SESSION['adding']));{
FPersistentManager::storeCorrispondenze($watch,$_SESSION['adding']);
unset($_SESSION['adding']);}//dovrebbe essere un array
header('Location: /Progetto/Utente/homepagedef');


}
}