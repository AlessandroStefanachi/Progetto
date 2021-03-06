<?php

class FUtente  {

    /*Nome della classe Foundation*/
    private static $nomeClasse = "FUtente";
    /*Nome della tabella del db*/
    private static $nomeTabella = "Utente";
    /*Campi della tabella del db*/
    private static $campiTabella = "(username, email, password, ruolo)";
    /*Campi parametrici della tabella usati dalla query per il bind*/
    private static $campiParametriciTabella = "(:username, :email, :password, :ruolo)";

    /**
     * Metodo che associa ai campi parametrici precedentemente messi nella query i valori degli attributi
     * dell'EUtenteRegistrato corrispondenti
     * @param PDOStatement $stmt
     * @param EUtente $utente che deve essere salvato sul db
     */
    public static function bind($stmt, EUtente $utente)
    {
        $stmt->bindValue(':username', $utente->getUsername(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $utente->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':password', $utente->getPassword(), PDO::PARAM_STR);
        $stmt->bindValue(':ruolo', $utente->getRuolo(), PDO::PARAM_STR);
    }

    /**
     * Metodo che permette di fare la store dell'utente, prima però bisogna fare la store del
     * portafoglio associato all'utente
     * @param EUtente $utente
     */
    public static function store(EUtente $utente)
    {
        $con = FConnectionDB::getIstanza();
        $con->store($utente, FUtente::$nomeClasse);
        $seguaci=$utente->getSeguaci();
        if($seguaci){
            $n= count($seguaci);
            for($i = 0; $i < $n; $i++)
            {

                FFollow::store($utente->getUserName(),$seguaci[$i]);

            }}
            $seguiti=$utente->getSeguiti();
            if($seguiti){
                $n= count($seguiti);
                for($i = 0; $i < $n; $i++)
                {

                    FFollow::store($seguiti[$i],$utente->getUserName());

                }}
        $visti=$utente->getVisti();
        if($visti){
            $n= count($visti);
            for($i = 0; $i < $n; $i++)
            {

                FVisto::store($utente->getUserName(),$seguiti[$i]);

            }}

                $watchlist=$utente->getWatchlist();
                if($watchlist){
                    $n= count($watchlist);
                    for($i = 0; $i < $n; $i++)
                    {
                        $watchlist[$i]->setPropietario($utente->getUserName());
                        FWatchlist::store($watchlist[$i]);

                    }

        }

    }

    /**
     * Metodo che permette di fare la load dell'utente/i dal database
     * @param $campo campo da confrontare per trovare la riga
     * @param $valoreCampo valore del campo
     * @return $utenti array di oggetti EUtente
     */
    public static function load($campo, $valoreCampo)
    {

        $con = FConnectionDB::getIstanza();
        $righe =  $con->load($campo, $valoreCampo, FUtente::$nomeTabella);
        $utenti = array();

        if($righe == NULL)
        {
            $utenti = NULL;
        }
        else
            {
            $numeroRighe = count($righe);
            for($i = 0; $i < $numeroRighe; $i++)
                {
                $utenti[$i] = new EUtente(
                    $righe[$i]["username"],
                    $righe[$i]["email"],$righe[$i]["password"],$righe[$i]["ruolo"]);

                   $seguaci=FPersistentManager::loadFollower($utenti[$i]->getUsername());
                   if($seguaci){
                       $se=array();
                       $n=count($seguaci);
                       for($b=0;$b<$n;$b++){

                           array_push($se,$seguaci[$b]["id_seguace"]);
                       }

                   $utenti[$i]->setSeguaci($se);}
                   $seguiti=FPersistentManager::loadFollowed($utenti[$i]->getUsername());
                   if($seguiti){
                       $n=count($seguiti);
                      // echo ("questo è l n".$n);
                       $se=array();
                       for($b=0;$b<$n;$b++){

                          // echo("\n"."ora pusho".$seguiti[$b]["id_seguito"]);
                           array_push($se,$seguiti[$b]["id_seguito"]);
                       }

                   $utenti[$i]->setSeguiti($se);
                   //foreach ($utenti[$i]->getSeguiti() as $value) echo ("\n"."qui ce ".$value);
                   }
                    $visti=FPersistentManager::loadvisto($utenti[$i]->getUsername());
                    if($visti){
                        $n=count($visti);
                        // echo ("questo è l n".$n);
                        $se=array();
                        for($b=0;$b<$n;$b++){

                            // echo("\n"."ora pusho".$seguiti[$b]["id_seguito"]);
                            array_push($se,$visti[$b]["id_episodio"]);
                        }

                        $utenti[$i]->setvisti($se);
                        //foreach ($utenti[$i]->getSeguiti() as $value) echo ("\n"."qui ce ".$value);
                    }


                    $watchlist=FPersistentManager::load("proprietario",$utenti[$i]->getUsername(),FWatchlist::getNomeCLasse());
                    $utenti[$i]->setWatchlist($watchlist);
                }
            }

        return $utenti;
    }

    /**
     * Questo metodo verifica il login di un utente utilizzando la password hashata
     * @param string $username
     */
    public static function loadLoginPWHash($username, $pass)
    {

        $con = FConnectionDB::getIstanza();
        $riga = $con->loadVerificaAccessoPWHash($username, $pass);
        $utente = null;

        if(isset($riga))
            {
                $u=self::load("username",$username);
                $utente =clone($u[0]);


            //var_dump($utente->getStato());
            }
        return $utente;
    }

    /**
     * Metodo che verifica l'esistenza di un campo con un certo valore
     * @param $campo campo da aggiornare
     * @param $valoreCampo valore del campo
     */
    public static function exist($campo, $valoreCampo)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->exist($campo, $valoreCampo, static::$nomeTabella);
        return $ris;
    }

    /**
     * Metodo che permette di aggiornare un campo di una tabella nel database
     * @param $campo campo da considerare/aggiornare
     * @param $nuovoValore nuovo valore da inserire
     * @param $chiave nome del campo chiave primaria della classe interessata
     * @param $id valore della chiave primaria
     * @return bool $verifica per vedere se l'update è andato a buon fine o no
     */
    public static function update($campo, $nuovoValore, $chiave, $id)
    {
        $con = FConnectionDB::getIstanza();
        $verifica = $con->update($campo, $nuovoValore, $chiave, $id, static::$nomeClasse);
        return $verifica;
    }

    /**
     * Questo metodo restituisce il nome della classe per la costruzione delle query
     * @return string $nomeClasse nome della classe
     */
    public static function getNomeClasse()
    {
        return self::$nomeClasse;
    }

    /**
     * Questo metodo restituisce il nome della tabella per la costruzione delle query
     * @return string $nomeTabella nome della tabella
     */
    public static function getNomeTabella()
    {
        return self::$nomeTabella;
    }

    /**
     * Questo metodo restituisce i campi della tabella per la costruzione delle query
     * @return string $campiTabella campi della tabella
     */
    public static function getCampiTabella()
    {
        return self::$campiTabella;
    }

    /**
     * Questo metodo restituisce i campi parametrici della tabella per la costruzione delle query
     * @return string $campiParametriciTabella campi parametrici della tabella
     */
    public static function getCampiParametriciTabella()
    {
        return self::$campiParametriciTabella;
    }
/*
 * metodo che permette di estrarre tutte le istanze dalla tabella utente
 */
    public static function loadAll(){
        $con = FConnectionDB::getIstanza();
        $righe =  $con->loadAll( FUtente::$nomeTabella);
        $utenti = array();

        if($righe == NULL)
        {
            $utenti = NULL;
        }
        else
        {
            $numeroRighe = count($righe);
            for($i = 0; $i < $numeroRighe; $i++)
            {
                $utenti[$i] = new EUtente(
                    $righe[$i]["username"],
                    $righe[$i]["email"],$righe[$i]["password"],$righe[$i]["ruolo"]);

                $seguaci=FPersistentManager::loadFollower($utenti[$i]->getUsername());
                if($seguaci){
                    $se=array();
                    $n=count($seguaci);
                    for($b=0;$b<$n;$b++){

                        array_push($se,$seguaci[$b]["id_seguace"]);
                    }

                    $utenti[$i]->setSeguaci($se);}
                $seguiti=FPersistentManager::loadFollowed($utenti[$i]->getUsername());
                if($seguiti){
                    $n=count($seguiti);
                    // echo ("questo è l n".$n);
                    $se=array();
                    for($b=0;$b<$n;$b++){

                        // echo("\n"."ora pusho".$seguiti[$b]["id_seguito"]);
                        array_push($se,$seguiti[$b]["id_seguito"]);
                    }

                    $utenti[$i]->setSeguiti($se);
                    //foreach ($utenti[$i]->getSeguiti() as $value) echo ("\n"."qui ce ".$value);
                }
                $visti=FPersistentManager::loadvisto($utenti[$i]->getUsername());
                if($visti){
                    $n=count($visti);
                    // echo ("questo è l n".$n);
                    $se=array();
                    for($b=0;$b<$n;$b++){

                        // echo("\n"."ora pusho".$seguiti[$b]["id_seguito"]);
                        array_push($se,$visti[$b]["id_episodio"]);
                    }

                    $utenti[$i]->setvisti($se);
                    //foreach ($utenti[$i]->getSeguiti() as $value) echo ("\n"."qui ce ".$value);
                }


                $watchlist=FPersistentManager::load("proprietario",$utenti[$i]->getUsername(),FWatchlist::getNomeCLasse());
                $utenti[$i]->setWatchlist($watchlist);
            }
        }

        return $utenti;

    }
/*
 * metodo per cancellare un'istanza dalla tabella utente
 */
    public static function delete($id)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->delete(static::getNomeTabella(),$id,'username');
        return $ris;
    }
}

