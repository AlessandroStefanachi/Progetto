<?php


class FCorrispondenze
{
    public static function load($id_watchlist)
    {
        $righe = null;
        $con = FConnectionDB::getIstanza();

            $righe = $con->loadCorr($id_watchlist);

        return $righe;
    }

    public static function store($id_watchlist,$id_stv)
    {
        $con = FConnectionDB::getIstanza();
        $con->storeCorr($id_watchlist,$id_stv);
    }
}