<?php
/*
 * questa classe contiene funzioni relative alle serie tv
 */

class CSerieTv
{
    /*
     * funzione che permette la visualizzazione di una specifica serie tv
     */
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
            if($serie->getCopertina()!=null)
            $copertina=base64_encode($serie->getCopertina()->getImmagine());
            else $copertina=null;
            $view = new VSerieTv();
            $view->info($serie,$copertina,$_SESSION['utente'],$watchlist);
        }
        else{
            CFrontController::errore();
        }
    }
}
/*
 * funzione che permette la ricerca di una serie tv dal nome e poi la visualizzazione
 */
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