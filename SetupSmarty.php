<?php
require('Smarty/Smarty.class.php');
/*Classe utilizzata per configurare Smarty*/
class SetupSmarty {

    public static function configura() {
        $smarty = new Smarty();
        $smarty->template_dir = 'Smarty/templates/';
        $smarty->compile_dir = 'Smarty/templates_c/';
        $smarty->config_dir = 'Smarty/configs/';
        $smarty->cache_dir = 'Smarty/cache/';
        return $smarty;
    }
}