<?php


class VWatchlist
{

    public function __construct() {
        $this->smarty = SetupSmarty::configura();
    }

    public function info($watchlist,$utente,$cop,$visti){

        $this->smarty->assign("watchlist",$watchlist);
        $this->smarty->assign("utente",$utente);
        $this->smarty->assign("cop",$cop);
        $this->smarty->assign("visti",$visti);


        $this->smarty->display("watchlist.tpl");



    }
}