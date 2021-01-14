<?php


class ECopertina
{
private $id;
private $nome;
private $type;
private $size;
private $immagine;

    /**
     * ECopertina constructor.
     * @param $id
     * @param $nome
     * @param $type
     * @param $size
     * @param $immagine
     */
    public function __construct( $nome, $type, $size, $immagine)
    {

        $this->nome = $nome;
        $this->type = $type;
        $this->size = $size;
        $this->immagine = $immagine;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }
    /**
     * @param mixed $immagine
     */
    public function getId_serie()
    {
        return $this->id_serie;
    }
    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getImmagine()
    {
        return $this->immagine;
    }

    /**
     * @param mixed $immagine
     */
    public function setImmagine($immagine)
    {
        $this->immagine = $immagine;
    }

    /**
     * @param mixed $immagine
     */
    public function setId_serie($id_serie)
    {
        $this->id_serie = $id_serie;
    }



}