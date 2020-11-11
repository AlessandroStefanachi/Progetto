<?php


class FGenere
{
    public static function load($genere)
    {
        $righe = null;
        $con = FConnectionDB::getIstanza();
        $righe = $con->loadGenere($genere);
        return $righe;
    }

    public static function store($genere)
    {
        $con = FConnectionDB::getIstanza();
        $con->storeGenere($genere);
    }

}