<?php


class EUtente
{
    private  $userName;
    private  $email;
    private  $password;
    private $seguiti=array();
    private $seguaci=array();
    private $watchlist=array();
    private  $ruolo;
    private $visti=array();
    /**
     * EUtente constructor.
     * @param String $userName
     * @param String $email
     * @param String $password
     * @param String $ruolo
     */
    public function __construct( $userName,  $email,  $password,  $ruolo)
    {
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;
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
    public function getSeguiti()
    {
        return $this->seguiti;
    }

    /**
     * @return array
     */
    public function getSeguaci()
    {
        return $this->seguaci;
    }

    /**
     * @return String
     */
    public function getRuolo()
    {
        return $this->ruolo;
    }

    /**
     * @return String
     */
    public function getVisti()
    {
        return $this->visti;
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
     * @param array $seguiti
     */
    public function setSeguiti( $seguiti)
    {
        $this->seguiti = $seguiti;
    }

    /**
     * @param array $seguaci
     */
    public function setSeguaci( $seguaci)
    {
        $this->seguaci = $seguaci;
    }

    /**
     * @param String $ruolo
     */
    public function setRuolo( $ruolo)
    {
        $this->ruolo = $ruolo;
    }

    /**
     * @param String $ruolo
     */
    public function setvisti( $visti)
    {
        $this->visti = $visti;
    }
//////////////////////////////////////////////////////////////////////////////METODO PER AGGIUNGERA UNA WATCHLIST AL PROFILO////////////////////////////////////////////////////////
    public function AggiungiWatchlist( $watchlist)
    {
        array_push($this->watchlist, $watchlist) ;
    }
/////////////////////////////////////////////////////////////////////////////METODO PER RIMUOVERE UNA WATCHLIST AL PROFILO///////////////////////////////////////////////////////////
    public function RimuoviWatchlist( $watchlist)
    {
        unset($this->watchlist[array_search($watchlist,$this->watchlist)]);
    }


/////////////////////////////////////////////////////////////////////////METODO PER AGGIUNGERE SEGUITI AL PROFILO////////////////////////////////////////////////////////////////////
    public function AggiungiSeguiti(EUtente $utente)
    {
        array_push($this->seguiti,$utente->getUserName());

    }
/////////////////////////////////////////////////////////////////////////METODO PER RIMUOVERE SEGUITI AL PROFILO////////////////////////////////////////////////////////////////////
    public function RimuoviSeguiti(EUtente $utente)
    {
        unset($this->seguiti[array_search($utente->getUserName(),$this->seguiti)]);
    }
/////////////////////////////////////////////////////////////////////////METODO PER AGGIUNGERE SEGUACI AL PROFILO////////////////////////////////////////////////////////////////////
    public function AggiungiSeguaci(EUtente $utente)
    {
        array_push($this->seguaci,$utente->getUserName());
    }
/////////////////////////////////////////////////////////////////////////METODO PER RIMUOVERE SEGUACI AL PROFILO////////////////////////////////////////////////////////////////////
    public function RimuoviSeguaci(EUtente $utente)
    {
        unset($this->seguaci[array_search($utente->getUserName(),$this->seguaci)]);
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

    public function __toString()
    {
        // TODO: Implement __toString() method.
        $str="username: ".$this->getUserName()."\n"."Email: ".$this->getEmail()."\n"."Password: ".$this->getPassword()."\n"."Watchlist: ".$this->ArrayToString($this->getWatchlist())
            ."\n"."Serie tv Attese: ".$this->ArrayToString($this->getAttese())."\n"."Seguaci: ".$this->ArrayToString($this->getSeguaci())."\n"."Seguiti: ".$this->ArrayToString($this->getSeguiti());
        return $str;

    }
}