<?php


class FValutazione

{
    /*Nome della classe Foundation*/
    private static $nomeClasse = "FValutazione";
    /*Nome della tabella del db*/
    private static $nomeTabella = "valutazione";
    /*Campi della tabella del db*/
    private static $campiTabella = "(voto,autore,id_episodio)";
    /*Campi parametrici della tabella usati dalla query per il bind*/
    private static $campiParametriciTabella = "(:voto, :autore, :id_episodio)";

    /**
     * Metodo che associa ai campi parametrici precedentemente messi nella query i valori degli attributi
     * dell'EUtenteRegistrato corrispondenti
     * @param PDOStatement $stmt
     * @param EValutazione $valutazione che deve essere salvato sul db
     */
    public static function bind($stmt, EValutazione $valutazione)
    {
        $stmt->bindValue(':voto', $valutazione->getVoto(), PDO::PARAM_INT);
        $stmt->bindValue(':autore', $valutazione->getAutore()->getUserName(), PDO::PARAM_STR);
        $stmt->bindValue(':id_episodio', $valutazione->getIdEpisodio(), PDO::PARAM_INT);//aggiungere getIdEpisodio e l'attributo id_episodio
    }

    /**
     * Metodo che permette di fare la store del commento
     * @param EValutazione $valutazione
     */
    public static function store($valutazione)
    {
        $con = FConnectionDB::getIstanza();
        $con->store($valutazione, static::$nomeClasse);
    }

    public static function load($campo, $valoreCampo)
    {

        $con = FConnectionDB::getIstanza();
        $righe =  $con->load($campo, $valoreCampo, static::$nomeTabella);
        $valutazioni = array();
        $utenti = array();

        if($righe == NULL)
        {
            $valutazioni = NULL;
        }
            else
                {
                    $numeroRighe = count($righe);
                     for($i = 0; $i < $numeroRighe; $i++)
                        {
                            $utenti = FPersistentManager::load("username", $righe[$i]["autore"], FUtente::getNomeClasse());
                            $valutazioni[$i] = new EValutazione($righe[$i]["voto"], $utenti[0], $righe[$i]["id_episodio"]);
                        }
                }

        return $valutazioni;
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

}
