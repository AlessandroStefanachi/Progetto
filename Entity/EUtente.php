<?php


class EUtente
{
    private String $userName;
    private String $email;
    private String $password;
    private $seguit=array();
    private $seguaci=array();
    private $watchlist=array();
    private $attese=array();

    /**
     * EUtente constructor.
     * @param String $userName
     * @param String $email
     * @param String $password
     * @param array $seguit
     * @param array $seguaci
     * @param array $watchlist
     * @param array $attese
     */
    public function __construct(String $userName, String $email, String $password, array $seguit, array $seguaci, array $watchlist, array $attese)
    {
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->seguit = $seguit;
        $this->seguaci = $seguaci;
        $this->watchlist = $watchlist;
        $this->attese = $attese;
    }


//////////////////////////////////////////////////////////////////////////////////GETTERS////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * @return String
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @return String
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return String
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return array
     */
    public function getWatchlist()
    {
        return $this->watchlist;
    }

    /**
     * @return array
     */
    public function getAttese()
    {
        return $this->attese;
    }

    /**
     * @return array
     */
    public function getSeguit(): array
    {
        return $this->seguit;
    }

    /**
     * @return array
     */
    public function getSeguaci(): array
    {
        return $this->seguaci;
    }
/////////////////////////////////////////////////////////////////////////////////////SETTERS//////////////////////////////////////////////////////////////////////////////////
    /**
     * @param String $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @param String $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param String $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param array $watchlist
     */
    public function setWatchlist($watchlist)
    {
        $this->watchlist = $watchlist;
    }

    /**
     * @param array $attese
     */
    public function setAttese($attese)
    {
        $this->attese = $attese;
    }

    /**
     * @param array $seguit
     */
    public function setSeguit(array $seguit): void
    {
        $this->seguit = $seguit;
    }

    /**
     * @param array $seguaci
     */
    public function setSeguaci(array $seguaci): void
    {
        $this->seguaci = $seguaci;
    }
//////////////////////////////////////////////////////////////////////////////METODO PER AGGIUNGERA UNA WATCHLIST AL PROFILO////////////////////////////////////////////////////////
    public function AggiungiWatchlist(EWatchlist $watchlist): void
    {
        array_push($this->watchlist, $watchlist) ;
    }
/////////////////////////////////////////////////////////////////////////////METODO PER RIMUOVERE UNA WATCHLIST AL PROFILO///////////////////////////////////////////////////////////
    public function RimuoviWatchlist(EWatchlist $watchlist): void
    {
        unset($this->watchlist[array_search($watchlist,$this->watchlist)]);
    }
/////////////////////////////////////////////////////////////////////////////METODO PER AGGIUNGERE UNA SERIE TV ALLA SERIE IN PROSSIMA USCITA////////////////////////////////////////
    public function AggiungiAttese(ESerieTv $serie): void
    {
        array_push($this->attese, $serie) ;
    }
////////////////////////////////////////////////////////////////////////////METODO PER RIMUOVERE UNA SERIE TV ALLA SERIE IN PROSSIMA USCITA//////////////////////////////////////////
    public function RimuoviAttese(ESerieTv $serie): void
    {
        unset($this->attese[array_search($serie,$this->attese)]);
    }
///////////////////////////////////////////////////////////////////////////METODO PER SPOSTARE UNA SERIE TV DALLA LISTA ATTESA ALLA WATCHLIST SELEZIONATA//////////////////////////////
    public function Sposta(ESerieTv $serie, EWatchlist $watchlist): void
    {
        $key=array_search($watchlist,$this->watchlist);
        echo"\n"."chiave ".$key."\n";
        $arr=$this->watchlist[$key]->getserie();
        if(in_array($serie,$this->attese))
        {
            echo "\n"."ci sono"."\n";
            unset($this->attese[array_search($serie,$this->attese)]);
            array_push($arr,$serie);
            $this->watchlist[$key]->setserie($arr);
                echo $this->watchlist[$key]->__toString();
        }
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
        if($str==null)
            $str="non presente";
        return $str;
    }

    public function __toString():String
    {
        // TODO: Implement __toString() method.
        $str="username: ".$this->getUserName()."\n"."Email: ".$this->getEmail()."\n"."Password: ".$this->getPassword()."\n"."Watchlist: ".$this->ArrayToString($this->getWatchlist())
            ."\n"."Serie tv Attese: ".$this->ArrayToString($this->getAttese());
        return $str;

    }
}