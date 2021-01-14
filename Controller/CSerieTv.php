<?php


class CSerieTv
{
static function info($id){
    if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
    else{
        if(FPersistentManager::exist('id',$id,'FSerieTv')){
            session_start();
            $_SESSION['location']='/SerieTv/info?id='.$id;
            if(isset($_SESSION['id_add'])){
                $id=$_SESSION['id_add'];
                $watchlist=$_SESSION['utente']->getWatchlist();
                $_SESSION['adding']=$id;
                unset($_SESSION['id_add']);
            }
            else{$watchlist=null;}
            $serie=FPersistentManager::load('id',$id,'FSerieTv');
            $serie=clone($serie[0]);
            $copertina=base64_encode($serie->getCopertina()->getImmagine());
            $view = new VSerieTv();
            $view->info($serie,$copertina,$_SESSION['utente'],$watchlist);
        }
        else{
            CFrontController::errore();
        }
    }
}
}