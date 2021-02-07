<?php
/*
 * classe che si occupa della visualizzazione delle pagine private dell'admin
 */

class VEpisodio

{
    private $smarty;
    /**
     * Funzione che inizializza e configura smarty
     */
    public function __construct() {
        $this->smarty = SetupSmarty::configura();
    }
/*
 * funzione per la visualizzazione della pagina relativa ad un episodio
 */
    public function info($episodio,$utente,$serie,$pos,$stagione,$commenti,$visti,$voto){

        $this->smarty->assign("episodio",$episodio);
        $this->smarty->assign("utente",$utente);
        $this->smarty->assign("serie",$serie);
        $this->smarty->assign("pos",$pos);
        $this->smarty->assign("stagione",$stagione);
        $this->smarty->assign("commenti",$commenti);
        $this->smarty->assign("visti",$visti);
        $this->smarty->assign("voto",$voto);
        $this->smarty->display("episodio.tpl");



    }

}
