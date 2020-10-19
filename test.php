<?php
require_once('Utility/autoload.inc.php');
$u= new EUtente("digimatt0","mariow0orr@gmail.com","1234",[],[],[],[],"test");
FPersistentManager::store($u);
