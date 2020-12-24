<?php


class FSerieTv
{
    /*Nome della classe Foundation*/
    private static $nomeClasse = "FSerieTv";
    /*Nome della tabella del db*/
    private static $nomeTabella = "SerieTV";
    /*Campi della tabella del db*/
    private static $campiTabella = "(titolo, trama, regista, tipo, id, id_copertina)";
    /*Campi parametrici della tabella usati dalla query per il bind*/
    private static $campiParametriciTabella = "(:titolo, :trama, :regista, :tipo, :id, :id_copertina)";

    /**
     * Metodo che associa ai campi parametrici precedentemente messi nella query i valori degli attributi
     * dell'EEpisodio corrispondenti
     * @param PDOStatement $stmt
     * @param ESerieTv $serie che deve essere salvato sul db
     */
    public static function bind($stmt, ESerieTv $serie)
    {
        $stmt->bindValue(':titolo', $serie->getTitolo(), PDO::PARAM_STR);
        $stmt->bindValue(':trama', $serie->getTrama(), PDO::PARAM_STR);
        $stmt->bindValue(':regista', $serie->getRegista(), PDO::PARAM_STR);
        $stmt->bindValue(':tipo', $serie->getTipo(), PDO::PARAM_STR);
        $stmt->bindValue(':id', NULL, PDO::PARAM_INT);// AGGIUNGERE METODO GET E PARAMETRO ID
        $stmt->bindValue(':id_copertina', $serie->getId_copertina(), PDO::PARAM_INT);// AGGIUNGERE METODO GET E PARAMETRO ID

    }


    public static function store(ESerieTv $serie)
    {
        $con = FConnectionDB::getIstanza();
        if($serie->getCopertina()!=null){
            $id_copertina=$con->store($serie->getCopertina());
            $serie->setId_copertina($id_copertina);
        }

        $id = $con->store($serie, FSerieTv::$nomeClasse);
        $serie->setId($id);
        $stagione = $serie->getStagioni();


        if ($stagione)
        {
            $n= count($stagione);
            for($i = 0; $i < $n; $i++)
            {
                $stagione[$i]->setIdSerieTv($id);//AGGIUNGERE NELLA CLASSE STAGIONE ATT E METODO PER ID

                FStagione::store($stagione[$i]);


            }
        }
        $genere = $serie->getGenere();
        if($genere)
        {
            $n= count($genere);
            for($i = 0; $i < $n; $i++)
            {
                FTVgenere::store($genere[$i],$serie->getId());
            }
        }

    }

    public static function load($campo, $valoreCampo)
    {

        $con = FConnectionDB::getIstanza();
        $righe =  $con->load($campo, $valoreCampo, FSerieTv::$nomeTabella);
        $serie = array();

        if($righe == NULL)
        {
            $serie = NULL;
        }
        else
        {
            $numeroRighe = count($righe);
            for($i = 0; $i < $numeroRighe; $i++)
            {
                $serie[$i] = new ESerieTv($righe[$i]["titolo"], $righe[$i]["trama"], $righe[$i]["regista"], $righe[$i]["tipo"]);

                $serie[$i]->setId($righe[$i]["id"]);
                if($righe[$i]['id_copertina']!=null)$serie[$i]->setId_copertina($righe[$i]["id_copertina"]);
                $copertina=FPersistentManager::load('id',$righe[$i]["id_copertina"],FCopertina::getNomeClasse());
                if($copertina!=null)$serie[$i]->setCopertina($copertina[0]);// se trovo la copertina la setto
                $stagione= FPersistentManager::load('id_serieTV',$righe[$i]['id'],FStagione::getNomeClasse());
                if($stagione)
                    $serie[$i]->setStagioni($stagione);
                $CGenere= FPersistentManager::loadTVgenere($righe[$i]['id']);
                ///////////////////
                if($CGenere!=null)
                {
                    $generi=array();
                    $nr=count($CGenere);
                    for($b=0;$b < $nr;$b++)
                    {
                        $a=FPersistentManager::loadGenere($CGenere[$i]['id_genere']);
                        array_push($generi, $a[0]["genere"]);//inserisci la lingua
                    }
                    if($generi)
                        $serie[$i]->setGenere($generi);
                }
            }
        }

        return $serie;
    }


    public static function loadAll()
    {

        $con = FConnectionDB::getIstanza();
        $righe =  $con->loadAll(FSerieTv::$nomeTabella);
        $serie = array();

        if($righe == NULL)
        {
            $serie = NULL;
        }
        else
        {
            $numeroRighe = count($righe);
            for($i = 0; $i < $numeroRighe; $i++)
            {
                $serie[$i] = new ESerieTv($righe[$i]["titolo"], $righe[$i]["trama"], $righe[$i]["regista"], $righe[$i]["tipo"]);

                $serie[$i]->setId($righe[$i]["id"]);
                if($righe[$i]['id_copertina']!=null)$serie[$i]->setId_copertina($righe[$i]["id_copertina"]);
                $copertina=FPersistentManager::load('id',$righe[$i]["id_copertina"],FCopertina::getNomeClasse());
                if($copertina!=null)$serie[$i]->setCopertina($copertina[0]);// se trovo la copertina la setto
                $stagione= FPersistentManager::load('id_serieTV',$righe[$i]['id'],FStagione::getNomeClasse());
                if($stagione)
                    $serie[$i]->setStagioni($stagione);
                $CGenere= FPersistentManager::loadTVgenere($righe[$i]['id']);
                ///////////////////
                if($CGenere!=null)
                {
                    $generi=array();
                    $nr=count($CGenere);
                    for($b=0;$b < $nr;$b++)
                    {
                        $a=FPersistentManager::loadGenere($CGenere[$i]['id_genere']);
                        array_push($generi, $a[0]["genere"]);//inserisci la lingua
                    }
                    if($generi)
                        $serie[$i]->setGenere($generi);
                }
            }
        }

        return $serie;
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
public static function getId(){
    $con = FConnectionDB::getIstanza();
    $id =  $con->getID(static::getNomeTabella());
    return $id;
}


    public static function exist($campo, $valoreCampo)
    {
        $con = FConnectionDB::getIstanza();
        $ris = $con->exist($campo, $valoreCampo, static::getNomeTabella());
        return $ris;
    }

}