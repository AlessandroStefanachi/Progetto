<?php


class EValutazione
{
    /* classe contenente metodi ed attributi relativi alle valutazioni degli episodi
     * -voto: voto associato all'utente
     * -autore: utente che lascia il voto
     * -id_episodio: id dell'episodio a cui è associato il voto
     */
    private  $voto;
    private  $autore;
    private  $id_episodio;

    public function __construct( $voto,  $autore,  $id_episodio)
    {
        $this->voto = $voto;
        $this->autore = $autore;
        $this->id_episodio = $id_episodio;
    }

/////////////////////////////////////////////////////////////////////////////////////GETTERS/////////////////////////////////////////////////////////////////////////////
    /**
     * @return int
     */
    public function getVoto()
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
    public function getAutore()
    {
        return $this->autore;
    }

/////////////////////////////////////////////////////////////////////////////////////SETTERS/////////////////////////////////////////////////////////////////////////////
    /**
     * @param int $voto
     */
    public function setVoto( $voto)
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
    public function setAutore( $autore)
    {
        $this->autore = $autore;
    }
    public function __toString()
    {
        $str="Voto: ".$this->getVoto()."\n"."Autore: ".$this->getAutore()."\n";
        return $str;
    }

}