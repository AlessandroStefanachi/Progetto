<?php
require_once('Utility/autoload.inc.php');

//echo(password_hash("qwerty", PASSWORD_DEFAULT));

//echo FPersistentManager::homepagedef()[0]->getTitolo();

//$a=FPersistentManager::load('id',42,'FSerieTv');
//$a=clone($a[0]);
//print date('H:i:s');
//print date('Y-m-d');
$commento=FPersistentManager::load('id',6,FCommento::getNomeClasse());
echo $commento[0]->getAutore();