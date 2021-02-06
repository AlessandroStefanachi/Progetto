<?php


class EWatchlist
/*
 * classe contenente metodi ed attributi relativi alle watchlist
 * -nome: nome associato alla watchlist
 * -descrizione: descrizione associata alla watchlist
 * -pubblico: espirme se la watchlist è pubblica o privata
 * -serie: array contente le serie
 * -id: identificatore univoco chiave primaria nel db
 * proprietario:utente a cui appartiene la watchlist
 *
 *
 */
{
    private  $nome;
    private  $descrizione;
    private  $pubblico;
    private  $serie=array();
    private  $id;
    private  $proprietario;

    /*
     *
     */
    public function __construct( $_nome,  $_descrizione,  $_pubblico,  $proprietario)
    {
        $this->nome = $_nome;
        $this->descrizione = $_descrizione;
        $this->pubblico = $_pubblico;
        $this->proprietario = $proprietario;
    }
/////////////////////////////////////////////////////////////////////////////////////GETTERS/////////////////////////////////////////////////////////////////////////////
    /**
     * @return String
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return EUtente
     */
    public function getProprietario()
    {
        return $this->proprietario;
    }

    /**
     * @return String
     */
    public function getDescrizione()
    {
        return $this->descrizione;
    }

    /**
     * @return String
     */
    public function isPubblico()
    {
        return $this->pubblico;
    }

    /**
     * @return array
     */
    public function getSerie()
    {
        return $this->serie;
    }
///////////////////////////////////////////////////////////////////////////SETTERS////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @param String $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param EUtente $proprietario
     */
    public function setProprietario($proprietario)
    {
        $this->proprietario = $proprietario;
    }

    /**
     * @param String $descrizione
     */
    public function setDescrizione($descrizione)
    {
        $this->descrizione = $descrizione;
    }

    /**
     * @param bool $pubblico
     */
    public function setPubblico($pubblico)
    {
        $this->pubblico = $pubblico;
    }

    /**
     * @param array $serie
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    }
//////////////////////////////////////////////////////////////////METODO PER AGGIUNGERE UNA SERIE TV ALLA WATCHLIST/////////////////////////////////////////////////////////////////////////////
    public function AggiungiSerie(ESerieTv $serie)
    {
        array_push($this->serie,$serie) ;
    }
//////////////////////////////////////////////////////////////////METODO PER RIMUOVERE UNA SERIE TV ALLA WATCHLIST/////////////////////////////////////////////////////////////////////////////
    public function  RimuoviSerie(ESerieTv $serie)
    {
        unset($this->serie[array_search($serie,$this->serie)]);
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
            foreach ($array as $valore) {
                if(is_string(($valore)))
                $str = $str."-".$valore;
                else{

                    $str=$valore->__toString();
                }
            }
        else
            $str = $array;
        return $str;
    }

    /*
     * restituisce un array contente le codifiche delle copertine delle serie contenute nella watchlist
     */
 public function Base64(){
        $cop=array();
       // foreach ($this->serie as $s)array_push($cop,base64_encode($s->getCopertina()->getImmagine()));
     foreach ($this->serie  as $a) {if($a->getCopertina()!=null)array_push($cop,base64_encode($a->getCopertina()->getImmagine()));else array_push($cop,null);}
        return $cop;
 }
    public function __toString()
    {
        // TODO: Implement __toString() method.
        $str="Nome: ".$this->getNome()."\n"."Descrizione: ".$this->getDescrizione()."\n"."pubblico: ".$this->isPubblico()."\n"."Serie TV: ".$this->ArrayToString($this->getSerie())."\n"."proprietario: ".$this->getProprietario()."\n";
        return $str;

    }
}
