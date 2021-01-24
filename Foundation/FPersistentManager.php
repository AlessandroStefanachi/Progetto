<?php

class FPersistentManager
{

    /*
     *Metodo che permette di salvare un oggetto sul db
     * @param $oggetto oggetto da salvare
     */
    public static function store($oggetto)
    {
        $EClass = get_class($oggetto);
        $FClass = substr_replace($EClass,"F","0",1);
        $FClass::store($oggetto);
    }

    /*
     *Metodo che permette di prelevare uno o più oggetti dal db
     * @param $campo campo della tabella interessata
     * @param $valoreCampo il valore del campo
     * @param $nomeClasse il nome della classe foundation da richiamare per prelevare l'/gli oggetto/i
     * @return
     */
    public static function load($campo, $valoreCampo, $nomeClasse)
    {
        $risultato = $nomeClasse::load($campo, $valoreCampo);
        return $risultato;
    }


    /*
     *Metodo che permette di prelevare un utente registrato dal db
     *richiamando però il metodo che verifica la corrispondenza della password inserita(in chiaro)
     *tramite post e la password hashata nel db
     * @param $username
     * @param $pass
     * @return EUtente|null
     */
    public static function loadLoginPWHash($username, $pass)
    {
        $risultato = null;
        $risultato = FUtente::loadLoginPWHash($username, $pass);
        return $risultato;
    }

    /** verifica è boolean e ci dice se la richiesta di update è andata a buon fine */
    public static function update($campo, $nuovoValore, $chiave, $id, $nomeClasse)
    {

        ////////////////////////////DA MODIFICARE CON LE CLASSI DI TVTRACKER///////////////////////////////////////////////
        if ($nomeClasse == "FWatchlist" || $nomeClasse == "FUtente" || $nomeClasse == "FEpisodio"
            || $nomeClasse == "FStagione" || $nomeClasse == "FSerieTv"||$nomeClasse="FCommento") {
            $verifica = $nomeClasse::update($campo, $nuovoValore, $chiave, $id);
            return $verifica;
        } else return false;
    }

    /*
     * Metodo che accerta l'esistenza di un valore di un campo passato come parametro
     * @param $campo da testare
     * @param $vaoreCampo ,valore da cercare
     * @param $nomeClasse , nome della classe Foundation interessata
     * @return null
     */
    public static function exist($campo, $valoreCampo, $nomeClasse)
    {
        $risultato = null;
        $risultato = $nomeClasse::exist($campo, $valoreCampo);
        return $risultato;
    }

    /*Metodo che permette di cancellare un commento dato l'id*/
    public static function delete($nomeClasse,$id)
    {
        $verifica = null;
        $verifica = $nomeClasse::delete($id);
        return $verifica;
    }

    public static function loadFollower($idA)
    {
        $follower = FFollow::load($idA,1);
        return $follower;

    }

    public static function loadFollowed($idA)
    {
        $follower = FFollow::load($idA, 0);
        return $follower;

    }

    public static function storeFollower($idA, $idB)
    {
        FFollow::store($idA, $idB);
    }

    public static function loadCorrispondenze($id_watchlist)
    {
        $corrispondenze = FCorrispondenze::load($id_watchlist);
        return $corrispondenze;

    }

    public static function storeCorrispondenze($id_watchlist, $id_stv)
    {
        FCorrispondenze::store($id_watchlist, $id_stv);

    }

    public static function loadvisto($username)
    {
        $corrispondenze = FVisto::load($username);
        return $corrispondenze;

    }

    public static function storevisto($username, $id_episodio)
    {
        FVisto::store($username, $id_episodio);

    }


    public static function loadGenere($genere)
    {
        $genere = FGenere::load($genere);

        return $genere;
    }
public static function AllGenere(){
        $genere1=FGenere::loadAll();
        $genere=array();
        foreach ($genere1 as $value)array_push($genere,$value['genere']);
        return $genere;

}
    public static function storeGenere($genere)
    {
        FGenere::store($genere);

    }

    public static function loadLingua($id_lingua)
    {
        $lingua = FLingua::load($id_lingua);
        return $lingua;
    }

    public static function storeLingua($lingua)
    {
        FLingua::store($lingua);

    }

    public static function loadSTGlingua($id_stg)
    {
        $STGlingua = FSTGlingua::load($id_stg);
        return $STGlingua;
    }

    public static function storeSTGlingua($id_lingua, $id_stg)
    {
        FSTGlingua::store($id_lingua, $id_stg);

    }

    public static function loadTVgenere($id_tv)
    {
        $TVgenere = FTVgenere::load($id_tv);
        return $TVgenere;
    }

    public static function loadGenereTv($genere)
    {
        $TVgenere = FTVgenere::loadbygen($genere);
        return $TVgenere;
    }

    public static function storeTVgenere($id_genere, $id_serie)
    {
        FTVgenere::store($id_genere, $id_serie);

    }
    public static function existFollow($followed, $follower)
    {
        $ris=FFollow::existFollow($followed,$follower);
        return $ris;

    }

    public static function existCorr($id_w, $id_s)
    {
        $ris=FFollow::existFollow($id_w,$id_s);
        return $ris;

    }

    public static function existval($id_u, $id_s)
    {
        $ris=FValutazione::existval($id_u,$id_s);
        return $ris;

    }
    //metodo per estrarre 9 serie casuali da far comparire in homelog
    public static function homepagedef(){
        $id=FSerieTv::getId();
       // echo($id[0]["id"]);
        $valor=array();
      $i=count($id);
       for($a=0;$a<$i;$a++)array_push($valor,$id[$a]['id']);
        $i=0;
        $serie=array();
        $usato=array();
        if(count($id)>=9){
        while($i<9){
            $rand=rand(min($valor),max($valor));
            if(FSerieTv::exist("id",$rand)&& !(in_array($rand,$usato))){
                $s=FSerieTv::load("id",$rand);
                array_push($serie,clone($s[0]));
                array_push($usato,$rand);
                $i++;
            }

        }}
        $s=array();
        foreach ($serie as $a)array_push($s,base64_encode($a->getCopertina()->getImmagine()));
        return array($serie,$s);

    }

    public static function AllSeries($order){
        $serie=FSerieTv::loadAll();
        if(isset($order)){
            if($order=='crescente'){
                function cmp($a, $b)
                {
                    if ($a->getValutazione() == $b->getValutazione()) {
                        return 0;
                    }
                    return ($a->getValutazione() < $b->getValutazione()) ? 1 : -1;

                }
                usort($serie, "cmp");

            }

            if($order=='decrescente'){
                function cmp($a, $b)
                {
                    if ($a->getValutazione() == $b->getValutazione()) {
                        return 0;
                    }
                    return ($a->getValutazione() < $b->getValutazione()) ? -1 : 1;

                }
                usort($serie, "cmp");
            }
        }
        $s=array();
        foreach ($serie as $a)array_push($s,base64_encode($a->getCopertina()->getImmagine()));
        return array($serie,$s);
    }

    public static function filter($genere,$order)
    {
        $valor = FTVgenere::loadbygen($genere);
        $id_series = array();
        if(isset($valor))
        $i = count($valor);
        else $i=0;
        $serie=array();
        for ($a = 0; $a < $i; $a++) array_push($id_series, $valor[$a]['id_serie']);
        foreach ($id_series as $id) {
            if (FSerieTv::exist("id", $id)) {
                $s = FSerieTv::load("id", $id);
                array_push($serie, clone($s[0]));


            }

        }

        if(isset($order)){
            if($order=='crescente'){
                function cmp($a, $b)
                {
                    if ($a->getValutazione() == $b->getValutazione()) {
                        return 0;
                    }
                    return ($a->getValutazione() < $b->getValutazione()) ? 1 : -1;

                }
                usort($serie, "cmp");

            }

            if($order=='decrescente'){
                function cmp($a, $b)
                {
                    if ($a->getValutazione() == $b->getValutazione()) {
                        return 0;
                    }
                    return ($a->getValutazione() < $b->getValutazione()) ? -1 : 1;

                }
                usort($serie, "cmp");
            }
        }


        $s=array();
        foreach ($serie as $a)array_push($s,base64_encode($a->getCopertina()->getImmagine()));
        return array($serie,$s);
    }


    //metodo per estrarre 6 watchlist casuali da far comparire in homelog
    public static function watches(){
        $id=FWatchlist::getIDfrom('pubblico',true);
        // echo($id[0]["id"]);
        $valor=array();
        $i=count($id);
        for($a=0;$a<$i;$a++)array_push($valor,$id[$a]['id']);
        $i=0;
        $watch=array();
        $usato=array();
        if(count($id)>=0){
            if(count($id)>=6)$it=6;
            else $it=count($id);
            while($i<$it){
                $rand=rand(min($valor),max($valor));
                if(FWatchlist::exist("id",$rand)&& !(in_array($rand,$usato))&& in_array($rand,$valor)){
                    $s=FWatchlist::load("id",$rand);

                    array_push($watch,clone($s[0]));
                    array_push($usato,$rand);
                    $i++;
                }

            }}
        $series=array();
        foreach ($watch as $a) array_push($series,$a->getSerie());
        $s=array();
        foreach ($series as $a){if(isset($a[0]) )array_push($s,base64_encode($a[0]->getCopertina()->getImmagine()));
        else array_push($s,null);
        }
        $type=array();
        foreach ($series as $a){ if(isset($a[0]) ) array_push($type,$a[0]->getCopertina()->getType());
        else array_push($type,null);}

        return array($watch,$s,$type);

    }

    public static function deleteFollow($followed,$follower){
        FFollow::delete($followed,$follower);
    }
}

/*
Metodo che permette di prelevare un utente registrato dal db
richiamando però il metodo che verifica la corrispondenza della password inserita(in chiaro)
tramite post e la password in chiaro nel db
@param $username
@param $pass è la password
 */
/*
public static function loadLogin($username, $pass) {
    $risultato = null;
    $risultato = FUtenteRegistrato::loadLogin($username, $pass);
    return $risultato;
}
*/