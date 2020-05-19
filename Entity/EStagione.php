<?php


class EStagione
{
    private $lingue=array();
    private $episodi=array();
    private $attori=array();
    private int $valutazione;
    private DateTime $data;

    /**
     * EStagione constructor.
     */
    public function __construct(array $_lingue,array $_attori,String $_date)
    {
        $this->lingue=$_lingue;
        $this->attori=$_attori;
        $this->data=DateTime::createFromFormat('d-m-Y H:i:s',$_date);
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
    {
        return $this->valutazione;
    }

    /**
     * @return DateTime|false
     */
    public function getData()
    {
        return $this->data;
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

/////////////////////////////METODO PER AGGIUNGERE EPISODI////////////////////////////

    public function aggiungiEpisodi(EEpisodio $episodio):void
    {
        array_push($this->episodi, $episodio);

    }
//////////////////////////////METODO PER IL CALCOLO DELLA VALUTAZIONE///////////////////

    private function calcolaValutazione():int
    {
        ///////////////non va int $media /////////////////////////////////
        $media=array_sum($this->episodi->valutazione)/array_count($this->episodi);
        $this->valutazione=$media;

    }
///////////////////////////////////////////////METODI TO STRING//////////////////////////////////////////////////////////////
    /**
     * Stampa tutti gli emelemnti di un array come un unica stringa
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

    private function __toString(): String
    {
        $str="Lingue Disponibili: ".$this->ArrayToString($this->getLingue())."\n"."Episodi: ".$this->ArrayToString($this->getEpisodi())."\n"."Attori: ".$this->ArrayToString($this->getAttori())."\n"."Valutazione: ".$this->getValutazione()."\n"."Data Disponibilità: ".$this->getData()."\n";
        return $str;
    }
}