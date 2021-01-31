<?php


class Vadmin
{
    private $smarty;
    /**
     * Funzione che inizializza e configura smarty
     */
    public function __construct() {
        $this->smarty = SetupSmarty::configura();
    }

    public function menù($utente){
        $this->smarty->assign('utente',$utente);
        $this->smarty->display('menù.tpl');
    }

    public function utenti($utente,$utenti){
        $this->smarty->assign('utente',$utente);
        $this->smarty->assign('utenti',$utenti);
        $this->smarty->display('utenti.tpl');
    }

    public function lingue($utente,$lingue){
        $this->smarty->assign('utente',$utente);
        $this->smarty->assign('lingue',$lingue);
        $this->smarty->display('lingue.tpl');
    }

    public function generi($utente,$generi){
        $this->smarty->assign('utente',$utente);
        $this->smarty->assign('generi',$generi);
        $this->smarty->display('generi.tpl');
    }
}