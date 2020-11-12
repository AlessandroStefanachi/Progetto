<?php


class ESerieTv
{
    private String $titolo;
    private String $trama;
    private  $genere=array();
    private int $valutazione=0;
    private String $regista;
    private $stagioni=array();
    private String $tipo;//solo disponibile o in uscita
    private $id;

    /**
     * ESerieTv constructor.
     * @param String $titolo
     * @param String $trama
     * @param array $genere
     * @param String $regista
     * @param array $stagioni
     * @param String $tipo
     */
    public function __construct(String $_titolo, String $_trama, String $_regista, String $_tipo)
    {
        $this->titolo = $_titolo;
        $this->trama = $_trama;
        $this->regista = $_regista;
        $this->tipo = $_tipo;
    }
///////////////////////////////////////////////////////////////////////GETTERS/////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * @return String
     */
    public function getTitolo(): String
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
    public function getTrama(): String
    {
        return $this->trama;
    }

    /**
     * @return array
     */
    public function getGenere(): array
    {
        return $this->genere;
    }

    /**
     * @return int
     */
    public function getValutazione(): int
    {   $this->calcolaValutazione();
        return $this->valutazione;
    }

    /**
     * @return String
     */
    public function getRegista(): String
    {
        return $this->regista;
    }

    /**
     * @return array
     */
    public function getStagioni(): array
    {
        return $this->stagioni;
    }

    /**
     * @return String
     */
    public function getTipo(): String
    {
        return $this->tipo;
    }

/////////////////////////////////////////////////////////////////////////SETTERS///////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @param String $titolo
     */
    public function setTitolo(String $titolo): void
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
    public function setTrama(String $trama): void
    {
        $this->trama = $trama;
    }

    /**
     * @param array $genere
     */
    public function setGenere(array $genere): void
    {
        $this->genere = $genere;
    }

    /**
     * @param int $valutazione
     */
    public function setValutazione(int $valutazione): void
    {
        $this->valutazione = $valutazione;
    }

    /**
     * @param String $regista
     */
    public function setRegista(String $regista): void
    {
        $this->regista = $regista;
    }

    /**
     * @param array $stagioni
     */
    public function setStagioni(array $stagioni): void
    {
        $this->stagioni = $stagioni;
    }

    /**
     * @param String $tipo
     */
    public function setTipo(String $tipo): void
    {
        $this->tipo = $tipo;
    }

//////////////////////////////////////METODO PER AGGIUNGERE UNA STAGIONE////////////////////////////////////////////////////////////////////////////////////////////////

    public function aggiungiStagione(EStagione $stagione):void
    {
        $stagione->setNumero(count($this->stagioni)+1);
        array_push($this->stagioni, $stagione);
    }
///////////////////////////////////////////////////METODO PER IL CALCOLO DELLA VALUTAZIONE//////////////////////////////////////////////////////////////////////////////////////////////

    private function calcolaValutazione():void
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

    public function __toString(): String
    {
        $str="Titolo: ".$this->getTitolo()."\n"."Trama: ".$this->getTrama()."\n"."Genere: ".$this->ArrayToString($this->getGenere())."\n"."Valutazione: ".$this->getValutazione()."\n"."Regista: ".$this->getRegista()."\n"."Stagioni: ".$this->ArrayToString($this->getStagioni())."\n";
        return $str;
    }

}