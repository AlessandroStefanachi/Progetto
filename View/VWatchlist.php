<?php
/*
 * classe per la visualizzazione delle watchlist
 */

class VWatchlist
{ private $smarty;
    /**
     * Funzione che inizializza e configura smarty
     */

    public function __construct() {
        $this->smarty = SetupSmarty::configura();
    }
/*
 *
 * funzione per visualizzare una watchlist
 */
    public function info($watchlist,$utente,$cop,$visti){

        $this->smarty->assign("watchlist",$watchlist);
        $this->smarty->assign("utente",$utente);
        $this->smarty->assign("cop",$cop);
        $this->smarty->assign("visti",$visti);


        $this->smarty->display("watchlist.tpl");



    }
/*
 * funzione per la visualizzazione della pagina di creazione watchlist
 */
    public function crea($utente,$serie){
        $this->smarty->assign("utente",$utente);
        $this->smarty->assign("serie",$serie);

        $this->smarty->display("creaWatchlist.tpl");

    }
}