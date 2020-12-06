<?php


class CUtente
{
static function homepagedef(){
    $view = new VUtente();
    session_start();
    $view->showHome();

}

    static function registrazione() {
        session_start();
        if($_SERVER['REQUEST_METHOD'] == "GET")
        {
             if (0)echo("A");
            //if(static::verificaSeLoggato()) header('Location: /WeBetting/Utente/home');
            else
                {
                $view = new VErrore();
                $view->errore();
            }
        }
        elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
            static::verificaRegistrazione();
        }
    }


    static function verificaRegistrazione() {

        if(FPersistentManager::exist("username",$_POST["username"],"FUtente") == null
            && FPersistentManager::exist("email",$_POST["email"],"FUtente") == null) {
            $utente = new EUtente($_POST["username"],
                $_POST["email"],
                //password_hash($_POST["password"], PASSWORD_DEFAULT), //non prende l hash
            $_POST["password"],
            "test"
                );
            FPersistentManager::store($utente);
            $_SESSION["utente"] = $utente;
            header('Location: /Progetto/Utente/homepagedef');
        }else {
            $view = new VUtente();
            $view->erroreregistarzione(true);
        }
    }
}