<?php
require_once('Utility/autoload.inc.php');
$nometabella='utente';
$chiave='username';
$id='digimatt0';
echo "DELETE FROM ".$nometabella." WHERE " . $chiave . " = '" .$id. "' ;";