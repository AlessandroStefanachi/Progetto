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
       header('Location: /Progetto'.$_SESSION['location']);
            }

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



    static function modificaserie($id){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else {
            if ($_SESSION['utente']->getRuolo() == 'admin'&&FPersistentManager::exist('id',$id,'FSerieTv')) {
                session_start();
                $_SESSION['location']='/Admin/modificaserie?id='.$id;
                $v = new Vadmin();
                $u = FPersistentManager::load('id',$id,'FSerieTv');
                if($u[0]->getCopertina()!=null)
                $copertina=base64_encode($u[0]->getCopertina()->getImmagine());
                else $copertina=null;
                $g = FPersistentManager::loadAll('FGenere');
                $l = FPersistentManager::loadAll('FLingua');
                if(isset($_SESSION['gif'])){$gif=true;unset($_SESSION['gif']);}
                else $gif=false;
                $v->modificaserie($_SESSION['utente'], $u[0],$copertina,$g,$l,$gif);


            }
            else header('Location: /Progetto/Utente/homepagedef');
        }

    }

    static function modifica($id){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else {
            if ($_SESSION['utente']->getRuolo() == 'admin'&& $_SERVER['REQUEST_METHOD'] == "POST") {
                session_start();
                if(isset($_POST['titolo'])&&FPersistentManager::exist('id',$id,'FSerieTv')){
                    FPersistentManager::update('titolo',$_POST['titolo'],'id',$id,'FSerieTv');
                }
                if(isset($_POST['regista'])&&FPersistentManager::exist('id',$id,'FSerieTv')){
                    FPersistentManager::update('regista',$_POST['regista'],'id',$id,'FSerieTv');
                }
                if(isset($_POST['trama'])&&FPersistentManager::exist('id',$id,'FSerieTv')){
                    FPersistentManager::update('trama',$_POST['trama'],'id',$id,'FSerieTv');
                }
                if(isset($_POST['rimuoviGenere'])&&FPersistentManager::exist('id',$id,'FSerieTv')){
                    if(!empty($_POST['rimuoviGenere'])){
                        foreach ($_POST['rimuoviGenere'] as $genere){
                            FPersistentManager::deleteTvGenere($genere,$id);
                        }

                    }
                }

                if(isset($_POST['aggiungiGenere'])&&FPersistentManager::exist('id',$id,'FSerieTv')){
                    if(!empty($_POST['aggiungiGenere'])){
                        foreach ($_POST['aggiungiGenere'] as $genere){
                            FPersistentManager::storeTVgenere($genere,$id);
                        }
                    }
                }

                if(isset($_FILES['file']['tmp_name'])){
                    $type = $_FILES['file']['type'];
                    $nome = $_FILES['file']['name'];
                    $immagine = file_get_contents($_FILES['file']['tmp_name']);
                    //$immagine=imagescale($immagine,150,150);
                    if($type=='image/gif'){
                        $_SESSION['gif']=true;
                        header('Location: /Progetto'.$_SESSION['location']);
                    }

                    $size=$_FILES['file']['size'];
                    $s=FPersistentManager::load('id',$id,'FSerieTv');
                    $idc=$s[0]->getId_copertina();
                    if(FPersistentManager::exist('id',$idc,'FCopertina')){$immagine = addslashes ($immagine);
                    FPersistentManager::update('nome',$nome,'id',$idc,'FCopertina');
                    FPersistentManager::update('size',$size,'id',$idc,'FCopertina');

                    FPersistentManager::update('type',$type,'id',$idc,'FCopertina');
                    FPersistentManager::update('immagine',$immagine,'id',$idc,'FCopertina');}
                    else{
                        $s=FPersistentManager::load('id',$id,'FSerieTV');
                        $s=clone($s[0]);
                        $c=new ECopertina($nome,$type,$size,$immagine);
                        $s->setCopertina($c);
                        FPersistentManager::delete('FSerieTv',$id);
                        FPersistentManager::store($s);
                    }
                    header('Location: /Progetto'.$_SESSION['location']);
                }


            }
            else header('Location: /Progetto/Utente/homepagedef');
        }

    }

    static function modificaStagione($id){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');

        else {
            session_start();
            if ($_SESSION['utente']->getRuolo() == 'admin'&& $_SERVER['REQUEST_METHOD'] == "POST") {
                if(isset($_POST['rimuoviLingua'])&&FPersistentManager::exist('id',$id,'FStagione')){
                    if(!empty($_POST['rimuoviLingua'])){

                        foreach ($_POST['rimuoviLingua'] as $lingua){
                            FPersistentManager::deleteSTGlingua($lingua,$id);
                        }

                    }
                }

                if(isset($_POST['aggiungiLingua'])&&FPersistentManager::exist('id',$id,'FStagione')){
                    if(!empty($_POST['aggiungiLingua'])){
                        foreach ($_POST['aggiungiLingua'] as $lingua){
                            FPersistentManager::storeSTGlingua($lingua,$id);
                        }
                    }



                }
                if(isset($_POST['data'])&&FPersistentManager::exist('id',$id,'FStagione')){
                    //echo $_POST['data'];
                    // echo'a';
                    FPersistentManager::update('data',$_POST['data'],'id',$id,'FStagione');
                    //echo $_POST['data'];

                }

                header('Location: /Progetto'.$_SESSION['location']);
            } else header('Location: /Progetto/Utente/homepagedef');

    }}

    static function modificaEpisodio($id){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');

        else {
            session_start();
            if ($_SESSION['utente']->getRuolo() == 'admin'&& $_SERVER['REQUEST_METHOD'] == "POST") {
                if(isset($_POST['titolo'])&&FPersistentManager::exist('id',$id,'FEpisodio')){
                    FPersistentManager::update('titolo',$_POST['titolo'],'id',$id,'FEpisodio');
                }

                if(isset($_POST['durata'])&&FPersistentManager::exist('id',$id,'FEpisodio')){
                    //echo $_POST['data'];
                    // echo'a';
                    FPersistentManager::update('durata',$_POST['durata'],'id',$id,'FEpisodio');
                    //echo $_POST['data'];

                }
                header('Location: /Progetto'.$_SESSION['location']);
            }
            else header('Location: /Progetto/Utente/homepagedef');
        }
    }
    static function aggiungiStagione($id){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else {
            session_start();
            if ($_SESSION['utente']->getRuolo() == 'admin'&& $_SERVER['REQUEST_METHOD'] == "POST") {
                $data=$_POST['createdata'];
                $numero=$_POST['numero'];
                $stagione=new EStagione($data,$numero,$id);
                if(isset($_POST['aggiungiLingua'])){
                    if(!empty($_POST['aggiungiLingua'])){
                        foreach ($_POST['aggiungiLingua'] as $lingua){
                            $stagione->aggiungiLingua($lingua);
                        }
                    }}
                    FPersistentManager::store($stagione);
                header('Location: /Progetto'.$_SESSION['location']);

            }
            else header('Location: /Progetto/Utente/homepagedef');
        }
    }

    static function inserisciEpisodio($id){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else {
            session_start();
            if ($_SESSION['utente']->getRuolo() == 'admin'&& $_SERVER['REQUEST_METHOD'] == "POST") {
                $titolo=$_POST['titolo'];
                $durata=$_POST['durata'];
                $episodio=new EEpisodio($titolo,$durata,1,$id);

                FPersistentManager::store($episodio);
                header('Location: /Progetto'.$_SESSION['location']);

            }
            else header('Location: /Progetto/Utente/homepagedef');
        }
    }

static function eliminaEpisodio($id){
    if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
    else {
        session_start();
        if ($_SESSION['utente']->getRuolo() == 'admin') {
            FPersistentManager::delete('FEpisodio',$id);
            header('Location: /Progetto'.$_SESSION['location']);
        }
        else header('Location: /Progetto/Utente/homepagedef');

    }

}

    static function eliminaStagione($id){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else {
            session_start();
            if ($_SESSION['utente']->getRuolo() == 'admin') {
                FPersistentManager::delete('FStagione',$id);
                header('Location: /Progetto'.$_SESSION['location']);
            }
            else header('Location: /Progetto/Utente/homepagedef');

        }

    }

    static function eliminaSerie($id){
        if(!CUtente::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else {
            session_start();
            if ($_SESSION['utente']->getRuolo() == 'admin') {
                $s=FPersistentManager::load('id',$id,'FSerieTv');

                FPersistentManager::delete('FSerieTv',$id);
                FPersistentManager::delete('FCopertina',$s[0]->getId_copertina());
                header('Location: /Progetto'.$_SESSION['location']);
            }
            else header('Location: /Progetto/Utente/homepagedef');

        }

    }
}