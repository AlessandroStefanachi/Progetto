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

    public function voti($utente,$voti){
        $this->smarty->assign('utente',$utente);
        $this->smarty->assign('voti',$voti);
        $this->smarty->display('voti.tpl');
    }

    public function watchlist($utente,$watchlist){
        $this->smarty->assign('utente',$utente);
        $this->smarty->assign('watchlist',$watchlist);
        $this->smarty->display('gwatchlist.tpl');
    }

    public function commenti($utente,$commenti){
        $this->smarty->assign('utente',$utente);
        $this->smarty->assign('commenti',$commenti);
        $this->smarty->display('commenti.tpl');
    }

    public function aggiungiSerie($utente,$gif,$generi){
        $this->smarty->assign('utente',$utente);
        $this->smarty->assign('gif',$gif);
        $this->smarty->assign('generi',$generi);

        $this->smarty->display('aggiungiSerie.tpl');
    }

    public function serie($utente,$serie){
        $this->smarty->assign('utente',$utente);
        $this->smarty->assign('serie',$serie);


        $this->smarty->display('serie.tpl');
    }
    public function modificaserie($utente,$serie,$copertina,$generi,$lingue){
        $this->smarty->assign('utente',$utente);
        $this->smarty->assign('serie',$serie);
        $this->smarty->assign('copertina',$copertina);
        $this->smarty->assign('generi',$generi);

        $this->smarty->assign('lingue',$lingue);


        $this->smarty->display('modificaSerie.tpl');
    }
}