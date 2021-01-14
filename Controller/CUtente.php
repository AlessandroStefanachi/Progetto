<?php


class CUtente
{


static function homepagedef(){

    if(static::verificalogin())header('Location: /Progetto/Utente/homelog');
    else{
    session_start();
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




    static function homelog($genere){
        if(!static::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            session_start();
            if(isset($_SESSION['location']))unset($_SESSION['location']);
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
        $view->showHomelog($res[0],$res[1],$_SESSION["followed"],$generi,$genere,$watch[0],$watch[1],$watch[2],$id,$watchlist,$_SESSION['utente']->getUsername());}

    }

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


    static function verificaRegistrazione() {
          session_start();
        if(FPersistentManager::exist("username",$_POST["username"],"FUtente") == null
            && FPersistentManager::exist("email",$_POST["email"],"FUtente") == null) {
            $utente = new EUtente($_POST["username"],
                $_POST["email"],
                password_hash($_POST["password"], PASSWORD_DEFAULT), //non prende l hash
            //$_POST["password"],
            "test"
                );
            FPersistentManager::store($utente);
            $_SESSION["utente"] = $utente;
            header('Location: /Progetto/Utente/homepagedef');
        }else {

            //$view = new VUtente();
            //$res=FPersistentManager::homepagedef();
            //$view->erroreregistarzione(true,$res[0],$res[1]);
            $_SESSION["regerror"]=true;
            header('Location: /Progetto/Utente/homepagedef');
        }
    }

    static function login(){  session_start();
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST["username"]) && isset($_POST["password"])) {
                $utente = FPersistentManager::loadLoginPWHash($_POST["username"], $_POST["password"]);
                //var_dump($utente->getStato());
                if ($utente != null ) { //verifica se l'utente esiste e se non è bannato (true)
                    echo(count($utente->getSeguiti()));
                    $_SESSION["utente"] = $utente;
                    $_SESSION["followed"]=$utente->getSeguiti();

                    if($utente->getRuolo() == "a") {
                        header('Location: /WeBetting/Admin/homepage');
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

    static function verificalogin(){
    
       session_start();
        //session_unset();
       // setcookie("PHPSESSID", "", time() - 3600, "/");
        //session_destroy();


        if (isset($_SESSION['utente'])){session_abort();return true;}
        else {session_abort();return false;}
    }

    static function logout(){
        session_start(); // recupera i parametri di sessione
        setcookie("PHPSESSID", "", time() - 3600, "/"); //Elimino il cookie di sessione
        session_unset(); // rimuove le variabili di sessione
        session_destroy(); // distrugge la sessione
        header('Location: /Progetto/Utente/homepagedef');
    }

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

    static function unfollow($followed){

        if(!static::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            session_start();
            FPersistentManager::deleteFollow($followed,$_SESSION['utente']->getUserName());
            $pos=array_search($followed,$_SESSION['followed']);
            unset($_SESSION['followed'][$pos]);
            if(isset($_SESSION['location'])){
                if(stripos($_SESSION['location'],'user')!==false) header('Location: /Progetto/Utente'.$_SESSION['location']);
                else header('Location: /Progetto/Utente/homelog');
            }
            else{
            header('Location: /Progetto/Utente/homelog');}
        }

    }
    static function follow($followed){

        if(!static::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            session_start();
            if(!FPersistentManager::existFollow($followed,$_SESSION['utente']->getUserName())&&FPersistentManager::exist('username',$followed,'FUtente')){
            FPersistentManager::storeFollower($followed,$_SESSION['utente']->getUserName());
            array_push($_SESSION['followed'],$followed);
            }
            if(isset($_SESSION['location'])){
                if(stripos($_SESSION['location'],'user')!==false) header('Location: /Progetto/Utente'.$_SESSION['location']);
                else header('Location: /Progetto/Utente/homelog');
            }
            else{
                header('Location: /Progetto/Utente/homelog');}

        }

    }

    static function shortadding($id){
        if(!static::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
        session_start();
        $_SESSION['id_add']=$id;
        header('Location: /Progetto/Utente/homelog');
        }

    }

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
            $_SESSION['location']='/user?id='.$username;
                $view = new VUtente();
                $view->ownProfile($utente,$self,$seguiti,$pwedit,$emailedit,$usernameedit);


        }
    }

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

    static function modificaUsername(){
        if(!static::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            session_start();
            if($_SERVER['REQUEST_METHOD'] == "GET")header('Location: /Progetto/Utente/homepagedef');
            else{
                $utenteDB = FPersistentManager::loadLoginPWHash($_SESSION['utente']->getUsername(), $_POST["password"]);
                $check=FPersistentManager::exist("username",$_POST["username"],"FUtente");
                if($utenteDB != null&&$check==null) {

                    FPersistentManager::update("username", $_POST["username"], "username", $_SESSION['utente']->getUsername(), "FUtente");
                    $_SESSION['utente']->setUsername($_POST["username"]);
                    $_SESSION['usernameedit']=true;

                }
                else $_SESSION['usernameedit']=false;

                header('Location: /Progetto/Utente/user?id='.$_SESSION['utente']->getUsername());
            }
        }
    }
}