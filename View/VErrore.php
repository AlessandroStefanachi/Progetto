<?php




class VErrore
{

    private $smarty;

    public function __construct()
    {
        $this->smarty = SetupSmarty::configura();
    }

    public function errore()
    {
        $this->smarty->display("errore.tpl");
    }
}

