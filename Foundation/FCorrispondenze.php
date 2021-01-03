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

    public static function existcorr($id_w, $id_s)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->existCorr($id_w,$id_s);
        return $ris;
    }
}