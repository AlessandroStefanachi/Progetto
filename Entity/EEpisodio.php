<?php


class EEpisodio
{
    private int $id;
    private String $titolo;
    private DateTime $durata;
    private bool $visto;
    private $commenti= array() ;
    private $valutazioni=array();
    private int $valutazione=0;
    private int $id_stagione;

    /**
     * EEpisodio constructor.
     * @param String $titolo
     * @param DateTime $durata
     * @param bool $visto
     */
    public function __construct($titolo, $durata, $visto,$id_stagione)
    {
        $this->titolo = $titolo;
        $this->durata = DateTime::createFromFormat('H:i:s', $durata);;
        $this->visto = $visto;
        $this->id_stagione = $id_stagione;
    }
/////////////////////////////////////////////////////////////GETTERS//////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getIdStagione()
    {
        return $this->id_stagione;
    }

    /**
     * @return String
     */
    public function getTitolo(): String
    {
        return $this->titolo;
    }

    /**
     * @return float
     */
    public function getDurata(): String
    {
        return $this->durata->format('H:i:s');;
    }

    /**
     * @return String
     */
    public function isVisto(): String
    {
        if($this->visto)
            return "true";
        else
            return"false";
    }

    /**
     * @return array
     */
    public function getCommenti(): array
    {
        return $this->commenti;
    }

    /**
     * @return array
     */
    public function getValutazioni(): array
    {
        return $this->valutazioni;
    }

    /**
     * @return int
     */
    public function getValutazione(): int
    {
        return $this->valutazione;
    }

///////////////////////////////////////////////////////// SETTERS/////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param int $id_stagione
     */
    public function setIdStagione($id_stagione)
    {
        $this->id_stagione = $id_stagione;
    }

    /**
     * @param String $titolo
     */
    public function setTitolo(String $titolo): void
    {
        $this->titolo = $titolo;
    }

    /**
     * @param float $durata
     */
    public function setDurata(float $durata): void
    {
        $this->durata = $durata;
    }

    /**
     * @param bool $visto
     */
    public function setVisto(bool $visto): void
    {
        $this->visto = $visto;
    }

    /**
     * @param array $commenti
     */
    public function setCommenti(array $commenti): void
    {
        $this->commenti = $commenti;
    }

    /**
     * @param array $valutazioni
     */
    public function setValutazioni(array $valutazioni): void
    {
        $this->valutazioni = $valutazioni;
        $this->calcolaValutazione();
    }

    /**
     * @param int $valutazione
     */
    public function setValutazione(int $valutazione): void
    {
        $this->valutazione = $valutazione;
    }
/////////////////////////////////////////////////////////////METODO CHECK//////////////////////////////////////////////////////////////////////////////////

    public function check():void
    {
        $this->visto=true;
    }
////////////////////////////////////////////////////////////METODO PER AGGIUNGERE VALUTAZIONI///////////////////////////////////////////////////////////////

    public function aggiungiValutazione(EValutazione $valutazione):void
    {
        array_push($this->valutazioni, $valutazione);
        $this->calcolaValutazione();
    }
////////////////////////////////////////////////////////////METODO PER AGGIUNGERE COMMENTI////////////////////////////////////////////////////////////////

    public function aggiungiCommento(ECommento $commento):void
    {
        array_push($this->commenti, $commento);
    }
///////////////////////////////////////////////////////////METODO PER IL CALCOLO DELLA VALUTAZIONE MEDIA/////////////////////////////////////////////////

    private function calcolaValutazione():void
    {
    ///////////////non va int $media /////////////////////////////////
        $media=0;
        $i=0;
        foreach ($this->valutazioni as &$value){
            $media=$media+$value->getvoto();
        $i++;}
        $this->valutazione=$media/$i;

    }

////////////////////////////////////////////////////////////METODI TO STRING//////////////////////////////////////////////////////////////////////////
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
                else{$str=$str."\n".$valore->__toString();}
            }
        else
            $str = $array;
        return $str;
    }

    public function __toString(): String
    {
        $str="Titolo: ".$this->getTitolo()."\n"."Durata Episodio: ".$this->getDurata()."\n"."Visto: ".$this->isVisto()."\n"."Commenti: ".$this->ArrayToString($this->getCommenti())."\n"."Valutazioni: ".$this->ArrayToString($this->getValutazioni())."\n"."Valutazione: ".$this->getValutazione()."\n";
        return $str;
    }

  
}
