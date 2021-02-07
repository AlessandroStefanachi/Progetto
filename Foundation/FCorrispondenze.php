<?php

/*
 * classe associata alla tabella Corrispondenze che nasce dalla relazone N-N tra watchlist e serie tv
 *
 */
class FCorrispondenze
{
    /*
     * metodo per estrarre le occorrenze della tabella corrispondenze in base all'id watchlist
     */
    public static function load($id_watchlist)
    {
        $righe = null;
        $con = FConnectionDB::getIstanza();

            $righe = $con->loadCorr($id_watchlist);

        return $righe;
    }
/*
 * metodo per inserire un occorrenza nella tabella corrispondenze
 */
    public static function store($id_watchlist,$id_stv)
    {
        $con = FConnectionDB::getIstanza();
        $con->storeCorr($id_watchlist,$id_stv);
    }
/*
 * metodo per verificare l'esistenza di un'occorrenza nella tabella corrispondenze
 */
    public static function existcorr($id_w, $id_s)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->existCorr($id_w,$id_s);
        return $ris;
    }
/*
 * metodo per eliminare un'occorrenza dalla tabella corrispondenze
 */
    public static function delete($watch, $serie)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->deleteCorrispondenze($watch,$serie);
        return $ris;
    }
}