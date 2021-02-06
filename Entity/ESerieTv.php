<?php


class ESerieTv
{
    /*
     * classe contenente metodi ed attributi relativi alle copertine delle serie tv
     * -titolo: titolo associato alla serie tv
     * -trama: trama associata alla serie tv
     * - genere: array contenente i generi ai quali la serie tv è associata
     * -valutazione: valutazione associata alla serie tv
     * -regista: regista associato alla serie tv
     * -stagioni: stagioni appartenenti alla serie tv
     * -id: identificativo univoco
     * -copertina:copertina associata alla serie tv
     * -id_copertina:chiave esterna associata alla copertina
     */
    private  $titolo;
    private  $trama;
    private $genere=array();
    private  $valutazione=0;
    private  $regista;
    private $stagioni=array();

    private $id;
    private $copertina;
    private $id_copertina;



    public function __construct( $_titolo,  $_trama,  $_regista)
    {
        $this->titolo = $_titolo;
        $this->trama = $_trama;
        $this->regista = $_regista;

    }
///////////////////////////////////////////////////////////////////////GETTERS/////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * @return String
     */
    public function getTitolo()
    {
        return $this->titolo;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return String
     */
    public function getTrama()
    {
        return $this->trama;
    }

    /**
     * @return array
     */
    public function getGenere()
    {
        return $this->genere;
    }

    /**
     * @return int
     */
    public function getValutazione()
    {   $this->calcolaValutazione();
        return $this->valutazione;
    }
    public function getCopertina( )
    {
       return $this->copertina;

    }
    public function getId_copertina(){
        return $this->id_copertina;
    }
    /**
     * @return String
     */
    public function getRegista()
    {
        return $this->regista;
    }

    /**
     * @return array
     */
    public function getStagioni()
    {
        return $this->stagioni;
    }



/////////////////////////////////////////////////////////////////////////SETTERS///////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @param String $titolo
     */
    public function setTitolo( $titolo)
    {
        $this->titolo = $titolo;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param String $trama
     */
    public function setTrama( $trama)
    {
        $this->trama = $trama;
    }

    /**
     * @param array $genere
     */
    public function setGenere(array $genere)
    {
        $this->genere = $genere;
    }

    /**
     * @param int $valutazione
     */
    public function setValutazione( $valutazione)
    {
        $this->valutazione = $valutazione;
    }

    /**
     * @param String $regista
     */
    public function setRegista( $regista)
    {
        $this->regista = $regista;
    }

    /**
     * @param array $stagioni
     */
    public function setStagioni(array $stagioni)
    {
        $this->stagioni = $stagioni;
    }


    public function setCopertina( $copertina)
    {
        $this->copertina = $copertina;
        //$this->setId_copertina($copertina->getid());
    }
    public function setId_copertina($id_copertina){
        $this->id_copertina=$id_copertina;
    }
//////////////////////////////////////METODO PER AGGIUNGERE UNA STAGIONE////////////////////////////////////////////////////////////////////////////////////////////////

    public function aggiungiStagione( $stagione)
    {
        $stagione->setNumero(count($this->stagioni)+1);
        array_push($this->stagioni, $stagione);
    }

    public function aggiungiGenere( $genere)
    {
        //$stagione->setNumero(count($this->stagioni)+1);
        array_push($this->genere, $genere);
    }
///////////////////////////////////////////////////METODO PER IL CALCOLO DELLA VALUTAZIONE//////////////////////////////////////////////////////////////////////////////////////////////
///
/*
 * calcola la valutazione della serie tv facendo la media aritmetica delle valutazioni delle stagioni associate alle serie tv
 */

    private function calcolaValutazione()
    {
        $media=0;
        ///////////////non va int $media /////////////////////////////////
        if(count($this->stagioni)>0){
        foreach ($this->getStagioni() as $value)
        {
            $media=$media+$value->getValutazione();

        }
        $this->valutazione=$media/count($this->stagioni);}
    }

    function order($a, $b)
    {
        if ($a->getNumero() == $b->getNumero()) {
            return 0;
        }
        return ($a->getNumero() < $b->getNumero()) ? -1 : 1;

    }
    /*
     * funzione che ordina l'array stagioni in base all'attributo numero associato alle stagioni
     */
    public function ordinaStagioni(){

        usort($this->stagioni, "ESerietv::order");
    }
///////////////////////////////////////////////////////////////METODI TO STRING///////////////////////////////////////////////////////////////////////
    /**
     * Stampa tutti gli elementi di un array come un unica stringa
     * @return String
     */
    private function ArrayToString ($array)
    {
        $str = null;
        if (is_array($array))
            foreach ($array as $valore) {
                if(is_string($valore))
                $str = $str."-".$valore;
                else{
                    $str=$str."\n".$valore->__toString();//qui non array mentre in wathclist si (?)
                }
            }
        else
            $str = $array;
        return $str;
    }

    public function __toString()
    {
        $str="Titolo: ".$this->getTitolo()."\n"."Trama: ".$this->getTrama()."\n"."Genere: ".$this->ArrayToString($this->getGenere())."\n"."Valutazione: ".$this->getValutazione()."\n"."Regista: ".$this->getRegista()."\n"."Stagioni: ".$this->ArrayToString($this->getStagioni())."\n";
        return $str;
    }

}