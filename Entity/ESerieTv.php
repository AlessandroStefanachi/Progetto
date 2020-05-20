<?php


class ESerieTv
{
    private String $titolo;
    private String $trama;
    private  $genere=array();
    private int $valutazione=0;
    private String $regista;
    private $stagioni=array();

    /**
     * ESerieTv constructor.
     * @param String $titolo
     * @param String $trama
     * @param array $genere
     * @param String $regista
     * @param array $stagioni
     */
    public function __construct(String $_titolo, String $_trama, array $_genere, String $_regista, array $_stagioni)
    {
        $this->titolo = $_titolo;
        $this->trama = $_trama;
        $this->genere = $_genere;
        $this->regista = $_regista;
        foreach ($_stagioni as &$value)
            $this->aggiungiStagione($value);
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
/////////////////////////////////////////////////////////////////////////SETTERS///////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @param String $titolo
     */
    public function setTitolo(String $titolo): void
    {
        $this->titolo = $titolo;
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
//////////////////////////////////////METODO PER AGGIUNGERE UNA STAGIONE////////////////////////////////////////////////////////////////////////////////////////////////

    public function aggiungiStagione(EStagione $stagione):void
    {
        $stagione->setNumero(count($this->stagioni)+1);
        array_push($this->stagioni, $stagione);

    }
/////////////////////////////////////METODO PER IL CALCOLO DELLA VALUTAZIONE//////////////////////////////////////////////////////////////////////////////////////////////

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
////////////////////////////////////////////////METODI TO STRING//////////////////////////////////////////////////////////////
    /**
     * Stampa tutti gli elementi di un array come un unica stringa
     * @return String
     */
    private function ArrayToString ($array)
    {
        $str = null;
        if (is_array($array))
            foreach ($array as $valore) {
                $str = $str."-".$valore;
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