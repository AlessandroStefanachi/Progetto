<?php


class ECatalogo
{
    private $serieTv=array();
    private $prossimeUscite=array();

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
    public function AggiungiSerieTv(ESerieTv $serie): void
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
//////////////////////////////////////////////////////////////////////////////////////METODI DI ORDINAMENTO////////////////////////////////////////////////////////////////////////////////////
    public function OrdinaNome():void
    {
       if(!function_exists("cmp")) {
           function cmp(ESerieTv $a, ESerieTv $b)
           {
               if ($a->getTitolo() == $b->getTitolo()) {
                   return 0;
               }
               return ($a->getTitolo() < $b->getTitolo()) ? -1 : 1;
           }
       }

        usort($this->serieTv,"cmp");
    }

    public function ordinaCrescente():void
    {
      if(! function_exists("cmp2")) {
          function cmp2(ESerieTv $a, ESerieTv $b)
          {
              if ($a->getValutazione() == $b->getValutazione()) {
                  return 0;
              }
              return ($a->getValutazione() < $b->getValutazione()) ? -1 : 1;
          }
      }
        usort($this->serieTv,"cmp2");
    }

    public function ordinaDecrescente():void
    {
     if(! function_exists("cmp3")) {
         function cmp3(ESerieTv $a, ESerieTv $b)
         {
             if ($a->getValutazione() == $b->getValutazione()) {
                 return 0;
             }
             return ($a->getValutazione() > $b->getValutazione()) ? -1 : 1;
         }
     }

        usort($this->serieTv,"cmp3");
    }

///////////////////////////////////////////////////////////METODO CHE RICERCA UNA SERIE TV DAL NOME/////////////////////////////////////////////////////////////
    public function CercaPerNome(String $c): ECatalogo
    {
        $Sfiltrate=Array();
        $Pfiltrate=Array();
        foreach ($this->getSerieTv() as $value)
        {
            if (substr_compare($value->getTitolo(), $c, 0, strlen($value->getTitolo()))) ;
            array_push($Sfiltrate, $value);
        }
        foreach ($this->getProssimeUscite() as $value)
        {
            if (substr_compare($value->getTitolo(), $c, 0, strlen($value->getTitolo()))) ;
            array_push($Pfiltrate, $value);
        }
        $ret=new ECatalogo();
        $ret->setSerieTv($Sfiltrate);
        $ret->setProssimeUscite($Pfiltrate);
        return $ret;

    }
/////////////////////////////////////////////////////////METODO PER FILTRARE IN BASE AL GENERE//////////////////////////////////////////////////////////////////////////////////////
    public function Filtra(String $genere): ECatalogo
    {
        $Sfiltrate=Array();
        $Pfiltrate=Array();
        foreach ($this->getSerieTv() as $value)
        {
            if(in_array($genere,$value->getGenere()))array_push($Sfiltrate,$value);
        }
        foreach ($this->getProssimeUscite() as $value)
        {
            if(in_array($genere,$value->getGenere()))array_push($Pfiltrate,$value);
        }
        $ret=new ECatalogo();
        $ret->setSerieTv($Sfiltrate);
        $ret->setProssimeUscite($Pfiltrate);
        return $ret;
    }
///////////////////////////////////////////////METODI TO STRING//////////////////////////////////////////////////////////////
    /**
     * Stampa tutti gli elementi di un array come un unica stringa
     * @return String
     */
    private function ArrayToString ($array):String
    {
        $str = null;
        if (is_array($array))
            foreach ($array as $valore)
            {
                $str = $str."-".$valore;
            }
        else
            $str = $array;
        if(is_null($str))$str= "non presente";
        return $str;
    }
    public function __toString():String
    {
        // TODO: Implement __toString() method.
        $str="Serie Tv: ".$this->ArrayToString($this->getSerieTv())."\n"."Prossime uscite: ".$this->ArrayToString($this->getProssimeUscite())."\n";
        return $str;

    }
}
