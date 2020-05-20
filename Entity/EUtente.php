<?php


class EUtente
{
    private String $userName;
    private String $email;
    private String $password;
    private $watchlist=array();
    private $attese=array();

    /**
     * EUtente constructor.
     * @param String $userName
     * @param String $email
     * @param String $password
     */
    public function __construct($_userName, $_email, $_password)
    {
        $this->userName = $_userName;
        $this->email = $_email;
        $this->password = $_password;
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
        if(in_array($serie,$this->attese))
        {
            echo "\n"."ci sono"."\n";
           // unset($this->attese[array_search($serie,$this->attese)]);
            //array_push($this->watchlist[$key]->getserie(),$serie);
            $this->watchlist[$key]->getserie()->aggiungiSerie($serie);
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