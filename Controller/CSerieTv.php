<?php


class CSerieTv
{
static function info($id){
    if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
    else{
        if(FPersistentManager::exist('id',$id,'FSerieTv')){
            session_start();
            $serie=FPersistentManager::load('id',$id,'FSerieTv');
            $serie=clone($serie[0]);
            $copertina=base64_encode($serie->getCopertina()->getImmagine());
            $view = new VSerieTv();
            $view->info($serie,$copertina,$_SESSION['utente']);
        }
        else{
            CFrontController::errore();
        }
    }
}
}