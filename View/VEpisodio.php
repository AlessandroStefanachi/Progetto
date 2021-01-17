<?php


class VEpisodio

{
    public function __construct() {
        $this->smarty = SetupSmarty::configura();
    }

    public function info($episodio,$utente,$serie,$pos,$stagione){

        $this->smarty->assign("episodio",$episodio);
        $this->smarty->assign("utente",$utente);
        $this->smarty->assign("serie",$serie);
        $this->smarty->assign("pos",$pos);
        $this->smarty->assign("stagione",$stagione);
        $this->smarty->display("episodio.tpl");



    }

}
