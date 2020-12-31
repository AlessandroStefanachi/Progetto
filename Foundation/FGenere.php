<?php


class FGenere
{
    private static $nomeTabella = "genere";
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

    public static function loadAll()
    {
        $con = FConnectionDB::getIstanza();
        $righe =  $con->loadAll(FGenere::$nomeTabella);
        return $righe;
    }

    public static function exist($campo, $valoreCampo)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->exist($campo, $valoreCampo, static::$nomeTabella);
        return $ris;
    }

}