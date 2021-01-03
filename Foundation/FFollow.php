<?php


class FFollow
{
    public static function load($idA,int $select)
    {
        $righe = null;
        $con = FConnectionDB::getIstanza();
        if($select==1)
        $righe = $con->loadFollower($idA);
        else $righe = $con->loadFollowed($idA);
        return $righe;
    }

    public static function store($idA,$idB)
    {
        $con = FConnectionDB::getIstanza();
        $con->storeFollow($idA,$idB);
    }

    public static function existFollow($followed, $follower)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->existFollow($followed,$follower);
        return $ris;
    }

    public static function delete($followed, $follower)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->deletefollow($followed,$follower);
        return $ris;
    }
}