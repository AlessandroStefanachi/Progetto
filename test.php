<?php
require_once('Utility/autoload.inc.php');

$f=scandir('Copertine');
echo ($f[12]);
//foreach ($f as $a) echo($a);