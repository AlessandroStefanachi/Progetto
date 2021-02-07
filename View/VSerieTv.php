<?php
/*
 * classe per la visualizzione di serie tv
 */

class VSerieTv
{
    private $smarty;
    /**
     * Funzione che inizializza e configura smarty
     */
    public function __construct() {
        $this->smarty = SetupSmarty::configura();
    }

    /*
     * funzione di visualizzazione di una serie tv
     */
public function info($serie,$copertina,$utente,$watchlist){

    $this->smarty->assign("serie",$serie);
    $this->smarty->assign("copertina",$copertina);
    $this->smarty->assign('utente',$utente);
    $this->smarty->assign('watchlist',$watchlist);
    $this->smarty->display("serieTv.tpl");
}
}