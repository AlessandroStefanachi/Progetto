<?php


class ECatalogo
{
    private array $serieTv;
    private array $prossimeUscite;

    /**
     * ECatalogo constructor.
     */
    public function __construct()
    {
    }
//////////////////////////////////////////////////////////////////GETTERS////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @return array
     */
    public function getSerieTv()
    {
        return $this->serieTv;
    }

    /**
     * @return array
     */
    public function getProssimeUscite()
    {
        return $this->prossimeUscite;
    }
///////////////////////////////////////////////////////////////SETTERS////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @param array $serieTv
     */
    public function setSerieTv($serieTv)
    {
        $this->serieTv = $serieTv;
    }

    /**
     * @param array $prossimeUscite
     */
    public function setProssimeUscite($prossimeUscite)
    {
        $this->prossimeUscite = $prossimeUscite;
    }
////////////////////////////////////////////////////////////METODO AGGIUNTA SERIE TV/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function AggiungiSeritv(ESerieTv $serie): void
    {
        array_push($this->serieTv,$serie);
    }
///////////////////////////////////////////////////////////METODO AGGIUNTA PROSSIME USCITE//////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function AggiungiProssimeUscite(ESerieTv $uscite): void
    {
        array_push($this->prossimeUscite,$uscite);
    }
/////////////////////////////////////////////////////////////////METODO PER SPOSTARE UNA SERIE TV DALLE PROSSIME ESCITE ALLA SERIE DISPONIBILI//////////////////////////////////////////////////////////
    public function Sposta(ESerieTv $serie): void
    {
        if(in_array($serie,$this->prossimeUscite))
        {
            unset($this->prossimeUscite[array_search($serie,$this->prossimeUscite)]);
            array_push($this->serieTv,$serie);
        }
    }
    ////////////////////////////////////////METODI DI ORDINAMENTO////////////////////////////////////////////////////////////////////////////////////
    public function OrdinaNome():void{
        function cmp(ESerieTv $a,ESerieTv $b)
        {
            if ($a->getTitolo() == $b->getTitolo()) {
                return 0;
            }
            return ($a->getNome() < $b->getNome()) ? -1 : 1;
        }

        usort($this->serieTv,"cmp");
    }

    public function ordinaCrescente():void{
        function cmp(ESerieTv $a,ESerieTv $b)
        {
            if ($a->getValutazione() == $b->getValutazione()) {
                return 0;
            }
            return ($a->getValutazione() < $b->getValutazione()) ? -1 : 1;
        }

        usort($this->serieTv,"cmp");
    }

    public function ordinaDecrescente():void{
        function cmp(ESerieTv $a,ESerieTv $b)
        {
            if ($a->getValutazione() == $b->getValutazione()) {
                return 0;
            }
            return ($a->getValutazione() > $b->getValutazione()) ? -1 : 1;
        }

        usort($this->serieTv,"cmp");
    }
///////////////////////////////////////////////METODI TO STRING//////////////////////////////////////////////////////////////
    /**
     * Stampa tutti gli emelemnti di un array come un unica stringa
     * @return String
     */
    private function ArrayToString ($array):String
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
        $str="Serie Tv: ".$this->ArrayToString($this->getSerieTv())."\n"."Prossime uscite: ".$this->ArrayToString($this->getProssimeUscite())."\n";
        return $str;

    }
}