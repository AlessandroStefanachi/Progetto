<?php
require_once('Utility/autoload.inc.php');
$serie=new ESerieTv("p","1","p","p");
$genere=FPersistentManager::loadGenere("Horror");
$g=array();
array_push($g,$genere[0]["genere"]);
$serie->setGenere($g);
$stg=new EStagione('0-10-2020',"1",1);
$lingua=FPersistentManager::loadLingua("Italiano");
$l=array();
array_push($l,$lingua[0]["lingua"]);

$stg->setLingue($l);
$ep=new EEpisodio("prova1",0.1,false);
$stg->aggiungiEpisodi($ep);
$serie->aggiungiStagione($stg);
FPersistentManager::store($serie);