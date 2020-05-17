<?php


class ESerieTv
{
private String $titolo;
private String $trama;
private array $genere;
private int $valutazione;
private String $regista;
private array $stagioni;

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
        $this->stagioni = $_stagioni;
    }
///////////////////////////////////////////////////////////////////////GETTERS/////////////////////////////////////////////////////////////////////////////////////////////////////
///
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
    {
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
        array_push($this->stagioni, $stagione);

    }
//////////////////////////////Metodo per il calcolo della valutazione///////////////////
///
    private function calcolaValutazione():int
    {
        ///////////////non va int $media /////////////////////////////////
        $media=array_sum($this->stagioni->valutazione)/array_count($this->stagioni);
        $this->valutazione=$media;

    }
}