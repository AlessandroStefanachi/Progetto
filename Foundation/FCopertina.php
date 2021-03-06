<?php


class FCopertina
{
    /*Nome della classe Foundation*/
    private static $nomeClasse = "FCopertina";
    /*Nome della tabella del db*/
    private static $nomeTabella = "copertina";
    /*Campi della tabella del db*/
    private static $campiTabella = "(id,nome,size,type,immagine)";
    /*Campi parametrici della tabella usati dalla query per il bind*/
    private static $campiParametriciTabella = "(:id, :nome, :size, :type, :immagine )";

    /**
     * Metodo che associa ai campi parametrici precedentemente messi nella query i valori degli attributi
     * dell'EEpisodio corrispondenti
     * @param PDOStatement $stmt
     * @param ECopertina $copertina che deve essere salvato sul db
     */
    public static function bind($stmt, ECopertina $copertina)
    {
        $stmt->bindValue(':id', NULL, PDO::PARAM_INT);
        $stmt->bindValue(':nome', $copertina->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':size', $copertina->getSize(), PDO::PARAM_STR);
        $stmt->bindValue(':type', $copertina->getType(), PDO::PARAM_STR);
        $stmt->bindValue(':immagine', $copertina->getImmagine(), PDO::PARAM_LOB);

    }

    /**
     * Metodo che permette di fare la store del commento
     * @param ECopertina $copertina
     */
    public static function store($copertina)
    {
        $con = FConnectionDB::getIstanza();
        $con->store($copertina, static::$nomeClasse);
    }
    /**
     * Metodo che permette di fare la load di commenti dal database
     * @param $campo campo da confrontare per trovare la riga
     * @param $valoreCampo valore del campo
     * @return $partite array di oggetti ECopertina
     */
    public static function load($campo, $valoreCampo)
    {

        $con = FConnectionDB::getIstanza();
        $righe =  $con->load($campo, $valoreCampo, static::$nomeTabella);
        $copertina = array();
        $utenti = array();

        if($righe == NULL) {
            $copertina = NULL;
        }else {
            $numeroRighe = count($righe);
            for($i = 0; $i < $numeroRighe; $i++) {
                // $utenti = FPersistentManager::load("username", $righe[$i]["autore"], FUtente::getNomeClasse());
                $copertina[$i] = new ECopertina($righe[$i]["nome"], $righe[$i]["type"], $righe[$i]["size"], $righe[$i]["immagine"]);
                $copertina[$i]->setId($righe[$i]["id"]);

            }
        }

        return $copertina;
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
    /**
     * Metodo che permette di aggiornare un campo di una tabella nel database
     * @param $campo campo da considerare/aggiornare
     * @param $nuovoValore nuovo valore da inserire
     * @param $chiave nome del campo chiave primaria della classe interessata
     * @param $id valore della chiave primaria
     * @return bool $verifica per vedere se l'update è andato a buon fine o no
     */

    public static function update($campo, $nuovoValore, $chiave, $id)
    {
        $con = FConnectionDB::getIstanza();
        $verifica = $con->update($campo, $nuovoValore, $chiave, $id, static::$nomeClasse);
        return $verifica;
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
 * metodo per verificare l'esistenza di una specifica occorrenza nella tabella copertina
 */
    public static function exist($campo, $valoreCampo)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->exist($campo, $valoreCampo, static::$nomeTabella);
        return $ris;
    }

}
