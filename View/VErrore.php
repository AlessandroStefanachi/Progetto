<?php

/*
 * classe per la visualizzazione del messaggio di errore
 */


class VErrore
{

    /**
     * Funzione che inizializza e configura smarty
     */

    private $smarty;

    public function __construct()
    {
        $this->smarty = SetupSmarty::configura();
    }
/*
 * funzione per la visualizzazione di una pagina di errore
 */
    public function errore()
    {
        $this->smarty->display("errore.tpl");
    }
}

