<?php
/*
 * classe associata alla tabella STGLingua associata alla relazione N-N tra stagione e lingua
 */

class FSTGlingua
{
    /*
     * metodo per estrarre le occorrenze della tabella STGLingua in base all id di una stagione
     */
    public static function load($id)
    {
        $righe = null;
        $con = FConnectionDB::getIstanza();

        $righe = $con->loadSTGlingua($id);

        return $righe;
    }
    /*
         * metodo per inserire un'occorrenza all interno della tabella STGLinua
         */
    public static function store($id_lingua,$id_stagione)
    {
        $con = FConnectionDB::getIstanza();
        $con->storeSTGlingua($id_lingua, $id_stagione);
    }

    /*
     * metodo per rimuovere un'occorrenza dalla tabella STGLingua
     */
    public static function delete($id_lingua,$id_stagione)
    {
        $con = FConnectionDB::getIstanza();
        $con->deleteSTGlingua($id_lingua, $id_stagione);
    }
}