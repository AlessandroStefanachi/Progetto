<?php
require_once('Utility/autoload.inc.php');

$s=FPersistentManager::load("id",42,FSerieTv::getNomeClasse());
$stg2=new EStagione('2020-10-1',"2",1);

echo ($s[0]->__toString());