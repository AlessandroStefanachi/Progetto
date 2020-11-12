<?php

class ECommento
{

    private int $id;
    private String $testo;
    private DateTime $data;
    private DateTime $ora;
    private String $autore;
    private int $id_episodio;

    /**
     * ECommento constructor.
     * @param String $testo
     * @param DateTime $data
     * @param DateTime $ora
     * @param EUtente $autore
     * @param Int $id_episodio
     */
    public function __construct(String $testo, String $_date, String $_ora, String $autore, int $id_episodio)
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
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return String
     */
    public function getTesto(): String
    {
        return $this->testo;
    }

    /**
     * @return DateTime
     */
    public function getData(): String
    {
        return $this->data->format("Y-m-d");
    }

    /**
     * @return DateTime
     */
    public function getOra(): String
    {
        return $this->ora->format('H:i:s');
    }

    /**
     * @return EUtente
     */
    public function getAutore(): String
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
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param String $testo
     */
    public function setTesto(String $testo): void
    {
        $this->testo = $testo;
    }

    /**
     * @param DateTime $data
     */
    public function setData(DateTime $data): void
    {
        $this->data = $data->format("Y-m-d");
    }

    /**
     * @param DateTime $ora
     */
    public function setOra(DateTime $ora): void
    {
        $this->ora = $ora;
    }

    /**
     * @param EUtente $autore
     */
    public function setAutore(EUtente $autore): void
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

    public function __toString(): String
    {
        $str="Autore: ".$this->getAutore()."\n"."Testo: ".$this->getTesto()."\n"."Data: ".$this->getData()."\n"."Ora: ".$this->getOra()."\n";
        return $str;
    }
}