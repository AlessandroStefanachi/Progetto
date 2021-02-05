<?php


class FVisto
{
    public static function load($username)
    {
        $righe = null;
        $con = FConnectionDB::getIstanza();

        $righe = $con->loadvisto($username);

        return $righe;
    }

    public static function store($username,$id_episodio)
    {
        $con = FConnectionDB::getIstanza();
        $con->storeVisto($username,$id_episodio);
    }

    public static function existvisto($username, $id_ep)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->existvisto($username,$id_ep);
        return $ris;
    }

    public static function delete($username, $id_ep)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->deletevisto($username,$id_ep);
        return $ris;
    }
}