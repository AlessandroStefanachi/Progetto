<?php
/*
 * classe associata alla tabella TVgenere associata alla relazione N-N tra SerieTv e genere
 */

class FTVgenere
{
    /*
     * metodo utilizzato per estrarre le occorrenze della tabella TVgenere in base all id  di una serie Tv
     */
    public static function load($id)
    {
        $righe = null;
        $con = FConnectionDB::getIstanza();

        $righe = $con->loadTVgenere($id);

        return $righe;
    }
    /*
     * metodo utilizzato per le occorrenze della tabella TVgenere in base ad un genere specifico
     */
    public static function loadbygen($id)
    {
        $righe = null;
        $con = FConnectionDB::getIstanza();

        $righe = $con->loadGenereTv($id);

        return $righe;
    }
    /*
     * metodo utilizzato per inserire un'occorrenza nella tabella TVgenere
     */
    public static function store($id_genere,$id_serie)
    {
        $con = FConnectionDB::getIstanza();
        $con->storeTVgenere($id_genere, $id_serie);
    }
/*
 * metodo utilizzato per rimuovere un'occorrenza dalla tabella TVgenere
 */
    public static function delete($id_genere,$id_serie)
    {
        $con = FConnectionDB::getIstanza();
        $con->deleteTvGenere($id_genere, $id_serie);
    }

}