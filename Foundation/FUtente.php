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
    public static function store($utente)
    {
        $con = FConnectionDB::getIstanza();
        $con->store($utente, FUtente::$nomeClasse);
    }

    /**
     * Metodo che permette di fare la load dell'utente/i dal database
     * @param $campo campo da confrontare per trovare la riga
     * @param $valoreCampo valore del campo
     * @return $utenti array di oggetti EUtenteRegistrato
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
                    $seguaci=FPersistentManager::loadFollower($utenti[$i]->getUsername(),1);
                    $utenti[$i]->setSeguaci($seguaci);
                    $seguiti=FPersistentManager::loadFollower($utenti[$i]->getUsername(),0);
                    $utenti[$i]->setSeguiti($seguiti);
                }
            }

        return $utenti;
    }

    /**
     * Questo metodo restituisce l'oggetto utente (EUtenteRegistrato) che ha il portafoglio EPortafoglio quando effettua il login se la query è andata a buon fine, altrimenti restituisce null
     * @param string $username
     */
    public static function loadLoginPWHash($username, $pass)
    {

        $con = FConnectionDB::getIstanza();
        $riga = $con->loadVerificaAccessoPWHash($username, $pass);
        $utente = null;

        if(isset($riga))
            {
                $utente = new EUtente(
                    $riga["username"],
                    $riga["email"],$riga["password"],$riga["ruolo"]);


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
}

/**
 * Questo metodo restituisce l'oggetto utente (EUtenteRegistrato) che ha il portafoglio EPortafoglio quando effettua il login se la query è andata a buon fine, altrimenti restituisce null
 * @param string $username
 */
/*
   public static function loadLogin($username, $pass) {

       $con = FConnectionDB::getIstanza();
       $riga = $con->loadVerificaAccesso($username, $pass);
       $utente = null;

       if(isset($riga)) {
           $portafoglio = FPersistentManager::load("id", $riga["idPortafoglio"], FPortafoglio::getNomeClasse());
           $utente = new EUtenteRegistrato(
               $riga["username"],$riga["nome"],$riga["cognome"],
               $riga["email"],$riga["password"],$riga["dataNascita"]);
           $utente->setPortafoglio($portafoglio[0]);
           $utente->setStato($riga["stato"]);
           //var_dump($utente->getStato());
       }
       return $utente;
   }*/