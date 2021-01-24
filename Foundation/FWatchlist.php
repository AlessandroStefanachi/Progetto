<?php


class FWatchlist
{
    /*Nome della classe Foundation*/
    private static $nomeClasse = "FWatchlist";
    /*Nome della tabella del db*/
    private static $nomeTabella = "watchlist";
    /*Campi della tabella del db*/
    private static $campiTabella = "(nome, descrizione, pubblico, proprietario, id)";
    /*Campi parametrici della tabella usati dalla query per il bind*/
    private static $campiParametriciTabella = "(:nome, :descrizione, :pubblico, :proprietario, :id)";

    /**
     * Metodo che associa ai campi parametrici precedentemente messi nella query i valori degli attributi
     * dell'EUtenteRegistrato corrispondenti
     * @param PDOStatement $stmt
     * @param EWatchlist $watchlist che deve essere salvato sul db
     */
    public static function bind($stmt, EWatchlist $watchlist)
    {
        $stmt->bindValue(':nome', $watchlist->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':descrizione', $watchlist->getDescrizione(), PDO::PARAM_STR);
        $stmt->bindValue(':pubblico', $watchlist->isPubblico(), PDO::PARAM_BOOL);
        $stmt->bindValue(':proprietario', $watchlist->getProprietario(), PDO::PARAM_STR);//DA METTERE IN ENTITY
        $stmt->bindValue(':id', NULL, PDO::PARAM_INT);//DA METTERE IN ENTITY
    }

    public static function store(EWatchlist $watchlist)
    {
        $con = FConnectionDB::getIstanza();
        $id = $con->store($watchlist, FWatchlist::$nomeClasse);
        $watchlist->setId($id);
        $serietv = $watchlist->getSerie();
        if ($serietv)
        {
            $n= count($serietv);
            for($i = 0; $i < $n; $i++)
            {
                FCorrispondenze::store($watchlist->getId(),$serietv[$i]->getid());
            }
        }

    }


    public static function load($campo, $valoreCampo)
    {

        $con = FConnectionDB::getIstanza();
        $righe =  $con->load($campo, $valoreCampo, FWatchlist::$nomeTabella);
        $watchlist = array();

        if($righe == NULL)
        {
            $watchlist = NULL;
        }
        else
        {
            $numeroRighe = count($righe);
            for($i = 0; $i < $numeroRighe; $i++)
            {

                $watchlist[$i] = new EWatchlist(
                    $righe[$i]["nome"],
                    $righe[$i]["descrizione"],
                    $righe[$i]["pubblico"],
                    $righe[$i]["proprietario"]

                );
                $watchlist[$i]->setId($righe[$i]["id"]);//non nel costruttore perchè non puoi fornire un id alla prima generazione in quanto l'id è dato dal primo salvataggio nel DB
                $corrispondenze= FPersistentManager::loadCorrispondenze($righe[$i]['id']);
                ///////////////////
                if($corrispondenze!=null){
                    $serie=array();
                    $nr=count($corrispondenze);

                    for($b=0;$b < $nr;$b++){
                        $a=FPersistentManager::load('id',$corrispondenze[$b]['id_stv'],FSerieTv::getNomeClasse());
                        array_push($serie,clone( $a[0]));//inserisci la serie tv
                    }
                    if($serie)
                        $watchlist[$i]->setSerie($serie);
                }

            }
        }

        return $watchlist;
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

    public static function getIDfrom($campo,$valoreCampo){
        $con = FConnectionDB::getIstanza();
        $ris = $con->getIDfrom(static::getNomeTabella(),$campo, $valoreCampo);
        return $ris;
    }
}

