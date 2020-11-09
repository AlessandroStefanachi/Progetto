<?php


class FLingua
{
    public static function load($id)
    {
        $righe = null;
        $con = FConnectionDB::getIstanza();
        $righe = $con->loadLingu($id);
        return $righe;
    }

    public static function store($id, $lingua)
    {
        $con = FConnectionDB::getIstanza();
        $con->storeLingua($id, $lingua);
    }

}