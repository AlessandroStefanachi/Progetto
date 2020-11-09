<?php

class FPersistentManager
{

    /**
     *Metodo che permette di salvare un oggetto sul db
     * @param $oggetto oggetto da salvare
     */
    public static function store($oggetto)
    {
        $EClass = get_class($oggetto);
        $FClass = str_replace('E', 'F', $EClass);
        $FClass::store($oggetto);
    }

    /**
     *Metodo che permette di prelevare uno o più oggetti dal db
     * @param $campo campo della tabella interessata
     * @param $valoreCampo il valore del campo
     * @param $nomeClasse il nome della classe foundation da richiamare per prelevare l'/gli oggetto/i
     * @return
     */
    public static function load($campo, $valoreCampo, $nomeClasse)
    {
        $risultato = $nomeClasse::load($campo, $valoreCampo);
        return $risultato;
    }


    /**
     *Metodo che permette di prelevare un utente registrato dal db
     *richiamando però il metodo che verifica la corrispondenza della password inserita(in chiaro)
     *tramite post e la password hashata nel db
     * @param $username
     * @param $pass
     * @return EUtente|null
     */
    public static function loadLoginPWHash($username, $pass)
    {
        $risultato = null;
        $risultato = FUtente::loadLoginPWHash($username, $pass);
        return $risultato;
    }

    /** verifica è boolean e ci dice se la richiesta di update è andata a buon fine */
    public static function update($campo, $nuovoValore, $chiave, $id, $nomeClasse)
    {

        ////////////////////////////DA MODIFICARE CON LE CLASSI DI TVTRACKER///////////////////////////////////////////////
        if ($nomeClasse == "FWatchlist" || $nomeClasse == "FUtente" || $nomeClasse == "FEpisodio"
            || $nomeClasse == "FStagione" || $nomeClasse == "FSerieTv") {
            $verifica = $nomeClasse::update($campo, $nuovoValore, $chiave, $id);
            return $verifica;
        } else return false;
    }

    /**
     * Metodo che accerta l'esistenza di un valore di un campo passato come parametro
     * @param $campo da testare
     * @param $vaoreCampo ,valore da cercare
     * @param $nomeClasse , nome della classe Foundation interessata
     * @return null
     */
    public static function exist($campo, $valoreCampo, $nomeClasse)
    {
        $risultato = null;
        $risultato = $nomeClasse::exist($campo, $valoreCampo);
        return $risultato;
    }

    /*Metodo che permette di cancellare un commento dato l'id*/
    public static function deleteCommento($id)
    {
        $verifica = null;
        $verifica = FCommento::deleteCommento($id);
        return $verifica;
    }

    public static function loadFollower($idA)
    {
        $follower = FFollow::load($idA);
        return $follower;

    }

    public static function loadFollowed($idA, int $select)
    {
        $follower = FFollow::load($idA, $select);
        return $follower;

    }

    public static function storeFollower($idA, $idB)
    {
        FFollow::store($idA, $idB);
    }

    public static function loadCorrispondenze($id_watchlist)
    {
        $corrispondenze = FCorrispondenze::load($id_watchlist);
        return $corrispondenze;

    }

    public static function storeCorrispondenze($id_watchlist, $id_stv)
    {
        FCorrispondenze::store($id_watchlist, $id_stv);

    }

    public static function loadGenere($id_genere)
    {
        $genere = FGenere::load($id_genere);
        return $genere;
    }

    public static function storeGenere($genere, $id)
    {
        FGenere::store($genere, $id);

    }

    public static function loadLingua($id_lingua)
    {
        $lingua = FLingua::load($id_lingua);
        return $lingua;
    }

    public static function storeLingua($lingua, $id)
    {
        FLingua::store($lingua, $id);

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