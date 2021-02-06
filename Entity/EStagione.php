<?php


class EStagione
/*
 * classi contenenti metodi ed attributi associati alle stagione
 * -lingue: array contenente le lingue associate
 * -episodi: array contenente gli episodi appartenti alla stagione
 * -valutazione: valutazione associata alla stagione
 * -numero:numero della stagione
 * -id: identificativo univoco chiave primaria nel db
 * -id_serieTv: id della serie tv associata alla chiave primaria
 *
 *
 *
 */
{

    private $lingue=array();
    private $episodi=array();
    private  $valutazione=0;
    private  $data;
    private  $numero;
    private  $id;
    private  $id_serieTv;


    /**
     * EStagione constructor.
     */
    public function __construct( $_date,  $_numero,  $id_serieTv)
    {

        $this->data = DateTime::createFromFormat('Y-m-d',$_date);
        $this->numero = $_numero;
        $this->id_serieTv = $id_serieTv;
    }
///////////////////////////////////////////////GETTERS//////////////////////////////////////////////////////////////////////
    /**
     * @return array
     */
    public function getLingue()
    {
        return $this->lingue;
    }

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
    public function getIdSerieTv()
    {
        return $this->id_serieTv;
    }

    /**
     * @return array
     */
    public function getEpisodi()
    {
        return $this->episodi;
    }

    /**
     * @return array
     */


    /**
     * @return int
     */
    public function getValutazione()
    {   $this->calcolaValutazione();
        return $this->valutazione;
    }

    /**
     * @return String|false
     */
    public function getData()
    {
        return $this->data->format("Y-m-d");
    }

    /**
     * @return int
     */
    public function getNumero()
    {
        return $this->numero;
    }

//////////////////////////////////////////////////////////////////////////////////////////////SETTERS////////////////////////////////////////////////////////////////////////////////////
    /**
     * @param array $lingue
     */
    public function setLingue(array $lingue)
    {
        $this->lingue = $lingue;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param int $id_serieTv
     */
    public function setIdSerieTv($id_serieTv)
    {
        $this->id_serieTv = $id_serieTv;
    }

    /**
     * @param array $episodi
     */
    public function setEpisodi(array $episodi)
    {
        $this->episodi = $episodi;
        $this->calcolaValutazione();
    }

    /**
     * @param array $attori
     */


    /**
     * @param int $valutazione
     */
    public function setValutazione( $valutazione)
    {
        $this->valutazione = $valutazione;
    }

    /**
     * @param DateTime|false $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @param int $numero
     */
    public function setNumero( $numero)
    {
        $this->numero = $numero;
    }

/////////////////////////////METODO PER AGGIUNGERE EPISODI////////////////////////////

    public function aggiungiEpisodi( $episodio)
    {
        array_push($this->episodi, $episodio);


    }

    public function aggiungiLingua( $lingua)
    {
        array_push($this->lingue, $lingua);


    }
//////////////////////////////METODO PER IL CALCOLO DELLA VALUTAZIONE///////////////////
///
/*
 * calcola la valutazione associata alla stagione che sarà poi impiegata nel calcolo del voto della serie, è data dalla media aritmetica dei voti degli episodi
 */
    private function calcolaValutazione()
    {
        $media=0;

        if(count($this->episodi)>0){
        foreach ($this->getEpisodi() as $value)
        {
            $media=$media+$value->getValutazione();

        }
        
        $this->valutazione=$media/count($this->episodi);}
    }
///////////////////////////////////////////////METODI TO STRING//////////////////////////////////////////////////////////////
    /**
     * Stampa tutti gli elementi di un array come un unica stringa
     * @return String
     */
    private function ArrayToString ($array)
    {
        $str = null;
        if (is_array($array))
            foreach ($array as $valore)
            {
                $str = $str."-".$valore;
            }
        else
            $str = $array;
        return $str;
    }

    public function __toString()
    {
        $str="Numero: ".$this->getNumero()."\n"."Lingue Disponibili: ".$this->ArrayToString($this->getLingue())."\n"."Episodi: ".$this->ArrayToString($this->getEpisodi())."\n"."Valutazione: ".$this->getValutazione()."\n"."Data Disponibilità: ".$this->getData()."\n";
        return $str;
    }
}