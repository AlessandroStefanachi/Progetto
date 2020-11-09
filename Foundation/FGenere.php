<?php


class FGenere
{
    public static function load($id)
    {
        $righe = null;
        $con = FConnectionDB::getIstanza();
        $righe = $con->loadGenere($id);
        return $righe;
    }

    public static function store($id, $genere)
    {
        $con = FConnectionDB::getIstanza();
        $con->storeGenere($id, $genere);
    }

}