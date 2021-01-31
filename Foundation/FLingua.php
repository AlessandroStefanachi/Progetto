<?php


class FLingua
{private static $nomeTabella = "lingua";
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

    public static function loadAll()
    {
        $con = FConnectionDB::getIstanza();
        $righe =  $con->loadAll(FLingua::$nomeTabella);
        return $righe;
    }

    public static function delete($id)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->delete(static::$nomeTabella,$id,'lingua');
        return $ris;
    }

    public static function exist($campo, $valoreCampo)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->exist($campo, $valoreCampo, static::$nomeTabella);
        return $ris;
    }

}