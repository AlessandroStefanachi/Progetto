<?php


class EValutazione
{
    private int $voto;
    private EUtente $autore;

    /**
     * EValutazione constructor.
     * @param int $voto
     * @param EUtente $autore
     */
    public function __construct(int $voto, EUtente $autore)
    {
        $this->voto = $voto;
        $this->autore = $autore;
    }

/////////////////////////////////////////////////////////////////////////////////////GETTERS/////////////////////////////////////////////////////////////////////////////
    /**
     * @return int
     */
    public function getVoto(): int
    {
        return $this->voto;
    }

    /**
     * @return EUtente
     */
    public function getAutore(): EUtente
    {
        return $this->autore;
    }

/////////////////////////////////////////////////////////////////////////////////////SETTERS/////////////////////////////////////////////////////////////////////////////
    /**
     * @param int $voto
     */
    public function setVoto(int $voto): void
    {
        $this->voto = $voto;
    }

    /**
     * @param EUtente $autore
     */
    public function setAutore(EUtente $autore): void
    {
        $this->autore = $autore;
    }
    
}