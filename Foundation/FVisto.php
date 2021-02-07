<?php

/*
 * classe associata alla tabella visto che nasce dalla relazione N-N tra Utente ed episodio
 */
class FVisto
{
    /*
     * metodo per estrarre un'istanza dalla tabella visto
     */
    public static function load($username)
    {
        $righe = null;
        $con = FConnectionDB::getIstanza();

        $righe = $con->loadvisto($username);

        return $righe;
    }
/*
 * metodo per inserire  un'occorrenza all'interno della tabella visto
 */
    public static function store($username,$id_episodio)
    {
        $con = FConnectionDB::getIstanza();
        $con->storeVisto($username,$id_episodio);
    }
/*
 * metodo per verificare l'esistenza di un occorrenza nella tabella visto
 */
    public static function existvisto($username, $id_ep)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->existvisto($username,$id_ep);
        return $ris;
    }
/*
 * metodo per eliminare un'occorrenza dalla tabella visto
 */
    public static function delete($username, $id_ep)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->deletevisto($username,$id_ep);
        return $ris;
    }
}