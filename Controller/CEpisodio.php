<?php
/*
 * classe contente funzioni relativi agli episodi
 */

class CEpisodio
{
    /*
     * funzione che permette di visualizzare una pagina relativa ad un episodio
     */
    static function info($id){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            if(FPersistentManager::exist('id',$id,'FEpisodio')){
                session_start();
                $_SESSION['location']='/Episodio/info?id='.$id;
                $episodio=FPersistentManager::load('id',$id,'FEpisodio');
                $episodio=clone($episodio[0]);
                $stagione=FPersistentManager::load('id',$episodio->getIdStagione(),'FStagione');
                $serie=FPersistentManager::load('id',$stagione[0]->getIdSerieTv(),'FSerieTv');
                $serie=$serie[0]->getTitolo();
                $pos=array_search($episodio,$stagione[0]->getEpisodi());
                $stagione=$stagione[0]->getNumero();
                $commenti=FPersistentManager::load('id_episodio',$id,'FCommento');
                if(isset($_SESSION['visti']))$visti=$_SESSION['visti'];
                else $visti=null;
                $voto=$episodio->individuaVoto($_SESSION['utente']);
                $view = new VEpisodio();
                $view->info($episodio,$_SESSION["utente"],$serie,$pos,$stagione,$commenti,$visti,$voto);
                //modifica
            }
            else{
                CFrontController::errore();
            }
        }
    }
/*
 * funzione che permette di votare un episodio
 */
    static function vote($voto){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            session_start();
            if(!isset($_SESSION['location'])) header('Location: /Progetto/Utente/homepagedef');
            else{
                if(stripos($_SESSION['location'],'Episodio')!==false){
                    $idarr=$resource = explode('=', $_SESSION['location']);
                    $id=$idarr[1];
                    if(!FPersistentManager::existval($_SESSION['utente'],$id)&&$voto>0&&$voto<6)
                    {
                        $voto= new EValutazione($voto,$_SESSION['utente']->getUsername(),$id);
                        FPersistentManager::store($voto);

                    }
                    header('Location: /Progetto'.$_SESSION['location']);


                }
                else{
                    header('Location: /Progetto/Utente/homepagedef');
                }
            }
        }

    }
/*
 * funzione che permette di commentare un episodio
 */
    static function commento($id){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            session_start();
            if(!isset($_SESSION['location'])) header('Location: /Progetto/Utente/homepagedef');
            else{
                if(stripos($_SESSION['location'],'Episodio')!==false && $_SERVER['REQUEST_METHOD'] == "POST"){
                    $testo=$_POST["comments"];
                    $autore=$_SESSION['utente']->getUsername();
                    $ora= date('H:i:s');
                    $data= date('Y-m-d');
                    $commento=new ECommento($testo,$data,$ora,$autore,$id);
                    FPersistentManager::store($commento);

                }

                header('Location: /Progetto'.$_SESSION['location']);

            }
            //header('Location: /Progetto/Utente/homepagedef');

        }
    }

/*
 * funzione che permette di modificare un commento in un episodio
 */

    static function modificaCommento($id){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            session_start();
            if(!isset($_SESSION['location'])) header('Location: /Progetto/Utente/homepagedef');
            else{
                if(stripos($_SESSION['location'],'Episodio')!==false && $_SERVER['REQUEST_METHOD'] == "POST"){
                    $testo=$_POST["editarea"];

                    FPersistentManager::update('testo',$testo,'id',$id,'FCommento');

                }

                header('Location: /Progetto'.$_SESSION['location']);

            }
            //header('Location: /Progetto/Utente/homepagedef');

        }
    }
/*
 * funzione che permette di cancellare un commento relativo ad un episodio
 */
    static function eliminaCommento($id){

        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            session_start();
            if(!isset($_SESSION['location'])) header('Location: /Progetto/Utente/homepagedef');
            else{
                if(stripos($_SESSION['location'],'Episodio')!==false||$_SESSION['utente']->getRuolo()=='admin' ){
                   $commento=FPersistentManager::load('id',$id,'FCommento');
                   if($commento[0]->getAutore()==$_SESSION['utente']->getUsername()||$_SESSION['utente']->getRuolo()=='admin'){
                       FPersistentManager::delete('FCommento',$id);

                   }

                }

                header('Location: /Progetto'.$_SESSION['location']);

            }
            //header('Location: /Progetto/Utente/homepagedef');

        }

    }
/*
 * funzione che permette di impostare un episodio come visto
 */
    static function visto($id){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            session_start();
            if(!isset($_SESSION['location'])) header('Location: /Progetto/Utente/homepagedef');
            else{
                if(stripos($_SESSION['location'],'Watchlist')!==false){
                    //$idarr=$resource = explode('=', $_SESSION['location']);
                    //$id=$idarr[1];
                    if(!FPersistentManager::existvisto($_SESSION['utente']->getUsername(),$id))
                    {
                       // $voto= new EValutazione($voto,$_SESSION['utente']->getUsername(),$id);
                        //FPersistentManager::store($voto);
                        FPersistentManager::storevisto($_SESSION['utente']->getUsername(),$id);
                        array_push($_SESSION['visti'],$id);

                    }
                    header('Location: /Progetto'.$_SESSION['location']);


                }
                else{
                    header('Location: /Progetto/Utente/homepagedef');
                }
            }
        }

    }
/*
 * funzione che permette di eliminare lo stato di visto da un episodio
 */
    static function rimuovivisto($id){

        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            session_start();
            if(!isset($_SESSION['location'])) header('Location: /Progetto/Utente/homepagedef');
            else{
                if(stripos($_SESSION['location'],'Watchlist')!==false ){
                    //$commento=FPersistentManager::loa('id',$id,'FCommento');
                    if(in_array($id,$_SESSION['visti'])){
                        FPersistentManager::deletevisto($_SESSION['utente']->getUsername(),$id);
                        $pos=array_search($id,$_SESSION['visti']);
                        unset($_SESSION['visti'][$pos]);

                    }


                }

                header('Location: /Progetto'.$_SESSION['location']);

            }
            //header('Location: /Progetto/Utente/homepagedef');

        }
/*
 * funzione che permette di eliminare il proprio voto da un episodio
 */
    }

    static function cancellaVoto($id){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            session_start();
            if(!isset($_SESSION['location'])) header('Location: /Progetto/Utente/homepagedef');
            else{
                if(stripos($_SESSION['location'],'Episodio')!==false ){
                    //$commento=FPersistentManager::loa('id',$id,'FCommento');
                    if(FPersistentManager::existval($_SESSION['utente']->getUsername(),$id)){
                        FPersistentManager::deleteValutazione($_SESSION['utente']->getUsername(),$id);


                    }


                }

                header('Location: /Progetto'.$_SESSION['location']);

            }
            //header('Location: /Progetto/Utente/homepagedef');

        }
    }
}