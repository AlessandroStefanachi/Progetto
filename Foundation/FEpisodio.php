<?php


class FEpisodio
{
    /*Nome della classe Foundation*/
    private static $nomeClasse = "FEpisodio";
    /*Nome della tabella del db*/
    private static $nomeTabella = "episodio";
    /*Campi della tabella del db*/
    private static $campiTabella = "(titolo, durata, id_stagione, id)";
    /*Campi parametrici della tabella usati dalla query per il bind*/
    private static $campiParametriciTabella = "(:titolo, :durata, :id_stagione, :id)";

    /**
     * Metodo che associa ai campi parametrici precedentemente messi nella query i valori degli attributi
     * dell'EEpisodio corrispondenti
     * @param PDOStatement $stmt
     * @param EEpisodio $episodio che deve essere salvato sul db
     */
    public static function bind($stmt, EEpisodio $episodio)
    {
        $stmt->bindValue(':titolo', $episodio->getTitolo(), PDO::PARAM_STR);
        $stmt->bindValue(':durata', $episodio->getDurata(), PDO::PARAM_STR);
       // $stmt->bindValue(':visto', $episodio->isVisto(), PDO::PARAM_BOOL);
        $stmt->bindValue(':id_stagione', $episodio->getIdStagione(), PDO::PARAM_INT);
        $stmt->bindValue(':id', NULL, PDO::PARAM_INT);
    }

    /**
     * Metodo che permette di fare la store dell'episodio,
     * @param EEpisodio $episodio
     */
    public static function store(EEpisodio $episodio)
    {
        $con = FConnectionDB::getIstanza();
        $id = $con->store($episodio, FEpisodio::$nomeClasse);
        $episodio->setId($id);
        $commenti = $episodio->getCommenti();
        $valutazioni = $episodio->getValutazioni();

        if ($commenti)
        {
            $n= count($commenti);
            for($i = 0; $i < $n; $i++)
            {
                $commenti[$i]->setIdEpisodio($id);
                FCommento::store($commenti[$i]);

            }
        }

        if ($valutazioni)
        {
            $n= count($valutazioni);
            for($i = 0; $i < $n; $i++)
            {
                $valutazioni[$i]->setIdEpisodio($id);
                FValutazione::store($valutazioni[$i]);

            }
        }

    }

    /**
     * Metodo che permette di fare la load dell' episodio/i dal database
     * @param $campo campo da confrontare per trovare la riga
     * @param $valoreCampo valore del campo
     * @return $episodio array di oggetti EEpisodio
     */
    public static function load($campo, $valoreCampo)
    {

        $con = FConnectionDB::getIstanza();
        $righe =  $con->load($campo, $valoreCampo, FEpisodio::$nomeTabella);
        $episodio = array();

        if($righe == NULL)
        {
            $episodio = NULL;
        }
        else
        {
            $numeroRighe = count($righe);
            for($i = 0; $i < $numeroRighe; $i++)
            {
                $episodio[$i] = new EEpisodio(
                        $righe[$i]["titolo"],
                        $righe[$i]["durata"],
                        //$righe[$i]["visto"],
                        $righe[$i]["id_stagione"]

                    );
                $episodio[$i]->setId($righe[$i]["id"]);
                $commenti= FPersistentManager::load('id_episodio',$righe[$i]['id'],FCommento::getNomeClasse());
                if($commenti)
                    $episodio[$i]->setCommenti($commenti);
                $valutazioni= FPersistentManager::load('id_episodio',$righe[$i]['id'],FValutazione::getNomeClasse());
                if($valutazioni)
                    $episodio[$i]->setValutazioni($valutazioni);
            }
        }

        return $episodio;
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
    public static function exist($campo, $valoreCampo)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->exist($campo, $valoreCampo, static::getNomeTabella());
        return $ris;
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
 * metodo che viene utilizzato per rimuovere un occorrenza dalla tabella episodio
 */
    public static function delete($id)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->delete(static::getNomeTabella(),$id,'id');
        return $ris;
    }
}