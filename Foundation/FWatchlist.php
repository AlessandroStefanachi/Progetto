<?php


class FWatchlist
{
    /*Nome della classe Foundation*/
    private static $nomeClasse = "FWatchlist";
    /*Nome della tabella del db*/
    private static $nomeTabella = "watchlist";
    /*Campi della tabella del db*/
    private static $campiTabella = "(nome, descrizione, pubblico, propietario, id)";
    /*Campi parametrici della tabella usati dalla query per il bind*/
    private static $campiParametriciTabella = "(:nome, :descrizione, :pubblico, :propietario, :id)";

    /**
     * Metodo che associa ai campi parametrici precedentemente messi nella query i valori degli attributi
     * dell'EUtenteRegistrato corrispondenti
     * @param PDOStatement $stmt
     * @param EUtente $utente che deve essere salvato sul db
     */
    public static function bind($stmt, EWatchlist $watchlist)
    {
        $stmt->bindValue(':nome', $watchlist->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':descrizione', $watchlist->getDescrizione(), PDO::PARAM_STR);
        $stmt->bindValue(':pubblico', $watchlist->getpubblico(), PDO::PARAM_BOOL);
        $stmt->bindValue(':propietario', $watchlist->getPropietario(), PDO::PARAM_STR);//DA METTERE IN ENTITY
        $stmt->bindValue(':id', $id->getId(), PDO::PARAM_INT);//DA METTERE IN ENTITY
    }
    public static function store(FWatchlist $watchlist)
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

                FCorrispondenze::store($watchlist->getId(),$serietv->getid());

            }
        }


        }

    }
}
