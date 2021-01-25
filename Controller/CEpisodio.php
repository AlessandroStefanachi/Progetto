<?php


class CEpisodio
{
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
                $view = new VEpisodio();
                $view->info($episodio,$_SESSION["utente"],$serie,$pos,$stagione,$commenti,$visti);
                //modifica
            }
            else{
                CFrontController::errore();
            }
        }
    }

    static function vote($voto){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            session_start();
            if(!isset($_SESSION['location'])) header('Location: /Progetto/Utente/homepagedef');
            else{
                if(stripos($_SESSION['location'],'Episodio')!==false){
                    $idarr=$resource = explode('=', $_SESSION['location']);
                    $id=$idarr[1];
                    if(!FPersistentManager::existval($_SESSION['utente'],$id))
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

    static function eliminaCommento($id){

        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            session_start();
            if(!isset($_SESSION['location'])) header('Location: /Progetto/Utente/homepagedef');
            else{
                if(stripos($_SESSION['location'],'Episodio')!==false ){
                   $commento=FPersistentManager::load('id',$id,'FCommento');
                   if($commento[0]->getAutore()==$_SESSION['utente']->getUsername()){
                       FPersistentManager::delete('FCommento',$id);

                   }

                }

                header('Location: /Progetto'.$_SESSION['location']);

            }
            //header('Location: /Progetto/Utente/homepagedef');

        }

    }

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

    }
}