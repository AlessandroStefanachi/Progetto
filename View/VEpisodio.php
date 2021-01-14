<?php


class VEpisodio

{
    public function __construct() {
        $this->smarty = SetupSmarty::configura();
    }

    public function info($episodio,$utente){

        $this->smarty->assign("episodio",$episodio);
        $this->smarty->assign("utente",$utente);
        $this->smarty->display("episodio.tpl");



    }

}
