<?php


class CFrontController {

    public function run($path) {

        $resource = explode('/', $path);
        $arrayDim = count($resource);

        array_shift($resource);

        if($arrayDim <= 5) { //(1) verifico se ci sono troppi parametri nel link
            array_shift($resource);
            $controller = "C" .  array_shift($resource); ///COSTRUISCO IL NOME DELLA CLASSE NELLA DIRECTORY CONTROLL
            $arrayDir = scandir('Controller');//PRENDO TUTTI I FILE IN CONTROLLER

            if (in_array($controller . ".php", $arrayDir)) { //(2) SE TRA I FILE ESISTE LA CLASSE ASSEMBLATA PRIMA
                if (class_exists($controller)) {// (3) VERIFICA LA CLASSE
                    $function = array_shift($resource);// VERIFICA CHE IN QUELLA CLASSE SIA PRESENTE UN METODO
                    if(method_exists($controller, $function)) {//(4)
                        if(empty($resource)) {//(5)
                            /////
                            ///
                            ///
                            if($function=='homelog'){$controller::$function('empty');}
                            else{
                            $controller::$function();}//SE NON CI SONO ALTRI ELEMENTI NELL'ARRAY ALLORA NON C'È NESSUN ID O PAROLA CHIAVE LANCIO LA FUNZIONE
                        }//(5)
                        elseif($function == "partita" || $function == "inserisciCommento" || $function == "modificaPartita" || $function == "HomeSport") {//(6) // SE CI SONO ALTRI ELEMENTI ALLORA LA FUNZIONE DEVE
                            $controller::$function($resource[0]); //resource[0] è l'id della partita o una parola chiave                                   // DEVE ESSERE UNA DI QUESTE CHE NECESSITÀ DI ID
                        }else static::errore();//(6) se l'array non è vuoto ma la funzione non è una  fra quelle allora errore
                    }else {
                        if(substr_count($function,"?")==1 && substr_count($function,"=")==1){
                            $options=explode('?',$function);
                            $function=array_shift($options);
                            //echo("\n".$method);
                            $options=explode('=',$options[0]);
                            array_shift($options);
                            $opzione=$options[0];
                            //echo("\n".$opzione);
                            if(method_exists($controller,$function))
                                $controller::$function($opzione);
                            else{static::errore();}
                        }
                        else
                        static::errore();//(4) se il metodo non esiste errore
                    }
                }else static::errore();//(3) se la classe non esiste errore
            }//(2) la classe non esiste setta l'header
            else {
                header('Location: /Progetto/Utente/homepagedef');
                //static::errore();
              // $smarty=SetupSmarty::configura();
                //$smarty->display("errore.tpl");

            }
        }else static::errore();
    }

    static function errore() {
        $view = new VErrore();
        $view->errore();
        exit;
    }
}