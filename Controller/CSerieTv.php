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
static function byname($nome){
    if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
    else{
        $nome=str_replace('+',' ',$nome);
        if(FPersistentManager::exist('titolo',$nome,'FSerieTv')){
            $s=FPersistentManager::load('titolo',$nome,'FSerieTv');
            header('Location: /Progetto/SerieTv/info?id='.$s[0]->getId());
        }
        else{
            CFrontController::errore();
        }

    }
}
}