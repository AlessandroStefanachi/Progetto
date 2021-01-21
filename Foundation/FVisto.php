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

    public static function existcorr($id_w, $id_s) //per ora non serve il metodo corrispondente per questa classe
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->existCorr($id_w,$id_s);
        return $ris;
    }
}