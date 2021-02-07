<?php
/*
 * classe associata alla tabella Follow associata alla relazione N-N tra  utente e la tabella stessa
 */

class FFollow
{

    /*
     * metodo utilizzato per estrarre occorrenze dalla tabella Follow
     */
    public static function load($idA, $select)
    {
        $righe = null;
        $con = FConnectionDB::getIstanza();
        if($select==1)
        $righe = $con->loadFollower($idA);
        else $righe = $con->loadFollowed($idA);
        return $righe;
    }
/*
 * metodo utilizzato
 * per inserire un occorrenza nella tabella follow
 */
    public static function store($idA,$idB)
    {
        $con = FConnectionDB::getIstanza();
        $con->storeFollow($idA,$idB);
    }
/*
 * metodo utlizzato per verificare l'esistenza di un'occorenza  nella tabella follow
 */
    public static function existFollow($followed, $follower)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->existFollow($followed,$follower);
        return $ris;
    }
/*
 * metodo utilizzato per eliminare un'occorrenza dalla tabella follow
 */
    public static function delete($followed, $follower)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->deletefollow($followed,$follower);
        return $ris;
    }
}