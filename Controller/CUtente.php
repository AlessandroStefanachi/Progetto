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




    static function homelog(){
        if(!static::verificalogin())header('Location: /Progetto/Utente/homepagedef');
        else{
            session_start();
            $res=FPersistentManager::AllSeries();
        $view = new VUtente();
        $view->showHomelog($res[0],$res[1],$_SESSION["utente"]->getSeguiti());}

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
}