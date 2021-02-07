<?php


class FStagione
{
    /*Nome della classe Foundation*/
    private static $nomeClasse = "FStagione";
    /*Nome della tabella del db*/
    private static $nomeTabella = "stagione";
    /*Campi della tabella del db*/
    private static $campiTabella = "(data,numero,id,id_serieTV)";
    /*Campi parametrici della tabella usati dalla query per il bind*/
    private static $campiParametriciTabella = "(:data,:numero,:id,:id_serieTV)";

    /**
     * Metodo che associa ai campi parametrici precedentemente messi nella query i valori degli attributi
     * dell'EEpisodio corrispondenti
     * @param PDOStatement $stmt
     * @param EStagione $stagione che deve essere salvato sul db
     */
    public static function bind($stmt, EStagione $stagione)
    {
        $stmt->bindValue(':data', $stagione->getData(), PDO::PARAM_STR);
        $stmt->bindValue(':numero', $stagione->getNumero(), PDO::PARAM_INT);
        $stmt->bindValue(':id', NULL, PDO::PARAM_INT);//da aggiungere attributo e metodo
        $stmt->bindValue(':id_serieTV', $stagione->getIdSerieTv(), PDO::PARAM_INT);//da aggiungere attributo e metodo

    }
    /**
     * Metodo che permette di fare la store della serie
     * @param EStagione $stagione
     */
    public static function store(EStagione $stagione)
    {
        $con = FConnectionDB::getIstanza();
        $id = $con->store($stagione, FStagione::$nomeClasse);
        $stagione->setId($id);
        $episodi = $stagione->getEpisodi();

        if ($episodi)
        {
            $n= count($episodi);
            for($i = 0; $i < $n; $i++)
            {
                $episodi[$i]->setIdStagione($id);
                FEpisodio::store($episodi[$i]);

            }
        }
        $lingua = $stagione->getLingue();
        if($lingua)
        {
            $n= count($lingua);
            for($i = 0; $i < $n; $i++)
            {
                FSTGlingua::store($lingua[$i],$stagione->getId());
            }
        }

    }

    /**
     * Metodo che permette di fare la load delle stagiono dal database
     * @param $campo campo da confrontare per trovare la riga
     * @param $valoreCampo valore del campo
     * @return $stagioni array di oggetti EStagioni
     */

    public static function load($campo, $valoreCampo)
    {

        $con = FConnectionDB::getIstanza();
        $righe =  $con->load($campo, $valoreCampo, FStagione::$nomeTabella);
        $stagioni = array();

        if($righe == NULL)
        {
            $stagioni = NULL;
        }
        else
        {
            $numeroRighe = count($righe);
            for($i = 0; $i < $numeroRighe; $i++)
            {
                $stagioni[$i] = new EStagione($righe[$i]["data"], $righe[$i]["numero"],$righe[$i]["id_serieTV"]);
                $stagioni[$i]->setId($righe[$i]["id"]);
                $episodi= FPersistentManager::load('id_stagione',$righe[$i]['id'],FEpisodio::getNomeClasse());
                if($episodi)
                    $stagioni[$i]->setEpisodi($episodi);
                $Clingue= FPersistentManager::loadSTGlingua($righe[$i]['id']);
                ///////////////////

                if($Clingue)
                {
                    $a=array();
                    $nr=count($Clingue);
                    for($b=0;$b < $nr;$b++)
                    {
                        $lingue=FPersistentManager::loadLingua($Clingue[$b]['id_lingua']);

                        array_push($a, $lingue[0]["lingua"]);//inserisci la lingua
                    }
                    if($a)
                        $stagioni[$i]->setLingue($a);
                }
            }
        }

        return $stagioni;
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
     * metodo utilizzato per verificare l esistenza di un'occorrenza all interno della tabella Stagioni
     */
    public static function exist($campo, $valoreCampo)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->exist($campo, $valoreCampo, static::getNomeTabella());
        return $ris;
    }
/*
 * metodo utilizzato per aggiornare un'istanza della tabella Stagioni
 */
    public static function update($campo, $nuovoValore, $chiave, $id)
    {
        $con = FConnectionDB::getIstanza();
        $verifica = $con->update($campo, $nuovoValore, $chiave, $id, static::$nomeClasse);
        return $verifica;
    }

    /*
     * metodo utilizzato per eliminare un'occorrenza dalla tabella stagione
     */
    public static function delete($id)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->delete(static::getNomeTabella(),$id,'id');
        return $ris;
    }
}