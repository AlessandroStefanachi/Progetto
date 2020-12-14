<?php
require_once('Utility/autoload.inc.php');

//echo(password_hash("qwerty", PASSWORD_DEFAULT));

echo FPersistentManager::homepagedef()[0]->getTitolo();