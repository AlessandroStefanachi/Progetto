<?php


class FTVgenere
{
    public static function load($id)
    {
        $righe = null;
        $con = FConnectionDB::getIstanza();

        $righe = $con->loadTVgenere($id);

        return $righe;
    }
    public static function loadbygen($id)
    {
        $righe = null;
        $con = FConnectionDB::getIstanza();

        $righe = $con->loadGenereTv($id);

        return $righe;
    }
    public static function store($id_genere,$id_serie)
    {
        $con = FConnectionDB::getIstanza();
        $con->storeTVgenere($id_genere, $id_serie);
    }

}