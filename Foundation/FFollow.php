<?php


class FFollow
{
    public static function load($idA) {
        $righe = null;
        $con = FConnectionDB::getIstanza();
        $righe = $con->loadTransazioni($idA);
        return $righe;
    }

    public static function store($idA,$idB) {
        $con = FConnectionDB::getIstanza();
        $con->storeTransazione($idA,$idB);
    }
}