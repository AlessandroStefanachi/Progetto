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

static function setPrivato($id){
    if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
    else{
        session_start();
        if(!isset($_SESSION['location'])) header('Location: /Progetto/Utente/homepagedef');
        else{
            if(stripos($_SESSION['location'],'Watchlist')!==false && FPersistentManager::exist('id',$id,'FWatchlist')){
               $w=FPersistentManager::load('id',$id,'FWatchlist');
               $w=clone($w[0]);
                if($w->getProprietario()==$_SESSION['utente']->getUsername())
                FPersistentManager::update('pubblico',0,'id',$id,'FWatchlist');

            }

            header('Location: /Progetto'.$_SESSION['location']);

        }
        //header('Location: /Progetto/Utente/homepagedef');

    }

}


static function setPubblico($id){
    if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
    else{
        session_start();
        if(!isset($_SESSION['location'])) header('Location: /Progetto/Utente/homepagedef');
        else{
            if(stripos($_SESSION['location'],'Watchlist')!==false && FPersistentManager::exist('id',$id,'FWatchlist')){
                $w=FPersistentManager::load('id',$id,'FWatchlist');
                if($w[0]->getProprietario()==$_SESSION['utente']->getUsername())
                    FPersistentManager::update('pubblico',1,'id',$id,'FWatchlist');

            }

            header('Location: /Progetto'.$_SESSION['location']);

        }
        //header('Location: /Progetto/Utente/homepagedef');

    }
}

    static function rimuoviserie(){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            session_start();
            if(!isset($_SESSION['location'])) header('Location: /Progetto/Utente/homepagedef');
            else{
                if(stripos($_SESSION['location'],'Watchlist')!==false && $_SERVER['REQUEST_METHOD'] == "POST"){
                    $watch=$_POST["watchlist"];
                    $serie=$_POST["serie"];

                    if(FPersistentManager::existCorr($watch,$serie))
                        FPersistentManager::deleteCorrispondenze($watch,$serie);
                }

                header('Location: /Progetto'.$_SESSION['location']);

            }
            //header('Location: /Progetto/Utente/homepagedef');

        }
    }



}