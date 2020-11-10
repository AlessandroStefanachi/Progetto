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
        $stmt->bindValue(':id', $stagione->getId(), PDO::PARAM_INT);//da aggiungere attributo e metodo
        $stmt->bindValue(':id_serieTv', $stagione->getIdSerieTv(), PDO::PARAM_INT);//da aggiungere attributo e metodo

    }

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


    }

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
                $stagioni[$i] = new EStagione($righe[$i]["data"], $righe[$i]["numero"],$righe[$i]["id_serieTv"]);
                $stagioni[$i]->setId($righe[$i]["id"]);
                $episodi= FPersistentManager::load('id_stagione',$righe[$i]['id'],FEpisodio::getNomeClasse());
                if($episodi)
                    $stagioni[$i]->setEpisodi($episodi);
                $Clingue= FPersistentManager::loadSTGlingua($righe[$i]['id']);
                ///////////////////
                if($Clingue!=null)
                {
                    $lingue=array();
                    $nr=count($Clingue);
                    for($i=0;$i < $nr;$i++)
                    {
                        $a=FPersistentManager::loadLingua($Clingue[$i]['id_lingua']);
                        array_push($serie, $lingue);//inserisci la lingua
                    }
                    if($lingue)
                        $stagioni[$i]->setLingue($lingue);
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

}