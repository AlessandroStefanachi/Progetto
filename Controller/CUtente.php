<?php
/*
 * questa classe implementa le funzioni che permettono all'utente di utilizzare l applicativo
 */

class CUtente
{
/*
 * funzione che permette di visualizzare la pagina di login ed eventuali errori in fase di login o in fase di registrazione
 */

static function homepagedef(){

    if(static::verificalogin())header('Location: /Progetto/Utente/homelog');
    else{
    session_start();
    if(isset($_SESSION['utente'])){
        if($_SESSION['utente']->getRuolo()=='banned')header('Location: /Progetto/Utente/banned');
    }
    $view = new VUtente();
    $res=FPersistentManager::homepagedef();

        if(isset($_SESSION["logerror"])){
            unset($_SESSION["logerror"]);
    $view->showHome($res[0],$res[1],true,false);}
        elseif (isset($_SESSION["regerror"])){
            unset($_SESSION["regerror"]);
            $view->showHome($res[0],$res[1],false,true);}
        else{
            $view->showHome($res[0],$res[1],false,false);}
        }

        }

/*
 * funzione che permette di visualizzare l homepage dopo essersi loggati/registrati con eventuali opzioni di filtro in base al genere
 */


    static function homelog($genere){
        if(!static::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            session_start();
            if(isset($_SESSION['location'])&&$_SESSION['location']!='banned')unset($_SESSION['location']);
            else{if(isset($_SESSION['location']))header('Location: /Progetto/Utente/banned');}
            if(isset($_SESSION['order']))$order=$_SESSION['order'];
            else $order=null;
            $generi=FPersistentManager::AllGenere();
            if($genere=='empty'){
                if(isset($_SESSION['genere']))unset($_SESSION['genere']);
            $res=FPersistentManager::AllSeries($order);
        }
            else{
                if(FPersistentManager::exist('genere',$genere,'FGenere')){
                    $_SESSION['genere']=$genere;
                    $res=FPersistentManager::filter($genere,$order);
                }
                else{CFrontController::errore();}
            }
            $watch=FPersistentManager::watches();
            if(isset($_SESSION['id_add'])){
                $id=$_SESSION['id_add'];
                $watchlist=$_SESSION['utente']->getWatchlist();
                $_SESSION['adding']=$id;
                unset($_SESSION['id_add']);
            }
            else{ $id=null;$watchlist=null;}
            if (!isset($_SESSION['followed']))$_SESSION['followed']=array();
        $view = new VUtente();
        $view->showHomelog($res[0],$res[1],$_SESSION["followed"],$generi,$genere,$watch[0],$watch[1],$watch[2],$id,$watchlist,$_SESSION['utente']);}

    }
/*
 * funzione che verifica che il metodo di registrazione sia post e richiama poi la funzione che effettua la registrazione
 */
    static function registrazione() {

        if($_SERVER['REQUEST_METHOD'] == "GET")
        { header('Location: /Progetto/Utente/homepagedef');
            if(CUtente::verificalogin()){header('Location: /Progetto/Utente/homelog');}
            else{header('Location: /Progetto/Utente/homepagedef');}
        }
        elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
            static::verificaRegistrazione();
        }
    }

/*
 * funzioche che verifica la correttezza dei dati in fase di registrazione ed in caso di non riuscita visualizza la pagina di login con errore di registrazione
 */
    static function verificaRegistrazione() {
          session_start();
        if(FPersistentManager::exist("username",$_POST["username"],"FUtente") == null
            && FPersistentManager::exist("email",$_POST["email"],"FUtente") == null) {
            if($_POST["username"]=='admin')$ruolo='admin';
                else $ruolo='utente';
            $utente = new EUtente($_POST["username"],
                $_POST["email"],
                password_hash($_POST["password"], PASSWORD_DEFAULT), //non prende l hash
            //$_POST["password"],
            $ruolo
                );
            FPersistentManager::store($utente);
            $_SESSION["utente"] = $utente;
            $_SESSION["followed"]=null;
            $_SESSION["visti"]=null;
            $_SESSION["watchlist"]=null;
            header('Location: /Progetto/Utente/homepagedef');
        }else {

            //$view = new VUtente();
            //$res=FPersistentManager::homepagedef();
            //$view->erroreregistarzione(true,$res[0],$res[1]);
            $_SESSION["regerror"]=true;
            header('Location: /Progetto/Utente/homepagedef');
        }
    }
/*
 * funzione che verifica che i dati inseriti in fase di login siano corretti ed effettua il login o ritorna alla pagina di login con relativo errore
 */
    static function login(){  session_start();
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST["username"]) && isset($_POST["password"])) {
                $utente = FPersistentManager::loadLoginPWHash($_POST["username"], $_POST["password"]);
                //var_dump($utente->getStato());
                if ($utente != null ) { //verifica se l'utente esiste e se non è bannato (true)
                    echo(count($utente->getSeguiti()));
                    $_SESSION["utente"] = $utente;
                    $_SESSION["followed"]=$utente->getSeguiti();
                    $_SESSION["visti"]=$utente->getVisti();
                    $_SESSION["watchlist"]=$utente->getWatchlist();
                   // $_SESSION['voti']=FPersistentManager::load('autore',$utente->getUsername(),'FValutazione');
                    if($utente->getRuolo() == "banned") {
                        $_SESSION['location']='banned';
                        header('Location: /Progetto/Utente/banned');
                    }
                    else header('Location: /Progetto/Utente/homelog');
                }else {
                    $_SESSION["logerror"]=true;
                    header('Location: /Progetto/Utente/homepagedef');
                }
            }else {//$view = new VUtente();
                //$res=FPersistentManager::homepagedef();
               //$view->errorerelog(true,$res[0],$res[1]);
                $_SESSION["logerror"]=true;;
                header('Location: /Progetto/Utente/homepagedef');
            }
        }
        else{
            //header('Location: /Progetto/Utente/homepagedef');
            if(CUtente::verificalogin()){header('Location: /Progetto/Utente/homelog');}
            else{header('Location: /Progetto/Utente/homepagedef');}
        }
    }
/*
 * funzione che mostra agli utenti bannati la relativa pagina con messaggio di ban
 */
    static function banned(){
    session_start();
    $v=new VUtente();
    $v->banned($_SESSION['utente']);
    }
/*
 * funzione che verifica che un utente sia loggato o bannato
 */
    static function verificalogin(){
    
       session_start();
        //session_unset();
       // setcookie("PHPSESSID", "", time() - 3600, "/");
        //session_destroy();


        if (isset($_SESSION['utente'])){
            if($_SESSION['utente']->getRuolo()=='banned'){
                $_SESSION['location']='banned';
                session_abort();
                return false;
            }
            else{
            session_abort();return true;}}
        else {session_abort();return false;}
    }
/*
 * funzione che effettua il logout e quindi distrugge la sessione corrente
 */
    static function logout(){
        session_start(); // recupera i parametri di sessione
        setcookie("PHPSESSID", "", time() - 3600, "/"); //Elimino il cookie di sessione
        session_unset(); // rimuove le variabili di sessione
        session_destroy(); // distrugge la sessione
        header('Location: /Progetto/Utente/homepagedef');
    }
/*
 * funzione che permette di visualizzare le serie da quella con la valutazione più alta a quella più bassa
 */
    static function crs(){
    session_start();
    if(isset($_SESSION['order'])){
        if($_SESSION['order']=='crescente') unset($_SESSION['order']);
        else $_SESSION['order']='crescente';
    }
    else $_SESSION['order']='crescente';

        if(isset($_SESSION['genere']))header('Location: /Progetto/Utente/homelog?genere='.$_SESSION['genere']);
        else
            header('Location: /Progetto/Utente/homelog');
    }
    /*
     * funzione che permette di visualizzare le serie da quella con la valutazione più bassa a quella più alta
     */
    static function decr(){
        session_start();
        if(isset($_SESSION['order'])){
            if($_SESSION['order']=='decrescente') unset($_SESSION['order']);
            else $_SESSION['order']='decrescente';
        }
        else $_SESSION['order']='decrescente';
        if(isset($_SESSION['genere']))header('Location: /Progetto/Utente/homelog?genere='.$_SESSION['genere']);
        else
        header('Location: /Progetto/Utente/homelog');
    }
/*
 * funzione che permette di unfolloware un utente
 */
    static function unfollow($followed){

        if(!static::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            session_start();
            FPersistentManager::deleteFollow($followed,$_SESSION['utente']->getUserName());
            $pos=array_search($followed,$_SESSION['followed']);
            unset($_SESSION['followed'][$pos]);
            if(isset($_SESSION['location'])){
                if(stripos($_SESSION['location'],'user')!==false) header('Location: /Progetto'.$_SESSION['location']);//loc mod
                else header('Location: /Progetto/Utente/homelog');
            }
            else{
            header('Location: /Progetto/Utente/homelog');}
        }
/*
 * funzione che permette di seguire un utente
 */
    }
    static function follow($followed){

        if(!static::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            session_start();
            if(!FPersistentManager::existFollow($followed,$_SESSION['utente']->getUserName())&&FPersistentManager::exist('username',$followed,'FUtente')&&$_SESSION['utente']->getUsername()!=$followed){
            FPersistentManager::storeFollower($followed,$_SESSION['utente']->getUserName());
            array_push($_SESSION['followed'],$followed);
            }
            if(isset($_SESSION['location'])){
                if(stripos($_SESSION['location'],'user')!==false) header('Location: /Progetto'.$_SESSION['location']);//loc mod
                else header('Location: /Progetto/Utente/homelog');
            }
            else{
                header('Location: /Progetto/Utente/homelog');}

        }

    }
/*
 * funzione che permette l'inserimento rapido di una serie tv dalla home
 */
    static function shortadding($id){
        if(!static::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
        session_start();
        $_SESSION['id_add']=$id;
        if(isset($_SESSION['location'])) header('Location: /Progetto'.$_SESSION['location']);
        else
        header('Location: /Progetto/Utente/homelog');
        }

    }
/*
 * funzione che permette di visualizzare il proprio profilo o quello di un altro utente
 */
    static function user($username){
        if(!static::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            session_start();
            $self=array();
            if($_SESSION['utente']->getUsername()==$username) {

                if (isset($_SESSION['pwedit'])) {
                    $pwedit = $_SESSION['pwedit'];
                    unset($_SESSION['pwedit']);
                } else {
                    $pwedit = null;
                }

                if (isset($_SESSION['emailedit'])) {
                    $emailedit = $_SESSION['emailedit'];
                    unset($_SESSION['emailedit']);
                } else {
                    $emailedit = null;
                }

                if (isset($_SESSION['usernameedit'])) {
                    $usernameedit = $_SESSION['usernameedit'];
                    unset($_SESSION['usernameedit']);
                } else {
                    $usernameedit = null;
                }
                  $self[0]=true;
                $utente=$_SESSION['utente'];
                $seguiti=$_SESSION['followed'];
            }
            else{
                if(FPersistentManager::exist('username',$username,'FUtente')!=null){
                    $utente=FPersistentManager::load('username',$username,"FUtente");
                    $utente=clone($utente[0]);
                    $self[0]=false;
                    $self[1]=$_SESSION['utente']->getUsername();
                    $pwedit=null;
                    $emailedit=null;
                    $usernameedit=null;
                    $seguiti=null;
                }

                else{CFrontController::errore();}
            }
            $_SESSION['location']='/Utente/user?id='.$username;
                $view = new VUtente();
                $view->ownProfile($utente,$self,$seguiti,$pwedit,$emailedit,$usernameedit,$_SESSION['watchlist']);


        }
    }
/*
 * funzione che permette di modificare la password
 */
    static function modificaPassword(){
        if(!static::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            session_start();
            if($_SERVER['REQUEST_METHOD'] == "GET")header('Location: /Progetto/Utente/homepagedef');
            else{
                $utenteDB = FPersistentManager::loadLoginPWHash($_SESSION['utente']->getUsername(), $_POST["PwPassword"]);
                if($utenteDB != null) {
                    $hashPW = password_hash($_POST["NewPassword"], PASSWORD_DEFAULT);
                    FPersistentManager::update("password", $hashPW, "username", $_SESSION['utente']->getUsername(), "FUtente");
                    $_SESSION['utente']->setPassword($hashPW);
                    $_SESSION['pwedit']=true;

                }
                else $_SESSION['pwedit']=false;

                header('Location: /Progetto/Utente/user?id='.$_SESSION['utente']->getUsername());
            }
        }
    }
/*
 * funzione che permette di modificare l'email
 */
    static function modificaEmail(){
        if(!static::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            session_start();
            if($_SERVER['REQUEST_METHOD'] == "GET")header('Location: /Progetto/Utente/homepagedef');
            else{
                $utenteDB = FPersistentManager::loadLoginPWHash($_SESSION['utente']->getUsername(), $_POST["password"]);
                $check=FPersistentManager::exist("email",$_POST["email"],"FUtente");
                if($utenteDB != null&&$check==null) {

                    FPersistentManager::update("email", $_POST["email"], "username", $_SESSION['utente']->getUsername(), "FUtente");
                    $_SESSION['utente']->setEmail($_POST["email"]);
                    $_SESSION['emailedit']=true;

                }
                else $_SESSION['emailedit']=false;

                header('Location: /Progetto/Utente/user?id='.$_SESSION['utente']->getUsername());
            }
        }
    }
/*
 * funzione che permette di modificare lo username
 */
    static function modificaUsername(){
        if(!static::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            session_start();
            if($_SERVER['REQUEST_METHOD'] == "GET")header('Location: /Progetto/Utente/homepagedef');
            else{
                $utenteDB = FPersistentManager::loadLoginPWHash($_SESSION['utente']->getUsername(), $_POST["password"]);
                //FPersistentManager::exist("username",$_POST["username"],"FUtente");
                if($utenteDB != null&&!FPersistentManager::exist("username",$_POST["username"],"FUtente")) {

                   // FPersistentManager::update("username", $_POST["username"], "username", $_SESSION['utente']->getUsername(), "FUtente");
                    FPersistentManager::update('username',$_POST['username'],'username',$_SESSION['utente']->getUsername(),'FUtente');
                    $_SESSION['utente']->setUsername($_POST["username"]);
                    $_SESSION['usernameedit']=true;

                }
                else $_SESSION['usernameedit']=false;

                header('Location: /Progetto/Utente/user?id='.$_SESSION['utente']->getUsername());
            }
        }
    }
}