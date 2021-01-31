<?php


class CAdmin
{
static function menu(){
    if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
    else{
    session_start();
    if($_SESSION['utente']->getRuolo()=='admin'){
    $_SESSION['location']='/Admin/menu';
    $v=new Vadmin();
    $v->menù($_SESSION['utente']);}
    else header('Location: /Progetto/Utente/homepagedef');
    }
}
static function utenti(){
    if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
    else {
        if ($_SESSION['utente']->getRuolo() == 'admin') {
            session_start();
$_SESSION['location']='/Admin/utenti';
            $v = new Vadmin();
            $u = FPersistentManager::loadAll('FUtente');
            $v->utenti($_SESSION['utente'], $u);

        }
        else header('Location: /Progetto/Utente/homepagedef');
    }

}
static function ban($id){
    if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
    else {
        if ($_SESSION['utente']->getRuolo() == 'admin') {

            session_start();

           if(FPersistentManager::exist('username',$id,'FUtente')){
               FPersistentManager::update('ruolo','banned','username',$id,'FUtente');
           }
            header('Location: /Progetto'.$_SESSION['location']);
        }
        else header('Location: /Progetto/Utente/homepagedef');
    }

}

    static function unban($id){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else {
            if ($_SESSION['utente']->getRuolo() == 'admin') {

                session_start();

                if(FPersistentManager::exist('username',$id,'FUtente')){
                    FPersistentManager::update('ruolo','utente','username',$id,'FUtente');
                }
                header('Location: /Progetto'.$_SESSION['location']);
            }
            else header('Location: /Progetto/Utente/homepagedef');
        }

    }

    static function eliminaUtente($id){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else {
            if ($_SESSION['utente']->getRuolo() == 'admin') {

                session_start();

                if(FPersistentManager::exist('username',$id,'FUtente')){
                    FPersistentManager::delete('FUtente',$id);
                }
                header('Location: /Progetto'.$_SESSION['location']);
            }
            else header('Location: /Progetto/Utente/homepagedef');
        }

    }

    static function lingue(){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else {
            if ($_SESSION['utente']->getRuolo() == 'admin') {
                session_start();
                $_SESSION['location']='/Admin/lingue';
                $v = new Vadmin();
                $u = FPersistentManager::loadAll('FLingua');
                $v->lingue($_SESSION['utente'], $u);

            }
            else header('Location: /Progetto/Utente/homepagedef');
        }

    }

   static function cancellaLingua($id){
       if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
       else {
           if ($_SESSION['utente']->getRuolo() == 'admin') {

               session_start();

               if(FPersistentManager::exist('lingua',$id,'FLingua')){
                   FPersistentManager::delete('FLingua',$id);
               }
               header('Location: /Progetto'.$_SESSION['location']);
           }
           else header('Location: /Progetto/Utente/homepagedef');
       }
   }

    static function aggiungiLingua(){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else {
            if ($_SESSION['utente']->getRuolo() == 'admin'&& $_SERVER['REQUEST_METHOD'] == "POST") {

                session_start();
                $lingua=$_POST['lingua'];
                $lingua=strtolower($lingua);
                $lingua=ucfirst($lingua);
                if(!FPersistentManager::exist('lingua',$lingua,'FLingua')){
                    FPersistentManager::storeLingua($lingua);
                }
                header('Location: /Progetto'.$_SESSION['location']);
            }
            else header('Location: /Progetto/Utente/homepagedef');
        }
    }

    static function generi(){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else {
            if ($_SESSION['utente']->getRuolo() == 'admin') {
                session_start();
                $_SESSION['location']='/Admin/generi';
                $v = new Vadmin();
                $u = FPersistentManager::loadAll('FGenere');
                $v->generi($_SESSION['utente'], $u);

            }
            else header('Location: /Progetto/Utente/homepagedef');
        }

    }

    static function cancellaGenere($id){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else {
            if ($_SESSION['utente']->getRuolo() == 'admin') {

                session_start();

                if(FPersistentManager::exist('genere',$id,'FGenere')){
                    FPersistentManager::delete('Fgenere',$id);
                }
                header('Location: /Progetto'.$_SESSION['location']);
            }
            else header('Location: /Progetto/Utente/homepagedef');
        }
    }

    static function aggiungiGenere(){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else {
            if ($_SESSION['utente']->getRuolo() == 'admin'&& $_SERVER['REQUEST_METHOD'] == "POST") {

                session_start();
                $genere=$_POST['genere'];
                $genere=strtolower($genere);
                $genere=ucfirst($genere);
                if(!FPersistentManager::exist('genere',$genere,'FGenere')){
                    FPersistentManager::storeGenere($genere);
                }
                header('Location: /Progetto'.$_SESSION['location']);
            }
            else header('Location: /Progetto/Utente/homepagedef');
        }
    }
}