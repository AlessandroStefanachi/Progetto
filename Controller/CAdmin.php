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
                    FPersistentManager::delete('FGenere',$id);
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

    static function voti(){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else {
            if ($_SESSION['utente']->getRuolo() == 'admin') {
                session_start();
                $_SESSION['location']='/Admin/voti';
                $v = new Vadmin();
                $u = FPersistentManager::loadAll('FValutazione');
                $v->voti($_SESSION['utente'], $u);

            }
            else header('Location: /Progetto/Utente/homepagedef');
        }

    }

    static function cancellaVoto(){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else {
            if ($_SESSION['utente']->getRuolo() == 'admin'&& $_SERVER['REQUEST_METHOD'] == "POST") {

                session_start();
                $autore=$_POST['autore'];
                $id_e=$_POST['id'];

                if(FPersistentManager::existVal($autore,$id_e)){

                    FPersistentManager::deleteValutazione($autore,$id_e);
                }
                header('Location: /Progetto'.$_SESSION['location']);
            }
            else header('Location: /Progetto/Utente/homepagedef');
        }}

    static function watchlist(){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else {
            if ($_SESSION['utente']->getRuolo() == 'admin') {
                session_start();
                $_SESSION['location']='/Admin/watchlist';
                $v = new Vadmin();
                $u = FPersistentManager::loadAll('FWatchlist');
                $v->watchlist($_SESSION['utente'], $u);

            }
            else header('Location: /Progetto/Utente/homepagedef');
        }

    }

    static function commenti(){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else {
            if ($_SESSION['utente']->getRuolo() == 'admin') {
                session_start();
                $_SESSION['location']='/Admin/commenti';
                $v = new Vadmin();
                $u = FPersistentManager::loadAll('FCommento');
                $v->commenti($_SESSION['utente'], $u);

            }
            else header('Location: /Progetto/Utente/homepagedef');
        }

    }

    static function aggiungiSerie(){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else {
            session_start();
            if ($_SESSION['utente']->getRuolo() == 'admin') {

                $_SESSION['location']='/Admin/aggiungiSerie';
                if(isset($_SESSION['gif'])){
                    unset($_SESSION['gif']);
                    $gif=true;
                }
                else $gif=false;
                $v = new Vadmin();
               // $u = FPersistentManager::loadAll('FCommento');
                $u = FPersistentManager::loadAll('FGenere');
                $v->aggiungiSerie($_SESSION['utente'],$gif,$u);

            }
            else header('Location: /Progetto/Utente/homepagedef');
        }

    }

    static function creaSerie(){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{

    session_start();
            if ($_SESSION['utente']->getRuolo() == 'admin') {
        $type = $_FILES['file']['type'];
        $nome = $_FILES['file']['name'];
        $immagine = file_get_contents($_FILES['file']['tmp_name']);
        //$immagine=imagescale($immagine,150,150);
        if($type=='image/gif'){
            $_SESSION['gif']=true;
            header('Location: /Progetto'.$_SESSION['location']);
        }
   // $immagine = addslashes ($immagine);
        $size=$_FILES['file']['size'];
        $c=new ECopertina($nome,$type,$size,$immagine);
        $s=new ESerieTv($_POST['nome'],$_POST['trama'],$_POST['regista'],'a');
        if(!empty($_POST['generi']))
        {
            foreach ($_POST['generi'] as $g)
                $s->aggiungiGenere($g);
        }
        $s->setCopertina($c);
        FPersistentManager::store($s);}
        header('Location: /Progetto'.$_SESSION['location']);}

    }

    static function serie(){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else {
            if ($_SESSION['utente']->getRuolo() == 'admin') {
                session_start();
                $_SESSION['location']='/Admin/serie';
                $v = new Vadmin();
                $u = FPersistentManager::loadAll('FSerieTv');
                $v->serie($_SESSION['utente'], $u);

            }
            else header('Location: /Progetto/Utente/homepagedef');
        }

    }

    static function eliminaSerie($id){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else {
            if ($_SESSION['utente']->getRuolo() == 'admin') {

                session_start();


                if(FPersistentManager::exist('id',$id,'FSerieTv')){

                    FPersistentManager::delete('FSerieTv',$id);
                }
                header('Location: /Progetto'.$_SESSION['location']);
            }
            else header('Location: /Progetto/Utente/homepagedef');
        }}

    static function modificaserie($id){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else {
            if ($_SESSION['utente']->getRuolo() == 'admin'&&FPersistentManager::exist('id',$id,'FSerieTv')) {
                session_start();
                $_SESSION['location']='/Admin/serie';
                $v = new Vadmin();
                $u = FPersistentManager::load('id',$id,'FSerieTv');
                $v->modificaserie($_SESSION['utente'], $u[0]);

            }
            else header('Location: /Progetto/Utente/homepagedef');
        }

    }
}