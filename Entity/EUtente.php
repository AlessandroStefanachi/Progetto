<?php


class EUtente
{
    private String $userName;
    private String $email;
    private String $password;
    private $seguiti=array();
    private $seguaci=array();
    private $watchlist=array();
    private $attese=array();
    private String $ruolo;

    /**
     * EUtente constructor.
     * @param String $userName
     * @param String $email
     * @param String $password
     * @param array $seguiti
     * @param array $seguaci
     * @param array $watchlist
     * @param array $attese
     * @param String $ruolo
     */
    public function __construct(String $userName, String $email, String $password, array $seguiti, array $seguaci, array $watchlist, array $attese, String $ruolo)
    {
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
        $this->seguiti = $seguiti;
        $this->seguaci = $seguaci;
        $this->watchlist = $watchlist;
        $this->attese = $attese;
        $this->ruolo = $ruolo;
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
    public function getSeguiti(): array
    {
        return $this->seguiti;
    }

    /**
     * @return array
     */
    public function getSeguaci(): array
    {
        return $this->seguaci;
    }

    /**
     * @return String
     */
    public function getRuolo(): String
    {
        return $this->ruolo;
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
     * @param array $seguiti
     */
    public function setSeguiti(array $seguiti): void
    {
        $this->seguiti = $seguiti;
    }

    /**
     * @param array $seguaci
     */
    public function setSeguaci(array $seguaci): void
    {
        $this->seguaci = $seguaci;
    }

    /**
     * @param String $ruolo
     */
    public function setRuolo(String $ruolo): void
    {
        $this->ruolo = $ruolo;
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
/////////////////////////////////////////////////////////////////////////METODO PER AGGIUNGERE SEGUITI AL PROFILO////////////////////////////////////////////////////////////////////
    public function AggiungiSeguiti(EUtente $utente)
    {
        array_push($this->seguiti,$utente);
    }
/////////////////////////////////////////////////////////////////////////METODO PER RIMUOVERE SEGUITI AL PROFILO////////////////////////////////////////////////////////////////////
    public function RimuoviSeguiti(EUtente $utente)
    {
        unset($this->seguiti[array_search($utente,$this->seguiti)]);
    }
/////////////////////////////////////////////////////////////////////////METODO PER AGGIUNGERE SEGUACI AL PROFILO////////////////////////////////////////////////////////////////////
    public function AggiungiSeguaci(EUtente $utente)
    {
        array_push($this->seguaci,$utente);
    }
/////////////////////////////////////////////////////////////////////////METODO PER RIMUOVERE SEGUACI AL PROFILO////////////////////////////////////////////////////////////////////
    public function RimuoviSeguaci(EUtente $utente)
    {
        unset($this->seguaci[array_search($utente,$this->seguaci)]);
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