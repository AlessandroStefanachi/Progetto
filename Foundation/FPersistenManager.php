<?php

class FPersistentManager {

    /**
     *Metodo che permette di salvare un oggetto sul db
     *@param $oggetto oggetto da salvare
     */
    public static function store($oggetto) {
        $EClass = get_class($oggetto);
        $FClass = str_replace('E', 'F', $EClass);
        $FClass::store($oggetto);
    }

    /**
     *Metodo che permette di prelevare uno o più oggetti dal db
     *@param $campo campo della tabella interessata
     *@param $valoreCampo il valore del campo
     *@param $nomeClasse il nome della classe foundation da richiamare per prelevare l'/gli oggetto/i
     */
    public static function load($campo, $valoreCampo, $nomeClasse) {
        $risultato = $nomeClasse::load($campo, $valoreCampo);
        return $risultato;
    }



    /**
     *Metodo che permette di prelevare un utente registrato dal db
     *richiamando però il metodo che verifica la corrispondenza della password inserita(in chiaro)
     *tramite post e la password hashata nel db
     *@param $username
     *@param $pass è la password
     */
    public static function loadLoginPWHash($username, $pass) {
        $risultato = null;
        $risultato = FUtenteRegistrato::loadLoginPWHash($username, $pass);
        return $risultato;
    }

    /** verifica è boolean e ci dice se la richiesta di update è andata a buon fine */
    public static function update($campo, $nuovoValore, $chiave, $id, $nomeClasse) {

        ////////////////////////////DA MODIFICARE CON LE CLASSI DI TVTRACKER///////////////////////////////////////////////
        if($nomeClasse == "FPartita" || $nomeClasse == "FUtenteRegistrato" || $nomeClasse == "FPortafoglio"
            || $nomeClasse == "FScommessa" || $nomeClasse == "FSchedina") {
            $verifica = $nomeClasse::update($campo, $nuovoValore, $chiave, $id);
            return $verifica;
        } else return false;
    }

    /**
     * Metodo che accerta l'esistenza di un valore di un campo passato come parametro
     * @param $campo da testare
     * @param $vaoreCampo ,valore da cercare
     * @param $nomeClasse, nome della classe Foundation interessata
     */
    public static function exist($campo, $valoreCampo, $nomeClasse) {
        $risultato = null;
        $risultato =  $nomeClasse::exist($campo, $valoreCampo);
        return $risultato;
    }

    /*Metodo che permette di cancellare un commento dato l'id*/
    public static function deleteCommento($id) {
        $verifica = null;
        $verifica = FCommento::deleteCommento($id);
        return $verifica;
    }
}

/**
Metodo che permette di prelevare un utente registrato dal db
richiamando però il metodo che verifica la corrispondenza della password inserita(in chiaro)
tramite post e la password in chiaro nel db
@param $username
@param $pass è la password
 */
/*
public static function loadLogin($username, $pass) {
    $risultato = null;
    $risultato = FUtenteRegistrato::loadLogin($username, $pass);
    return $risultato;
}
*/