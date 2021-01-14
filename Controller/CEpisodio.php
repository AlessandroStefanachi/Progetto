<?php


class CEpisodio
{
    static function info($id){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            if(FPersistentManager::exist('id',$id,'FEpisodio')){
                session_start();
                $episodio=FPersistentManager::load('id',$id,'FEpisodio');
                $episodio=clone($episodio[0]);
                $view = new VEpisodio();
                $view->info($episodio,$_SESSION["utente"]);
                //modifica
            }
            else{
                CFrontController::errore();
            }
        }
    }
}