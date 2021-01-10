<?php


class VSerieTv
{
    public function __construct() {
        $this->smarty = SetupSmarty::configura();
    }

public function info($serie,$copertina,$utente){

    $this->smarty->assign("serie",$serie);
    $this->smarty->assign("copertina",$copertina);
    $this->smarty->assign('utente',$utente);
    $this->smarty->display("serieTv.tpl");
}
}