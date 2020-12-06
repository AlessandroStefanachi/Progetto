<?php


class VUtente
{
    private $smarty;
    /**
     * Funzione che inizializza e configura smarty
     */
    public function __construct() {
        $this->smarty = SetupSmarty::configura();
    }
    public function  showHome(){
        $this->smarty->assign("errore");
        $this->smarty->display("homepagedef.tpl");
    }
    public function  erroreregistarzione($errore){
        $this->smarty->assign("errore",$errore);
        $this->smarty->display("homepagedef.tpl");
    }
}