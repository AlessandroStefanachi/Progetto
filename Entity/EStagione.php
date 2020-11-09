<?php


class EStagione
{
    ///aggiungere numero
    private $lingue=array();
    private $episodi=array();

    private int $valutazione=0;
    private DateTime $data;
    private int $numero=0;

    /**
     * EStagione constructor.
     */
    public function __construct(String $_date, int $_numero)
    {

        $this->data=DateTime::createFromFormat('d-m-Y',$_date);
        $this->numero=$_numero;
    }
///////////////////////////////////////////////GETTERS//////////////////////////////////////////////////////////////////////
    /**
     * @return array
     */
    public function getLingue(): array
    {
        return $this->lingue;
    }

    /**
     * @return array
     */
    public function getEpisodi(): array
    {
        return $this->episodi;
    }

    /**
     * @return array
     */
    public function getAttori(): array
    {
        return $this->attori;
    }

    /**
     * @return int
     */
    public function getValutazione(): int
    {   $this->calcolaValutazione();
        return $this->valutazione;
    }

    /**
     * @return DateTime|false
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return int
     */
    public function getNumero(): int
    {
        return $this->numero;
    }

//////////////////////////////////////////////////////////////////////////////////////////////SETTERS////////////////////////////////////////////////////////////////////////////////////
    /**
     * @param array $lingue
     */
    public function setLingue(array $lingue): void
    {
        $this->lingue = $lingue;
    }

    /**
     * @param array $episodi
     */
    public function setEpisodi(array $episodi): void
    {
        $this->episodi = $episodi;
    }

    /**
     * @param array $attori
     */
    public function setAttori(array $attori): void
    {
        $this->attori = $attori;
    }

    /**
     * @param int $valutazione
     */
    public function setValutazione(int $valutazione): void
    {
        $this->valutazione = $valutazione;
    }

    /**
     * @param DateTime|false $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

    /**
     * @param int $numero
     */
    public function setNumero(int $numero): void
    {
        $this->numero = $numero;
    }

/////////////////////////////METODO PER AGGIUNGERE EPISODI////////////////////////////

    public function aggiungiEpisodi(EEpisodio $episodio):void
    {
        array_push($this->episodi, $episodio);


    }
//////////////////////////////METODO PER IL CALCOLO DELLA VALUTAZIONE///////////////////

    private function calcolaValutazione():void
    {
        $media=0;
        ///////////////non va int $media /////////////////////////////////
        if(count($this->episodi)>0){
        foreach ($this->getEpisodi() as $value)
        {
            $media=$media+$value->getValutazione();
        }
        $this->valutazione=$media/count($this->episodi);}
    }
///////////////////////////////////////////////METODI TO STRING//////////////////////////////////////////////////////////////
    /**
     * Stampa tutti gli elementi di un array come un unica stringa
     * @return String
     */
    private function ArrayToString ($array)
    {
        $str = null;
        if (is_array($array))
            foreach ($array as $valore)
            {
                $str = $str."-".$valore;
            }
        else
            $str = $array;
        return $str;
    }

    public function __toString(): String
    {
        $str="Numero: ".$this->getNumero()."\n"."Lingue Disponibili: ".$this->ArrayToString($this->getLingue())."\n"."Episodi: ".$this->ArrayToString($this->getEpisodi())."\n"."Attori: ".$this->ArrayToString($this->getAttori())."\n"."Valutazione: ".$this->getValutazione()."\n"."Data Disponibilità: ".$this->getData()->format('d-m-Y')."\n";
        return $str;
    }
}