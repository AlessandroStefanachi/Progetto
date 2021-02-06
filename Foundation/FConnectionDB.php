<?php
require_once 'Utility/config.inc.php';

class FConnectionDB {

    /** istanza unica della classe */
    private static $istanza;

    /** oggetto PDO che effettua la connessione al dbms */
    private $pdo;

    /** il costruttore è privato ed è chiamato solo da getIstanza() una volta sola */
    private function __construct() {
        global $config;
        try {
            $this->pdo = new PDO($config['mysql']['typedb'],$config['mysql']['user'],$config['mysql']['password']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo "Errore: " . $e->getMessage();
            die;
        }
    }

    /**
     * Metodo che restituisce l'unica istanza dell'oggetto.
     * @return FConnectionDB l'istanza dell'oggetto.
     */
    public static function getIstanza()
    {
        if(self::$istanza == null) self::$istanza = new FConnectionDB();
        return self::$istanza;
    }

    /*
     * Metodo che permette di salvare informazioni contenute in un oggetto Entity sul database.
     * @param $oggetto oggetto da salvare
     * @param $nomeClasse nome della classe che serve per ottenere il nome della tabella e i nomi dei campi per fare la query

     */
    public function store($oggetto, $nomeClasse)
    {

        try
        {
            $this->pdo->beginTransaction();
            $sql = "INSERT INTO ". $nomeClasse::getNomeTabella() . $nomeClasse::getCampiTabella() . " VALUES " . $nomeClasse::getCampiParametriciTabella();
            //echo $sql;
            $stmt = $this->pdo->prepare($sql);
            $nomeClasse::bind($stmt, $oggetto);
            $stmt->execute();
            $id = $this->pdo->lastInsertId();
            $this->pdo->commit();
            $this->closeDBConnection();
            return $id;

        } catch (Exception $e)
            {
                echo "Errore: " . $e->getMessage();
                $this->pdo->rollBack();
                return null;
            }
    }

    /*
     * Metodo che permette di prelevare uno o più oggetti dal db
     * @param $campo nome del campo
     * @param $campo valore del campo
     * @param $nomeTabella nome della tabella su cui fare la query
     */
    public function load($campo, $valoreCampo, $nomeTabella)
    {
        try
        {

            $sql = "SELECT * FROM " . $nomeTabella . " WHERE " . $campo . " = '" . $valoreCampo . "';";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $risultato = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $numeroRighe = $stmt->rowCount();
            if($numeroRighe == 0)
                {
                    $risultato = NULL;
                }
            return $risultato;

        } catch (Exception $e)
            {
                echo "Errore: " . $e->getMessage();
                $this->pdo->rollBack();
            }
    }

    /*
     * funzione che permette di prelevare tutti gli elementi presenti nella tabella passata come parametro
     */
    public function loadAll($nomeTabella){
        try
        {

            $sql = "SELECT * FROM " . $nomeTabella . ";";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $risultato = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $numeroRighe = $stmt->rowCount();
            if($numeroRighe == 0)
            {
                $risultato = NULL;
            }
            return $risultato;

        } catch (Exception $e)
        {
            echo "Errore: " . $e->getMessage();
            $this->pdo->rollBack();
        }

    }
    /*
     * metodo che restituisce tutti gli id della tabella specificata come parametro
     */
    public function getID( $nomeTabella)
    {
        try
        {

            $sql = "SELECT ".'id'." FROM ".$nomeTabella.";";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $risultato = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $numeroRighe = $stmt->rowCount();
            if($numeroRighe == 0)
            {
                $risultato = NULL;
            }
            return $risultato;

        } catch (Exception $e)
        {
            echo "Errore: " . $e->getMessage();
            $this->pdo->rollBack();
        }
    }
    /*
     * metodo che permette di estrarre l'id da una tabella specificata in base al valore di un campo specificato
     */

    public function getIDfrom( $nomeTabella,$campo,$valoreCampo)
    {
        try
        {

            $sql = "SELECT ".'id'." FROM ".$nomeTabella. " WHERE " . $campo . " = '" . $valoreCampo . "';";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $risultato = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $numeroRighe = $stmt->rowCount();
            if($numeroRighe == 0)
            {
                $risultato = NULL;
            }
            return $risultato;

        } catch (Exception $e)
        {
            echo "Errore: " . $e->getMessage();
            $this->pdo->rollBack();
        }
    }

    /*
     * Metodo che permette di aggiornare il valore di un attributo passato come parametro
     * @param $campo campo da aggiornare
     * @param $nuovoValore nuovo valore da inserire
     * @param $chiave nome del campo chiave primaria della classe interessata
     * @param $id valore della chiave primaria
     * @param $nomeClasse nome della classe interessata
     */
    public function update ($campo, $nuovoValore, $chiave, $id, $nomeClasse)
    {
        try
        {
            $this->pdo->beginTransaction();
            $sql = "UPDATE " . $nomeClasse::getNomeTabella() . " SET " . $campo . "='" . $nuovoValore . "' WHERE " . $chiave . "='" . $id . "';";
            //echo $sql;
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $this->pdo->commit();
            $this->closeDbConnection();
            return true;
        } catch (PDOException $e)
            {
                echo "Errore: " . $e->getMessage();
                $this->pdo->rollBack();
                return false;
            }
    }

    /*
     * Metodo che verifica l'esistenza di un campo con un certo valore nella tabella $nomeTabella
     * @param $campo campo da aggiornare
     * @param $valoreCampo valore del campo
     * @param $nomeTabella nome della tabella interessata
     */
    public function exist($campo, $valoreCampo, $nomeTabella)
    {
        try
        {
            $sql = "SELECT * FROM " . $nomeTabella . " WHERE " . $campo . " = '" . $valoreCampo . "';";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $risultato = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $numeroRighe = $stmt->rowCount();
            if($numeroRighe == 0)
            {
                $risultato = NULL;
            }
            return $risultato;

        } catch (Exception $e)
            {
                echo "Errore: " . $e->getMessage();
                $this->pdo->rollBack();
            }
    }

/*
 * metodo che verifica l'esistenza di una specifica occorrenza della tabella Follow
 */
    public function existFollow($followed, $follower)
    {
        try
        {
            $sql = "SELECT * FROM follow WHERE id_seguito ='" . $followed . "' AND id_seguace ='" . $follower . "';";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $risultato = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $numeroRighe = $stmt->rowCount();
            if($numeroRighe == 0)
            {
                $risultato = NULL;
            }
            return $risultato;

        } catch (Exception $e)
        {
            echo "Errore: " . $e->getMessage();
            $this->pdo->rollBack();
        }
    }
    /*
     * metodo che verifica l'esistenza di una specifica occorrenza della tabella Corrispondenza
     */
    public function existCorr($id_w, $id_s)
    {
        try
        {
            $sql = "SELECT * FROM corrispondenze WHERE id_watchlist ='" . $id_w . "' AND id_stv ='" . $id_s . "';";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $risultato = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $numeroRighe = $stmt->rowCount();
            if($numeroRighe == 0)
            {
                $risultato = NULL;
            }
            return $risultato;

        } catch (Exception $e)
        {
            echo "Errore: " . $e->getMessage();
            $this->pdo->rollBack();
        }
    }

    /*
     * metodo che verifica l'esistenza di una specifica occorrenza della tabella Voto
     */
    public function existvote($id_u, $id_s)
    {
        try
        {
            $sql = "SELECT * FROM valutazione WHERE autore ='" . $id_u . "' AND id_episodio ='" . $id_s . "';";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $risultato = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $numeroRighe = $stmt->rowCount();
            if($numeroRighe == 0)
            {
                $risultato = NULL;
            }
            return $risultato;

        } catch (Exception $e)
        {
            echo "Errore: " . $e->getMessage();
            $this->pdo->rollBack();
        }
    }
    /*
     * metodo che verifica l'esistenza di una specifica occorrenza della tabella Visto
     */
    public function existvisto($username, $id_ep)
    {
        try
        {
            $sql = "SELECT * FROM visto WHERE utente ='" . $username . "' AND id_episodio ='" . $id_ep . "';";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $risultato = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $numeroRighe = $stmt->rowCount();
            if($numeroRighe == 0)
            {
                $risultato = NULL;
            }
            return $risultato;

        } catch (Exception $e)
        {
            echo "Errore: " . $e->getMessage();
            $this->pdo->rollBack();
        }
    }


    /*
     * metodo utlizzato per verificare che la password inserita in fase di logni corrisponda con la password hashata presente nel DB
     */

    public function loadVerificaAccessoPWHash ($username, $pass) {

        try
        {
            $sql = null;
            $class = "FUtente";
            $sql = "SELECT * FROM " . $class::getNomeTabella() . " WHERE username = :us";
            //print($sql);
            $stmt = $this->pdo->prepare($sql);
            // $stmt->execute();
            $stmt->execute(array(':us' => $username));
            $numeroRighe = $stmt->rowCount();
            if ($numeroRighe == 0)
                {
                    $risultato = null;
                } else
                    {
                        $risultato = $stmt->fetch(PDO::FETCH_ASSOC);   //ritorna una sola riga
                        if(!password_verify($pass,$risultato["password"])) $risultato = null; //se la passw hashata non corrisponde
                    }
            return $risultato;
        } catch (PDOException $e)
            {
                echo "Errore: " . $e->getMessage();
                $this->db->rollBack();
                return null;
            }
    }

    /*
     * Metodo che permette di eliminare un occorrenza nel db
     * @param $id valore che si vule eliminare
     * @param $chiave specifica il nome del campo utilizzato nella tabella come chiave
     * @return $verifica bool se la cancellazione è andata a buon fine
     */
    public function delete($nometabella,$id,$chiave) {
        try {
            $verifica = null;
            $this->pdo->beginTransaction();

            $sql = "DELETE FROM ".$nometabella." WHERE " . $chiave . " = '" .$id. "' ;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $this->pdo->commit();
            $this->closeDbConnection();
            $verifica = true;

        } catch (PDOException $e)
            {
                echo "Attenzione errore: " . $e->getMessage();
                $this->pdo->rollBack();
            //return false;
            }
        return $verifica;
    }
    /*
     * Metodo che permette di eliminare un occorrenza della tabella Follow nel db
     */
    public function deletefollow($followed,$follower) {
        try {
            $verifica = null;
            $this->pdo->beginTransaction();

            $sql = "DELETE FROM follow WHERE id_seguito ='" . $followed . "' AND id_seguace ='" . $follower . "';";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $this->pdo->commit();
            $this->closeDbConnection();
            $verifica = true;

        } catch (PDOException $e)
        {
            echo "Attenzione errore: " . $e->getMessage();
            $this->pdo->rollBack();
            //return false;
        }
        return $verifica;
    }

    /*
     * Metodo che permette di eliminare un occorrenza della tabella Valutazione nel db
     */
    public function deleteValutazione($autore,$id_e) {
        try {
            $verifica = null;
            $this->pdo->beginTransaction();

            $sql = "DELETE FROM valutazione WHERE autore ='" . $autore . "' AND id_episodio ='" . $id_e . "';";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $this->pdo->commit();
            $this->closeDbConnection();
            $verifica = true;

        } catch (PDOException $e)
        {
            echo "Attenzione errore: " . $e->getMessage();
            $this->pdo->rollBack();
            //return false;
        }
        return $verifica;
    }

    /*
     * Metodo che permette di eliminare un occorrenza della tabella Visto nel db
     */
    public function deletevisto($username,$id_ep) {
        try {
            $verifica = null;
            $this->pdo->beginTransaction();

            $sql = "DELETE FROM visto WHERE utente ='" . $username . "' AND id_episodio ='" . $id_ep . "';";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $this->pdo->commit();
            $this->closeDbConnection();
            $verifica = true;

        } catch (PDOException $e)
        {
            echo "Attenzione errore: " . $e->getMessage();
            $this->pdo->rollBack();
            //return false;
        }
        return $verifica;
    }

    /*
     * Metodo che permette di eliminare un occorrenza della tabella Corrispondenze nel db
     */
    public function deleteCorrispondenze($watch,$serie) {
        try {
            $verifica = null;
            $this->pdo->beginTransaction();

            $sql = "DELETE FROM corrispondenze WHERE id_watchlist ='" . $watch . "' AND id_stv ='" . $serie . "';";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $this->pdo->commit();
            $this->closeDbConnection();
            $verifica = true;

        } catch (PDOException $e)
        {
            echo "Attenzione errore: " . $e->getMessage();
            $this->pdo->rollBack();
            //return false;
        }
        return $verifica;
    }

    /* Chiude la connessione con il db */
    public function closeDBConnection()
    {
        self::$istanza = null;
    }

    /*
     * metodo che estrae tutti i follower dell'utente passato come parametro
     */
    public function loadFollower($idA) {
     //   echo("SELECT id_seguace from follow where id_seguito="." ".$idA.";");
        $stmt = $this->pdo->query("SELECT id_seguace from follow where id_seguito='".$idA."';");
        $righe = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $numeroRighe = $stmt->rowCount();
        if($numeroRighe == 0) $righe = null;
        return $righe;
    }

    /*
     * metodo che estrae tutti gli utenti seguiti dall'utente passato come parametro
     */
    public function loadFollowed($idA) {
        $stmt = $this->pdo->query("SELECT id_seguito from follow where id_seguace='".$idA."';");
        $righe = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $numeroRighe = $stmt->rowCount();
        if($numeroRighe == 0) $righe = null;
        return $righe;
    }

    /*
     * metodo che inserisce un occorrenza nella tabella Follow del DB
     */
    public function storeFollow($id_seguito,$id_seguace)
    {

        try
        {
            $this->pdo->beginTransaction();
            $sql = "INSERT INTO follow (id_seguito,id_seguace)  VALUES (:id_seguito,:id_seguace)";
            $stmt = $this->pdo->prepare($sql);
            //print($sql);
            $stmt->execute(array(':id_seguito' => $id_seguito, ':id_seguace' => $id_seguace,));
            $this->pdo->commit();
            $this->closeDBConnection();

        } catch (Exception $e)
            {
                 echo "Errore: " . $e->getMessage();
                 $this->pdo->rollBack();
                 return null;
             }
    }

    /*
     * metodo che estrae tutti gli id delle serie presenti nella watchlist passata come parametro
     */
    public function loadCorr($id_Watchlist)
    {
        $stmt = $this->pdo->query("SELECT * from corrispondenze where id_watchlist= '". $id_Watchlist."';");
        $righe = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $numeroRighe = $stmt->rowCount();
        if($numeroRighe == 0) $righe = null;
        return $righe;
    }

    /*
     * metodo che crea un'occorrenza nella tabella Corrispondenza del DB
     */
    public function storeCorr($id_watchlist,$id_stv)
    {
        try
        {
            $this->pdo->beginTransaction();
            $sql = "INSERT INTO corrispondenze (id_watchlist,id_stv)  VALUES (:id_watchlist,:id_stv)";
            $stmt = $this->pdo->prepare($sql);
            //print($sql);
            $stmt->execute(array(':id_watchlist' => $id_watchlist, ':id_stv' => $id_stv,));
            $this->pdo->commit();
            $this->closeDBConnection();

        } catch (Exception $e)
            {
                echo "Errore: " . $e->getMessage();
                $this->pdo->rollBack();
                return null;
            }
    }

    /*
     * metodo che crea un'occorrenza nella tabella Visto del DB
     */
    public function storeVisto($utente,$id_episodio)
    {
        try
        {
            $this->pdo->beginTransaction();
            $sql = "INSERT INTO visto (utente,id_episodio)  VALUES (:utente,:id_episodio)";
            $stmt = $this->pdo->prepare($sql);
            //print($sql);
            $stmt->execute(array(':utente' => $utente, ':id_episodio' => $id_episodio,));
            $this->pdo->commit();
            $this->closeDBConnection();

        } catch (Exception $e)
        {
            echo "Errore: " . $e->getMessage();
            $this->pdo->rollBack();
            return null;
        }
    }

    /*
     * metodo che estrae tutti gli id degli episodi dell utente  passato come parametro
     */
    public function loadvisto($username)
    {
        $stmt = $this->pdo->query("SELECT * from visto where utente= '". $username."';");
        $righe = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $numeroRighe = $stmt->rowCount();
        if($numeroRighe == 0) $righe = null;
        return $righe;
    }

    /*
     * metodo che estrae il genere passato come parametro
     */
    public function loadGenere($genere)
    {
        $stmt = $this->pdo->query("SELECT * from genere where genere = '". $genere."';");
        $righe = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $numeroRighe = $stmt->rowCount();
        if($numeroRighe == 0) $righe = null;
        return $righe;
    }

    /*
     * metodo che crea un'occorrenza nella tabella Genere del DB
     */
    public function storeGenere($genere)
    {
        try
        {
            $this->pdo->beginTransaction();
            $sql = "INSERT INTO genere (genere)  VALUES (:genere)";
            $stmt = $this->pdo->prepare($sql);
            //print($sql);
            $stmt->execute(array(':genere' => $genere));
            $this->pdo->commit();
            $this->closeDBConnection();

        } catch (Exception $e)
            {
                echo "Errore: " . $e->getMessage();
                $this->pdo->rollBack();
                return null;
            }
    }

    /*
     * metodo che estrae la lingua passata come parametro
     */
    public function loadLingua($lingua)
    {
        $stmt = $this->pdo->query("SELECT * from lingua where lingua = '". $lingua."';");
        $righe = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $numeroRighe = $stmt->rowCount();
        if($numeroRighe == 0) $righe = null;
        return $righe;
    }

    /*
     * metodo che crea un'occorrenza nella tabella Lingua del DB
     */
    public function storeLingua($lingua)
    {
        try
        {
            $this->pdo->beginTransaction();
            $sql = "INSERT INTO lingua (lingua)  VALUES (:lingua)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array(':lingua' => $lingua));
            $this->pdo->commit();
            $this->closeDBConnection();

        } catch (Exception $e)
            {
                echo "Errore: " . $e->getMessage();
                $this->pdo->rollBack();
                return null;
            }
    }

    /*
     * metodo che estrae tutte le lingue della stagione passata come parametro
     */
    public function loadSTGlingua($id_stg)
    {
        $stmt = $this->pdo->query("SELECT * from STGLingua where id_stagione= '". $id_stg."';");
        $righe = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $numeroRighe = $stmt->rowCount();
        if($numeroRighe == 0) $righe = null;
        return $righe;
    }

    /*
     * metodo che crea un'occorrenza nella tabella STGLingua del DB
     */
    public function storeSTGlingua($id_lingua,$id_stg)
    {
        try
        {
            $this->pdo->beginTransaction();
            $sql = "INSERT INTO STGLingua (id_lingua,id_stagione)  VALUES (:id_lingua,:id_stagione)";
            $stmt = $this->pdo->prepare($sql);
            //print($sql);
            $stmt->execute(array(':id_lingua' => $id_lingua, ':id_stagione' => $id_stg,));
            $this->pdo->commit();
            $this->closeDBConnection();

        } catch (Exception $e)
            {
                echo "Errore: " . $e->getMessage();
                $this->pdo->rollBack();
                return null;
            }
    }

    /*
     * metodo che estrae tutti generi della serieTV passata come parametro
     */
    public function loadTVgenere($id_tv)
    {
        $stmt = $this->pdo->query("SELECT * from TVgenere where id_serie= '". $id_tv."';");
        $righe = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $numeroRighe = $stmt->rowCount();
        if($numeroRighe == 0) $righe = null;
        return $righe;
    }

    /*
     * metodo che estrae tutte le serieTv del genere passato come parametro
     */
    public function loadGenereTv($genere)
    {
        $stmt = $this->pdo->query("SELECT id_serie from TVgenere where id_genere= '". $genere."';");
        $righe = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $numeroRighe = $stmt->rowCount();
        if($numeroRighe == 0) $righe = null;
        return $righe;
    }

    /*
     * metodo che crea un'occorrenza nella tabella TVgenere del DB
     */
    public function storeTVgenere($id_genere,$id_serie)
    {
        try
        {
            $this->pdo->beginTransaction();
            $sql = "INSERT INTO TVgenere (id_genere,id_serie)  VALUES (:id_genere,:id_serie)";
            $stmt = $this->pdo->prepare($sql);
            //print($sql);
            $stmt->execute(array(':id_genere' => $id_genere, ':id_serie' => $id_serie,));
            $this->pdo->commit();
            $this->closeDBConnection();

        } catch (Exception $e)
            {
                echo "Errore: " . $e->getMessage();
                $this->pdo->rollBack();
                return null;
            }
    }

    /*
     * metodo che cancella un'occorrenza nella tabella TVgenere del DB
     */
    public function deleteTvGenere($genere,$serie) {
        try {
            $verifica = null;
            $this->pdo->beginTransaction();

            $sql = "DELETE FROM TVgenere WHERE id_genere ='" . $genere . "' AND id_serie ='" . $serie . "';";
            echo $sql;
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $this->pdo->commit();
            $this->closeDbConnection();
            $verifica = true;

        } catch (PDOException $e)
        {
            echo "Attenzione errore: " . $e->getMessage();
            $this->pdo->rollBack();
            //return false;
        }
        return $verifica;
    }

    /*
     * metodo che cancella un'occorrenza nella tabella STGlingua del DB
     */
    public function deleteSTGlingua($lingua,$stg) {
        try {
            $verifica = null;
            $this->pdo->beginTransaction();

            $sql = "DELETE FROM STGLingua WHERE id_lingua ='" . $lingua . "' AND id_stagione ='" . $stg . "';";
            echo $sql;
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $this->pdo->commit();
            $this->closeDbConnection();
            $verifica = true;

        } catch (PDOException $e)
        {
            echo "Attenzione errore: " . $e->getMessage();
            $this->pdo->rollBack();
            //return false;
        }
        return $verifica;
    }
}
