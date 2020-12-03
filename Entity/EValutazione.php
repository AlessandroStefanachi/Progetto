<?php


class EValutazione
{
    private int $voto;
    private String $autore;
    private int $id_episodio;
    /**
     * EValutazione constructor.
     * @param int $voto
     * @param EUtente $autore
     */
    public function __construct(int $voto, String $autore, int $id_episodio)
    {
        $this->voto = $voto;
        $this->autore = $autore;
        $this->id_episodio = $id_episodio;
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
     * @return int
     */
    public function getIdEpisodio()
    {
        return $this->id_episodio;
    }

    /**
     * @return EUtente
     */
    public function getAutore(): String
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
     * @param int $id_episodio
     */
    public function setIdEpisodio($id_episodio)
    {
        $this->id_episodio = $id_episodio;
    }

    /**
     * @param EUtente $autore
     */
    public function setAutore(EUtente $autore): void
    {
        $this->autore = $autore;
    }
    public function __toString(): String
    {
        $str="Voto: ".$this->getVoto()."\n"."Autore: ".$this->getAutore()."\n";
        return $str;
    }

}