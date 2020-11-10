<?php

class ECommento
{

    private int $id;
    private String $testo;
    private DateTime $data;
    private DateTime $ora;
    private EUtente $autore;
    private int $id_episodio;

    /**
     * ECommento constructor.
     * @param String $testo
     * @param DateTime $data
     * @param DateTime $ora
     * @param EUtente $autore
     * @param Int $id_episodio
     */
    public function __construct(String $testo, DateTime $data, DateTime $ora, EUtente $autore, int $id_episodio)
    {
        $this->testo = $testo;
        $this->data = $data;
        $this->ora = $ora;
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
    public function getData(): DateTime
    {
        return $this->data;
    }

    /**
     * @return DateTime
     */
    public function getOra(): DateTime
    {
        return $this->ora;
    }

    /**
     * @return EUtente
     */
    public function getAutore(): EUtente
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
        $this->data = $data;
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


}