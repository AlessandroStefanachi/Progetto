<?php


class VUtente
{
    private $smarty;
    /**
     * Funzione che inizializza e configura smarty
     */
    public function __construct() {
        $this->smarty = SetupSmarty::configura();
    }
    public function  showHome($serie,$s,$errlog,$errreg){
       // $s=array();
        //foreach ($serie as $a)array_push($s,base64_encode($a->getCopertina()->getImmagine()));
       // $immagine=base64_encode($serie[0]->getCopertina()->getImmagine());
       // $type=$serie[0]->getCopertina()->getType();
        $this->smarty->assign("s",$s);
        $this->smarty->assign("errorelog",$errlog);
        $this->smarty->assign("errore",$errreg);
        //$this->smarty->assign("type",$type);
        $this->smarty->assign("serie",$serie);
        $this->smarty->display("homepagedef.tpl");
    }
    public function  erroreregistarzione($errore,$serie,$s){

        $this->smarty->assign("errore",$errore);
        $this->smarty->assign("s",$s);
        //$this->smarty->assign("type",$type);
        $this->smarty->assign("serie",$serie);
        $this->smarty->display("homepagedef.tpl");

    }
    public function  errorerelog($errore,$serie,$s){

        $this->smarty->assign("errorelog",$errore);
        $this->smarty->assign("s",$s);
        //$this->smarty->assign("type",$type);
        $this->smarty->assign("serie",$serie);
        $this->smarty->display("homepagedef.tpl");

    }
    public function  showHomelog($serie,$cop,$seguiti,$genere,$filtro,$watch,$Cwatch,$type){
        $this->smarty->assign("serie",$serie);
        $this->smarty->assign("cop",$cop);
        $this->smarty->assign("seguiti",$seguiti);
        $this->smarty->assign("genere",$genere);
        $this->smarty->assign("filtro",$filtro);
        $this->smarty->assign("watch",$watch);
        $this->smarty->assign("Cwatch",$Cwatch);
        $this->smarty->assign("type",$type);
        $this->smarty->display("homelog.tpl");
    }
}