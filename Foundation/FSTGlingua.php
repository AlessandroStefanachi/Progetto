<?php


class FSTGlingua
{
    public static function load($id)
    {
        $righe = null;
        $con = FConnectionDB::getIstanza();

        $righe = $con->loadSTGlingua($id);

        return $righe;
    }

    public static function store($id_lingua,$id_stagione)
    {
        $con = FConnectionDB::getIstanza();
        $con->storeSTGlingua($id_lingua, $id_stagione);
    }
    public static function delete($id_lingua,$id_stagione)
    {
        $con = FConnectionDB::getIstanza();
        $con->deleteSTGlingua($id_lingua, $id_stagione);
    }
}