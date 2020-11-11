<?php


class FLingua
{
    public static function load($lingua)
    {
        $righe = null;
        $con = FConnectionDB::getIstanza();
        $righe = $con->loadLingua($lingua);
        return $righe;
    }

    public static function store( $lingua)
    {
        $con = FConnectionDB::getIstanza();
        $con->storeLingua( $lingua);
    }

}