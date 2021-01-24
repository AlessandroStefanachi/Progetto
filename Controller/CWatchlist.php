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
static function info($id){
    if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
    else{
        if(FPersistentManager::exist('id',$id,'FWatchlist')){
            session_start();
            $_SESSION['location']='/Watchlist/info?id='.$id;
            $watchlist=FPersistentManager::load('id',$id,'FWatchlist');
            $watchlist=clone($watchlist[0]);
            if(isset($_SESSION['visti']))$visti=$_SESSION['visti'];
            else $visti=null;
            $view = new VWatchlist();
            $view->info($watchlist,$_SESSION['utente'],$watchlist->Base64(),$visti);
            //modifica
        }
        else{
            CFrontController::errore();
        }
    }
}
}