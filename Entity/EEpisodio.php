<?php


class EEpisodio
{
    private  $id;
    private  $titolo;
    private  $durata;
    private $commenti= array() ;
    private $valutazioni=array();
    private  $valutazione=0;
    private  $id_stagione;

    /**
     * EEpisodio constructor.
     * @param String $titolo
     * @param DateTime $durata
     * @param bool $visto
     */
    public function __construct($titolo, $durata, $id_stagione)
    {
        $this->titolo = $titolo;
        $this->durata = DateTime::createFromFormat('H:i:s', $durata);;
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
    public function getTitolo()
    {
        return $this->titolo;
    }

    /**
     * @return float
     */
    public function getDurata()
    {
        return $this->durata->format('H:i:s');;
    }

    /**
     * @return String
     */


    /**
     * @return array
     */
    public function getCommenti()
    {
        return $this->commenti;
    }

    /**
     * @return array
     */
    public function getValutazioni()
    {
        return $this->valutazioni;
    }

    /**
     * @return int
     */
    public function getValutazione()
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
    public function setTitolo( $titolo)
    {
        $this->titolo = $titolo;
    }

    /**
     * @param float $durata
     */
    public function setDurata( $durata)
    {
        $this->durata = $durata;
    }

    /**
     * @param bool $visto
     */


    /**
     * @param array $commenti
     */
    public function setCommenti( $commenti)
    {
        $this->commenti = $commenti;
    }

    /**
     * @param array $valutazioni
     */
    public function setValutazioni(array $valutazioni)
    {
        $this->valutazioni = $valutazioni;
        $this->calcolaValutazione();
    }

    /**
     * @param int $valutazione
     */
    public function setValutazione( $valutazione)
    {
        $this->valutazione = $valutazione;
    }
/////////////////////////////////////////////////////////////METODO CHECK//////////////////////////////////////////////////////////////////////////////////

    public function check()
    {
        $this->visto=true;
    }
////////////////////////////////////////////////////////////METODO PER AGGIUNGERE VALUTAZIONI///////////////////////////////////////////////////////////////

    public function aggiungiValutazione(EValutazione $valutazione)
    {
        array_push($this->valutazioni, $valutazione);
        $this->calcolaValutazione();
    }
////////////////////////////////////////////////////////////METODO PER AGGIUNGERE COMMENTI////////////////////////////////////////////////////////////////

    public function aggiungiCommento(ECommento $commento)
    {
        array_push($this->commenti, $commento);
    }
///////////////////////////////////////////////////////////METODO PER IL CALCOLO DELLA VALUTAZIONE MEDIA/////////////////////////////////////////////////

    private function calcolaValutazione()
    {
    ///////////////non va int $media /////////////////////////////////
        $media=0;
        $i=0;
        foreach ($this->valutazioni as &$value){
            $media=$media+$value->getvoto();
        $i++;}
        $this->valutazione=$media/$i;

    }

    public function individuaVoto($utente){
        $voto=null;
        foreach ($this->valutazioni as $v){
            if($v->getAutore()==$utente->getUsername())
                $voto=$v->getVoto();
        }
        return $voto;
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

    public function __toString()
    {
        $str="Titolo: ".$this->getTitolo()."\n"."Durata Episodio: ".$this->getDurata()."\n"."Commenti: ".$this->ArrayToString($this->getCommenti())."\n"."Valutazioni: ".$this->ArrayToString($this->getValutazioni())."\n"."Valutazione: ".$this->getValutazione()."\n";
        return $str;
    }

  
}
