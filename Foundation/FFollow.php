<?php


class FFollow
{
    public static function load($idA,int select) {
        $righe = null;
        $con = FConnectionDB::getIstanza();
        if(select==1)
        $righe = $con->loadFollower($idA);
        else $righe = $con->loadFollowed($idA);
        return $righe;
    }

    public static function store($idA,$idB) {
        $con = FConnectionDB::getIstanza();
        $con->storeTransazione($idA,$idB);
    }
}