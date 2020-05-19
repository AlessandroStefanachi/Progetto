<?php


class EWatchlist
{
    private String $nome;
    private String $descrizione;
    private Bool $pubblico;
    private  $serie=array();

    /**
     * EWatchlist constructor.
     * @param String $nome
     * @param String $descrizione
     * @param bool $pubblico
     * @param array $serie
     */
    public function __construct($_nome, $_descrizione, $_pubblico, array $_serie)
    {
        $this->nome = $_nome;
        $this->descrizione = $_descrizione;
        $this->pubblico = $_pubblico;
        $this->serie = $_serie;
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
     * @return String
     */
    public function getDescrizione()
    {
        return $this->descrizione;
    }

    /**
     * @return bool
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
    public function AggiungiSerie(ESerieTv $serie): void
    {
        array_push($this->serie,$serie) ;
    }
//////////////////////////////////////////////////////////////////METODO PER RIMUOVERE UNA SERIE TV ALLA WATCHLIST/////////////////////////////////////////////////////////////////////////////
    public function  RimuoviSerie(ESerieTv $serie): void
    {
        unset($this->serie[array_search($serie,$this->serie)]);
    }
///////////////////////////////////////////////METODI TO STRING//////////////////////////////////////////////////////////////
    /**
     * Stampa tutti gli emelemnti di un array come un unica stringa
     * @return String
     */
    private function ArrayToString ($array)
    {
        $str = null;
        if (is_array($array))
            foreach ($array as $valore) {
                $str = $str."-".$valore;
            }
        else
            $str = $array;
        return $str;
    }

    public function __toString():String
    {
        // TODO: Implement __toString() method.
        $str="Nome: ".$this->getNome()."\n"."Descrizione: ".$this->getDescrizione()."\n"."pubblico".$this->isPubblico()."\n"."Serie TV".$this->ArrayToString($this->getSerie())."\n";
        return $str;

    }
}
