<?php
/*
 * classe che si occupa della visualizzazione delle pagine private dell'admin
 */

class Vadmin
{
    private $smarty;
    /**
     * Funzione che inizializza e configura smarty
     */
    public function __construct() {
        $this->smarty = SetupSmarty::configura();
    }
/*
 * funzione utilizzata per visualizzare il menù dell'admin dal quale può scegliere la sezione a cui accedere
 */
    public function menù($utente){
        $this->smarty->assign('utente',$utente);
        $this->smarty->display('menù.tpl');
    }
    /*
     * funzione utilizzata per visualizzare il menù dell'admin dal quale può gestire gli utenti
     */
    public function utenti($utente,$utenti){
        $this->smarty->assign('utente',$utente);
        $this->smarty->assign('utenti',$utenti);
        $this->smarty->display('utenti.tpl');
    }
    /*
     * funzione utilizzata per visualizzare il menù dell'admin dal quale può gestire le lingue
     */
    public function lingue($utente,$lingue){
        $this->smarty->assign('utente',$utente);
        $this->smarty->assign('lingue',$lingue);
        $this->smarty->display('lingue.tpl');
    }
    /*
     * funzione utilizzata per visualizzare il menù dell'admin dal quale può gestire i generi
     */
    public function generi($utente,$generi){
        $this->smarty->assign('utente',$utente);
        $this->smarty->assign('generi',$generi);
        $this->smarty->display('generi.tpl');
    }
    /*
     * funzione utilizzata per visualizzare il menù dell'admin dal quale può gestire i generi
     */
    public function voti($utente,$voti){
        $this->smarty->assign('utente',$utente);
        $this->smarty->assign('voti',$voti);
        $this->smarty->display('voti.tpl');
    }
    /*
     * funzione utilizzata per visualizzare il menù dell'admin dal quale può gestire le watchlist
     */
    public function watchlist($utente,$watchlist){
        $this->smarty->assign('utente',$utente);
        $this->smarty->assign('watchlist',$watchlist);
        $this->smarty->display('gwatchlist.tpl');
    }
    /*
     * funzione utilizzata per visualizzare il menù dell'admin dal quale può gestire i commenti
     */
    public function commenti($utente,$commenti){
        $this->smarty->assign('utente',$utente);
        $this->smarty->assign('commenti',$commenti);
        $this->smarty->display('commenti.tpl');
    }
    /*
     * funzione utilizzata per visualizzare il menù dell'admin dal quale può aggiungiere una nuova serie
     */
    public function aggiungiSerie($utente,$gif,$generi){
        $this->smarty->assign('utente',$utente);
        $this->smarty->assign('gif',$gif);
        $this->smarty->assign('generi',$generi);

        $this->smarty->display('aggiungiSerie.tpl');
    }
    /*
     * funzione utilizzata per visualizzare il menù dell'admin dal quale può gestire le serie tv
     */
    public function serie($utente,$serie){
        $this->smarty->assign('utente',$utente);
        $this->smarty->assign('serie',$serie);


        $this->smarty->display('serie.tpl');
    }
    /*
 * funzione utilizzata per visualizzare il menù dell'admin dal quale può modificare la serie
 */
    public function modificaserie($utente,$serie,$copertina,$generi,$lingue,$gif){
        $this->smarty->assign('utente',$utente);
        $this->smarty->assign('serie',$serie);
        $this->smarty->assign('copertina',$copertina);
        $this->smarty->assign('generi',$generi);

        $this->smarty->assign('lingue',$lingue);
        $this->smarty->assign('gif',$gif);

        $this->smarty->display('modificaSerie.tpl');
    }
}