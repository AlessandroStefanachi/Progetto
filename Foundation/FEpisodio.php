<?php


class FEpisodio
{
    /*Nome della classe Foundation*/
    private static $nomeClasse = "FEpisodio";
    /*Nome della tabella del db*/
    private static $nomeTabella = "episodio";
    /*Campi della tabella del db*/
    private static $campiTabella = "(titolo, durata, visto, id_stagione, id)";
    /*Campi parametrici della tabella usati dalla query per il bind*/
    private static $campiParametriciTabella = "(:titolo, :durata, :visto, :id_stagione, :id)";

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
        $stmt->bindValue(':visto', $episodio->isVisto(), PDO::PARAM_BOOL);
        $stmt->bindValue(':id_stagione', $episodio->getIdStagione(), PDO::PARAM_INT);
        $stmt->bindValue(':id', $episodio->getId(), PDO::PARAM_INT);
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
                $commenti[$i]->setId_episodio($id);
                FCommento::store($commenti[$i]);

            }
        }

        if ($valutazioni)
        {
            $n= count($valutazioni);
            for($i = 0; $i < $n; $i++)
            {
                $valutazioni[$i]->setId_episodio($id);
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
                        $righe[$i]["visto"]
                    );
                $episodio[$i]->setId($righe[$i]["id"]);
                $commenti= FPersistentManager::load('id_episodio',$righe[$i]['id'],FCommento::getNomeClasse());
                $episodio[$i]->setCommenti($commenti);
                $valutazioni= FPersistentManager::load('id_episodio',$righe[$i]['id'],FValutazione::getNomeClasse());
                $episodio[$i]->setValutazioni($valutazioni);
            }
        }

        return $episodio;
    }


}