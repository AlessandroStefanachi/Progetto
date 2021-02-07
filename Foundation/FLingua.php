<?php
/*
 * classe associata alla tabella lingua
 */

class FLingua
{
    /*
     * nome della tabella
     */
    private static $nomeTabella = "lingua";
    /*
     * metodo per estrarre un'occorrenza nella tabella
     */
    public static function load($lingua)
    {
        $righe = null;
        $con = FConnectionDB::getIstanza();
        $righe = $con->loadLingua($lingua);
        return $righe;
    }
/*
 * metodo per inserire un occorrenza nella tabella
 */
    public static function store( $lingua)
    {
        $con = FConnectionDB::getIstanza();
        $con->storeLingua( $lingua);
    }
/*
 * metodo per estrarre tutte le occorrenze dalla tabella lingua
 */
    public static function loadAll()
    {
        $con = FConnectionDB::getIstanza();
        $righe =  $con->loadAll(FLingua::$nomeTabella);
        return $righe;
    }
/*
 * metodo per cancellare un'occorrenza dalla tabella lingua
 */
    public static function delete($id)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->delete(static::$nomeTabella,$id,'lingua');
        return $ris;
    }
/*
 * metodo per verificare l'esistenza di un occorrenza nella tabella lingya
 */
    public static function exist($campo, $valoreCampo)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->exist($campo, $valoreCampo, static::$nomeTabella);
        return $ris;
    }

}