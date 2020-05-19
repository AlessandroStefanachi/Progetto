<?php


class EEpisodio
{
private String $titolo;
private float $durata;
private bool $visto;
private  $commenti= array() ;
private $valutazioni=array();
private int $valutazione;

    public function __construct(String $_titolo,float $_durata, bool $_visto)
    {
        $this->titolo=$_titolo;
        $this->durata=$_durata;
        $this->visto=$_visto;
    }
//GETTERS//////////////////////////////////////////////////////////////////////////////////////////////////////
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
    public function getDurata(): float
    {
        return $this->durata;
    }

    /**
     * @return bool
     */
    public function isVisto(): bool
    {
        return $this->visto;
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
//////////////////////////////////////////////////////
/// SETTERS//////////////////////////////////////////
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
    }

    /**
     * @param int $valutazione
     */
    public function setValutazione(int $valutazione): void
    {
        $this->valutazione = $valutazione;
    }
///////////////////////////////Metodo check///////////////////////////////////////////////
///
    public function check():void
    {
        $this->visto=true;
    }
/////////////////////////////Metodo per aggiungere valutazioni////////////////////////////
    public function aggiungiValutazione(int $valutazione):void
    {
        array_push($this->Valutazioni, $valutazione);
        $this->calcolaValutazione();
    }
////////////////////////////Metodo per aggiungere Commenti/////////////////////////////////
    public function aggiungiCommento(ECommento $commento):void
    {
        array_push($this->Commenti, $commento);
    }
////////////////////////////Metodo per il calcolo della valutazione media//////////////////
///
    private function calcolaValutazione():int
    {
    ///////////////non va int $media /////////////////////////////////
        $media=array_sum($this->valutazioni)/array_count($this->valutazioni);
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
}