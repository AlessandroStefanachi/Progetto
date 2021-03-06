<?php


class FCommento
{
    /*Nome della classe Foundation*/
    private static $nomeClasse = "FCommento";
    /*Nome della tabella del db*/
    private static $nomeTabella = "commento";
    /*Campi della tabella del db*/
    private static $campiTabella = "(id,testo,data,ora,autore,id_episodio)";
    /*Campi parametrici della tabella usati dalla query per il bind*/
    private static $campiParametriciTabella = "(:id, :testo, :data, :ora, :autore, :id_episodio)";

    /**
     * Metodo che associa ai campi parametrici precedentemente messi nella query i valori degli attributi
     * dell'EEpisodio corrispondenti
     * @param PDOStatement $stmt
     * @param ECommento $commento che deve essere salvato sul db
     */
    public static function bind($stmt, ECommento $commento)
    {
        $stmt->bindValue(':id', NULL, PDO::PARAM_INT);
        $stmt->bindValue(':testo', $commento->getTesto(), PDO::PARAM_STR);
        $stmt->bindValue(':data', $commento->getData(), PDO::PARAM_STR);
        $stmt->bindValue(':ora', $commento->getOra(), PDO::PARAM_STR);
        $stmt->bindValue(':autore', $commento->getAutore(), PDO::PARAM_STR);
        $stmt->bindValue(':id_episodio', $commento->getIdEpisodio(), PDO::PARAM_INT);
    }

    /**
     * Metodo che permette di fare la store del commento
     * @param ECommento $commento
     */
    public static function store($commento)
    {
        $con = FConnectionDB::getIstanza();
        $con->store($commento, static::$nomeClasse);
    }
    /**
     * Metodo che permette di fare la load dei commenti dal database
     * @param $campo campo da confrontare per trovare la riga
     * @param $valoreCampo valore del campo
     * @return $partite array di oggetti Ecommento
     */
    public static function load($campo, $valoreCampo)
    {

        $con = FConnectionDB::getIstanza();
        $righe =  $con->load($campo, $valoreCampo, static::$nomeTabella);
        $commenti = array();
        $utenti = array();

        if($righe == NULL) {
            $commenti = NULL;
        }else {
            $numeroRighe = count($righe);
            for($i = 0; $i < $numeroRighe; $i++) {
               // $utenti = FPersistentManager::load("username", $righe[$i]["autore"], FUtente::getNomeClasse());
                $commenti[$i] = new ECommento($righe[$i]["testo"], $righe[$i]["data"], $righe[$i]["ora"], $righe[$i]["autore"], $righe[$i]["id_episodio"]);
                $commenti[$i]->setId($righe[$i]["id"]);

            }
        }

        return $commenti;
    }

    /**
     * Metodo che permette di aggiornare un campo di una tabella nel database
     * @param $campo campo da considerare/aggiornare
     * @param $nuovoValore nuovo valore da inserire
     * @param $chiave nome del campo chiave primaria della classe interessata
     * @param $id valore della chiave primaria
     * @return bool $verifica per vedere se l'update è andato a buon fine o no
     */

public static function update($campo, $nuovoValore, $chiave, $id){

    $con = FConnectionDB::getIstanza();
    $righe =  $con->update($campo, $nuovoValore, $chiave,$id,self::getNomeClasse());
    return $righe;

}
    /**
     * Questo metodo restituisce il nome della classe per la costruzione delle query
     * @return string $nomeClasse nome della classe
     */
    public static function getNomeClasse()
    {
        return self::$nomeClasse;
    }

    /**
     * Questo metodo restituisce il nome della tabella per la costruzione delle query
     * @return string $nomeTabella nome della tabella
     */
    public static function getNomeTabella()
    {
        return self::$nomeTabella;
    }

    /**
     * Questo metodo restituisce i campi della tabella per la costruzione delle query
     * @return string $campiTabella campi della tabella
     */
    public static function getCampiTabella()
    {
        return self::$campiTabella;
    }

    /**
     * Questo metodo restituisce i campi parametrici della tabella per la costruzione delle query
     * @return string $campiParametriciTabella campi parametrici della tabella
     */
    public static function getCampiParametriciTabella()
    {
        return self::$campiParametriciTabella;
    }
/*
 * Metodo che viene utilizzato per cancellare un'occorrenza dalla tabella commento
 */
    public static function delete($id)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->delete(static::getNomeTabella(),$id,'id');
        return $ris;
    }
    /*
     * metodo che viene usato per estrarre tutti i commenti dalla tabella commento
     */

    public static function loadAll(){
        $con = FConnectionDB::getIstanza();
        $righe =  $con->loadAll(static::$nomeTabella);
        $commenti = array();
        $utenti = array();

        if($righe == NULL) {
            $commenti = NULL;
        }else {
            $numeroRighe = count($righe);
            for($i = 0; $i < $numeroRighe; $i++) {
                // $utenti = FPersistentManager::load("username", $righe[$i]["autore"], FUtente::getNomeClasse());
                $commenti[$i] = new ECommento($righe[$i]["testo"], $righe[$i]["data"], $righe[$i]["ora"], $righe[$i]["autore"], $righe[$i]["id_episodio"]);
                $commenti[$i]->setId($righe[$i]["id"]);

            }
        }

        return $commenti;
    }

}
