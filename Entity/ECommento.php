<?php

class ECommento
{

    private  $id;
    private  $testo;
    private  $data;
    private  $ora;
    private  $autore;
    private  $id_episodio;

    /**
     * ECommento constructor.
     * @param String $testo
     * @param DateTime $data
     * @param DateTime $ora
     * @param EUtente $autore
     * @param Int $id_episodio
     */
    public function __construct( $testo,  $_date,  $_ora,  $autore,  $id_episodio)
    {
        $this->testo = $testo;
        $this->data = DateTime::createFromFormat('Y-m-d',$_date);
        $this->ora = DateTime::createFromFormat('H:i:s', $_ora);
        $this->autore = $autore;
        $this->id_episodio = $id_episodio;
    }

/////////////////////////////////////////////////////////////////////////////////////GETTERS/////////////////////////////////////////////////////////////////////////////
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return String
     */
    public function getTesto()
    {
        return $this->testo;
    }

    /**
     * @return DateTime
     */
    public function getData()
    {
        return $this->data->format("Y-m-d");
    }

    /**
     * @return DateTime
     */
    public function getOra()
    {
        return $this->ora->format('H:i:s');
    }

    /**
     * @return EUtente
     */
    public function getAutore()
    {
        return $this->autore;
    }

    /**
     * @return int
     */
    public function getIdEpisodio()
    {
        return $this->id_episodio;
    }



///////////////////////////////////////////////////////////////////////////SETTERS////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @param int $id
     */
    public function setId( $id)
    {
        $this->id = $id;
    }

    /**
     * @param String $testo
     */
    public function setTesto( $testo)
    {
        $this->testo = $testo;
    }

    /**
     * @param DateTime $data
     */
    public function setData( $data)
    {
        $this->data = $data->format("Y-m-d");
    }

    /**
     * @param DateTime $ora
     */
    public function setOra( $ora)
    {
        $this->ora = $ora;
    }

    /**
     * @param EUtente $autore
     */
    public function setAutore( $autore)
    {
        $this->autore = $autore;
    }

    /**
     * @param int $id_episodio
     */
    public function setIdEpisodio($id_episodio)
    {
        $this->id_episodio = $id_episodio;
    }

    public function __toString()
    {
        $str="Autore: ".$this->getAutore()."\n"."Testo: ".$this->getTesto()."\n"."Data: ".$this->getData()."\n"."Ora: ".$this->getOra()."\n";
        return $str;
    }
}