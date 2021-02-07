<?php
/*
 * classe associata alla tabella lingue
 */

class FGenere
{
    /*nome della tabella
    */
    private static $nomeTabella = "genere";
    public static function load($genere)
    {
        $righe = null;
        $con = FConnectionDB::getIstanza();
        $righe = $con->loadGenere($genere);
        return $righe;
    }
/*
 * metodo per inserire un'occorrenza nella tabella genere
 */
    public static function store($genere)
    {
        $con = FConnectionDB::getIstanza();
        $con->storeGenere($genere);
    }
/*
 * metodo per estrarre tutte le occorrenze dalla tabella genere
 */
    public static function loadAll()
    {
        $con = FConnectionDB::getIstanza();
        $righe =  $con->loadAll(FGenere::$nomeTabella);
        return $righe;
    }
/*
 * metodo per eliminare un'occorrenza
 */
    public static function delete($id)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->delete(static::$nomeTabella,$id,'genere');
        return $ris;
    }
/*
 * metodo per verificare l'esistenza di un'occorrenza nella tabella genere
 */

    public static function exist($campo, $valoreCampo)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->exist($campo, $valoreCampo, static::$nomeTabella);
        return $ris;
    }

}