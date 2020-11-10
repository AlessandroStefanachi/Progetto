<?php
require_once('Utility/autoload.inc.php');
$nome="digimatt";
$u=FPersistentManager::load("username",$nome,"FUtente");
echo ($u[0]->__toString());