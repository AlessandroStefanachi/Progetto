<?php

class FPersistentManager
{
    /*
     *Metodo che permette di salvare un oggetto sul db
     * @param $oggetto oggetto da salvare
     * Estrae il nome della calsse Entity dell'oggetto passato come parametro
     * Sostituisce la E con la F e genera il nome di una classe Foundation
     * Richiama il metodo store associato alla classe Foundation
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

    /*
     * metodo per aggiornare occorrenze delle tabelle specificate
     * @param $campo nome del campo da aggiornare
     * @param $nuovoValore e il nuovo valore che vuoi inserie
     * @param $chiave specifica la chiave della tabella
     * @param $id valore della chiave associata all'occorrenza da aggiornare
     * @param $nomeClasse nome della classe a cui appartiene l'occorrenza da modificare
     */
    public static function update($campo, $nuovoValore, $chiave, $id, $nomeClasse)
    {

        if ($nomeClasse == "FWatchlist" || $nomeClasse == "FUtente" || $nomeClasse == "FEpisodio"
            || $nomeClasse == "FStagione" || $nomeClasse == "FSerieTv"||$nomeClasse=="FCommento"||$nomeClasse=='FCopertina') {
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

    /*
     * metodo che permette di cancellare un'occorrenza della tabella
     */
    public static function delete($nomeClasse,$id)
    {
        $verifica = null;
        $verifica = $nomeClasse::delete($id);
        return $verifica;
    }

    /*
     * metodo che comunica con la classe FFollow per estrarre tutti i follower dell'utente passato come parametro
     */
    public static function loadFollower($idA)
    {
        $follower = FFollow::load($idA,1);
        return $follower;

    }

    /*
     * metodo che comunica con la classe FFollow per estrarre  tutti gli utenti seguti dell'utente passato come parametro
     */
    public static function loadFollowed($idA)
    {
        $follower = FFollow::load($idA, 0);
        return $follower;

    }

    /*
     * metodo che comunica con la classe FFollow per salvare un'occorrenza nella tabella Follower del DB
     */
    public static function storeFollower($idA, $idB)
    {
        FFollow::store($idA, $idB);
    }

    /*
     * metodo che comunica con la classe FCorrispondenze per estrarre tutti gli id delle serieTV della Watchlist passata come parametro
     */
    public static function loadCorrispondenze($id_watchlist)
    {
        $corrispondenze = FCorrispondenze::load($id_watchlist);
        return $corrispondenze;

    }

    /*
     * metodo che comunica con la classe FCorrispondenze per salvare un'ccorrenza nella tabella Corrispondenze del DB
     */
    public static function storeCorrispondenze($id_watchlist, $id_stv)
    {
        FCorrispondenze::store($id_watchlist, $id_stv);

    }

    /*
     * metodo che comunica con la classe FVisto per estrarre tutti gli episodi visti dall'utente passato come parametro
     */
    public static function loadvisto($username)
    {
        $corrispondenze = FVisto::load($username);
        return $corrispondenze;

    }
    /*
     * metodo che comunica con la classe FVisto per salvare un'occorrenza nella tabella Visto del DB
     */
    public static function storevisto($username, $id_episodio)
    {
        FVisto::store($username, $id_episodio);

    }

    /*
     * metodo che comunica con la classe FGenere per estrarre il genere passato come parametro
     */
    public static function loadGenere($genere)
    {
        $genere = FGenere::load($genere);

        return $genere;
    }

    /*
     * metodo che comunica con la classe FGenere per estrarre tutti i generi dalla tabella Generi del DB
     */
    public static function AllGenere()
    {
        $genere1=FGenere::loadAll();

        $genere=array();
    if (isset($genere1))   foreach ($genere1 as $value)array_push($genere,$value['genere']);
        return $genere;

    }
    /*
     * metodo che comunica con la classe FGenere per salvare un'occorrenza nella tabella Genere del DB
     */
    public static function storeGenere($genere)
    {
        FGenere::store($genere);

    }

    /*
     * metodo che comunica con la classe FLingua per estrarre la lingua passata come parametro
     */
    public static function loadLingua($id_lingua)
    {
        $lingua = FLingua::load($id_lingua);
        return $lingua;
    }

    /*
     * metodo che comunica con la classe FLingua per salvare un'occorrenza nella tabella Lingua del DB
     */
    public static function storeLingua($lingua)
    {
        FLingua::store($lingua);

    }

    /*
     * metodo che comunica con la classe FSTGlingua per estrarre tutte le lingue della stagione passata come parametro
     */
    public static function loadSTGlingua($id_stg)
    {
        $STGlingua = FSTGlingua::load($id_stg);
        return $STGlingua;
    }

    /*
     * metodo che comunica con la classe FSTGlingua per salvare un'occorrenza nella tabella STGlingua del DB
     */
    public static function storeSTGlingua($id_lingua, $id_stg)
    {
        FSTGlingua::store($id_lingua, $id_stg);

    }

    /*
     * metodo che comunica con la classe FSTGlingua per eliminare un'occorrenza nella tabella STGlingua del DB
     */
    public static function deleteSTGlingua($id_lingua, $id_stg)
    {
        FSTGlingua::delete($id_lingua, $id_stg);

    }

    /*
     * metodo che comunica con la classe FTVgenere per estrarre tutti i generi della serieTV passata come parametro
     */
    public static function loadTVgenere($id_tv)
    {
        $TVgenere = FTVgenere::load($id_tv);
        return $TVgenere;
    }

    /*
     * metodo che comunica con la classe FTvGenee  per eliminare un'occorrenza nella tabella TvGenere del DB
     */
    public static function deleteTvGenere($genere,$id_tv)
    {
        FTVgenere::delete($genere,$id_tv);
        //return $TVgenere;
    }

    /*
     * metodo che comunica con la classe FTVgenere per estrarre tutte le serieTv del genere passato come parametro
     */
    public static function loadGenereTv($genere)
    {
        $TVgenere = FTVgenere::loadbygen($genere);
        return $TVgenere;
    }

    /*
     * metodo che comunica con la classe FTVgenere per salvare un'occorrenza nella tabella TVgenere del DB
     */
    public static function storeTVgenere($id_genere, $id_serie)
    {
        FTVgenere::store($id_genere, $id_serie);

    }
    /*
     * metodo che comunica con la classe FFollow per verificare l'esistenza di un'occorrenza nella tabella Follow del DB
     */
    public static function existFollow($followed, $follower)
    {
        $ris=FFollow::existFollow($followed,$follower);
        return $ris;

    }

    /*
     * metodo che comunica con la classe FCorrispondenza per verificare l'esistenza di un'occorrenza nella tabella Corrispondenza del DB
     */
    public static function existCorr($id_w, $id_s)
    {
        $ris=FCorrispondenze::existcorr($id_w,$id_s);

        return $ris;

    }

    /*
     * metodo che comunica con la classe FValutazione per verificare l'esistenza di un'occorrenza nella tabella Valutazione del DB
     */
    public static function existVal($id_u, $id_s)
    {
        $ris=FValutazione::existval($id_u,$id_s);
        return $ris;

    }

    /*
     * metodo che comunica con la classe FVisto per verificare l'esistenza di un'occorrenza nella tabella Visto del DB
     */
    public static function existvisto($username, $id_ep)
    {
        $ris=FVisto::existvisto($username,$id_ep);
        return $ris;

    }


    /*
     * metodo per estrarre 9 serie casuali da far comparire in homepagedef
     */
    public static function homepagedef(){
        $id=FSerieTv::getId();
       // echo($id[0]["id"]);
        $valor=array();
        if(isset($id))
      $i=count($id);
        else {$i=0;$id=[0];}
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
        foreach ($serie as $a){if($a->getCopertina()!=null)array_push($s,base64_encode($a->getCopertina()->getImmagine()));else array_push($s,null);}
        return array($serie,$s);

    }

    /*
     * metodo per far comparire tutte le serie tv in Homepage ed eventualmente ordinarle
     */
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
                if(isset($serie))usort($serie, "cmp");

            }

            if($order=='decrescente'){
                function cmp($a, $b)
                {
                    if ($a->getValutazione() == $b->getValutazione()) {
                        return 0;
                    }
                    return ($a->getValutazione() < $b->getValutazione()) ? -1 : 1;

                }
                if(isset($serie))usort($serie, "cmp");
            }
        }
        $s=array();
       if(isset($serie)) foreach ($serie as $a){if($a->getCopertina()!=null)array_push($s,base64_encode($a->getCopertina()->getImmagine()));else array_push($s,null);}
        return array($serie,$s);
    }

    /*
     * metodo per filtrare le serie tv in Homepage in base al genere
     */
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


    /*
     * metodo per estrarre 6 watchlist casuali da far comparire in homepage
     */
    public static function watches(){
        $id=FWatchlist::getIDfrom('pubblico',true);
        // echo($id[0]["id"]);
        $valor=array();
        if(!isset($id))$i=0;
        else
        $i=count($id);
        for($a=0;$a<$i;$a++)array_push($valor,$id[$a]['id']);
        $i=0;
        $watch=array();
        $usato=array();
        if(isset($id)){
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

            }}}
        $series=array();
        foreach ($watch as $a) array_push($series,$a->getSerie());
        $s=array();
        foreach ($series as $a){if(isset($a[0])&& $a[0]->getCopertina()!=null )array_push($s,base64_encode($a[0]->getCopertina()->getImmagine()));
        else array_push($s,null);
        }
        $type=array();
        foreach ($series as $a){ if(isset($a[0])&&$a[0]->getCopertina()!=null) array_push($type,$a[0]->getCopertina()->getType());
        else array_push($type,null);}

        return array($watch,$s,$type);

    }

    /*
     * metodo che comunica con la classe FFollow  per eliminare un'occorrenza nella tabella Follower del DB
     */
    public static function deleteFollow($followed,$follower)
    {
        FFollow::delete($followed,$follower);
    }

    /*
     * metodo che comunica con la classe FVisto  per eliminare un'occorrenza nella tabella Visto del DB
     */
    public static function deletevisto($username,$id_ep)
    {
        FVisto::delete($username,$id_ep);
    }

    /*
     * metodo che comunica con la classe FCorrispondenze  per eliminare un'occorrenza nella tabella Corrispondenze del DB
     */
    public static function deleteCorrispondenze($watch,$serie)
    {
        FCorrispondenze::delete($watch,$serie);
    }

    /*
     * metodo che comunica con la classe FValutazione  per eliminare un'occorrenza nella tabella Valutazione del DB
     */
    public static function deleteValutazione($autore,$id_e)
    {
        FValutazione::delete($autore,$id_e);
    }
    
    public static function loadAll($nomeClasse){
        $ris=$nomeClasse::loadAll();
        return $ris;
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