<?php


class Installazione

{
static function inizia(){
    $cookie=self::verificaCookie();
   $smarty = SetupSmarty::configura();
   if($cookie){
       $smarty->assign('cookie', $cookie);

       if ($_SERVER['REQUEST_METHOD'] == 'GET'){
           $smarty->assign('phpv', true);
           $smarty->display('installazione.tpl');
       }
       else{
           if (version_compare(PHP_VERSION,'7.0.0' , '<' )) {
               $PHP = false;
               $smarty->assign('phpv', $PHP);
               $smarty->display('installazione.tpl');
           }
           else{//qui installazione
               static::install();
              header ('Location: /Progetto');

           }
       }
   }
   else{ $PHP = true;
       $smarty->assign('phpv', $PHP);
       $smarty->assign('cookie', $cookie);
       $smarty->display('installazione.tpl');

   }
}
static function verificaCookie(){

 setcookie("cookie_test", "cookie_value", time()+3600);

    if (isset($_COOKIE["cookie_test"]))
    {
        setcookie("cookie_test", "cookie_value", -(time()+3600));
        return true;
    }
    else
    {
        return false;
    }}



    static function verifica(){
        $verifica = false;
        if(file_exists('Utility/config.inc.php'))
            $verifica = true;
        return $verifica;
    }

    static function install(){
        try
        {





            $db = new PDO("mysql:host=127.0.0.1;", $_POST['nome'], $_POST['password']);
            $db->beginTransaction();
            $query = 'DROP DATABASE IF EXISTS ' .$_POST['db']. '; CREATE DATABASE ' . $_POST['db'] . ' ; USE ' . $_POST['db'] . ';';
            $query = $query . file_get_contents('BACKUP.sql');
            $db->exec($query);
            //$db->commit();
            $db = new PDO("mysql:host=127.0.0.1;", $_POST['nome'], $_POST['password']);
            $db->beginTransaction();
            $query = 'USE ' . $_POST['db'] . ';';
            $query = $query . file_get_contents('Utente.sql');
            $db->exec($query);
            $db->commit();

           /* $db = new PDO("mysql:host=127.0.0.1;", $_POST['nome'], $_POST['password']);
            $db->beginTransaction();
            $query = 'USE ' . $_POST['db'] . ';';
            $query = $query . file_get_contents('copertina.sql');
            $db->exec($query);
            $db->commit();*/
           $f=scandir('Copertine');
           foreach($f as $c){
               if($c!='.'&&$c!='..')
            $db = new PDO("mysql:host=127.0.0.1;", $_POST['nome'], $_POST['password']);
            $db->beginTransaction();
            $query = 'USE ' . $_POST['db'] . ';';
            $query = $query . file_get_contents('Copertine/'.$c);
            $db->exec($query);
            $db->commit();}


            $db = new PDO("mysql:host=127.0.0.1;", $_POST['nome'], $_POST['password']);
            $db->beginTransaction();
            $query = 'USE ' . $_POST['db'] . ';';
            $query = $query . file_get_contents('commento.sql');
            $db->exec($query);
            $db->commit();
            $db = new PDO("mysql:host=127.0.0.1;", $_POST['nome'], $_POST['password']);
            $db->beginTransaction();
            $query = 'USE ' . $_POST['db'] . ';';
            $query = $query . file_get_contents('corrispondenze.sql');
            $db->exec($query);
            $db->commit();
            $db = new PDO("mysql:host=127.0.0.1;", $_POST['nome'], $_POST['password']);
            $db->beginTransaction();
            $query = 'USE ' . $_POST['db'] . ';';
            $query = $query . file_get_contents('episodio.sql');
            $db->exec($query);
            $db->commit();
            $db = new PDO("mysql:host=127.0.0.1;", $_POST['nome'], $_POST['password']);
            $db->beginTransaction();
            $query = 'USE ' . $_POST['db'] . ';';
            $query = $query . file_get_contents('follow.sql');
            $db->exec($query);
            $db->commit();
            $db = new PDO("mysql:host=127.0.0.1;", $_POST['nome'], $_POST['password']);
            $db->beginTransaction();
            $query = 'USE ' . $_POST['db'] . ';';
            $query = $query . file_get_contents('genere.sql');
            $db->exec($query);
            $db->commit();
            $db = new PDO("mysql:host=127.0.0.1;", $_POST['nome'], $_POST['password']);
            $db->beginTransaction();
            $query = 'USE ' . $_POST['db'] . ';';
            $query = $query . file_get_contents('lingua.sql');
            $db->exec($query);
            $db->commit();
            $db = new PDO("mysql:host=127.0.0.1;", $_POST['nome'], $_POST['password']);
            $db->beginTransaction();
            $query = 'USE ' . $_POST['db'] . ';';
            $query = $query . file_get_contents('stagione.sql');
            $db->exec($query);
            $db->commit();
            $db = new PDO("mysql:host=127.0.0.1;", $_POST['nome'], $_POST['password']);
            $db->beginTransaction();
            $query = 'USE ' . $_POST['db'] . ';';
            $query = $query . file_get_contents('STGLingua.sql');
            $db->exec($query);
            $db->commit();
            $db = new PDO("mysql:host=127.0.0.1;", $_POST['nome'], $_POST['password']);
            $db->beginTransaction();
            $query = 'USE ' . $_POST['db'] . ';';
            $query = $query . file_get_contents('TVgenere.sql');
            $db->exec($query);
            $db->commit();
            $db = new PDO("mysql:host=127.0.0.1;", $_POST['nome'], $_POST['password']);
            $db->beginTransaction();
            $query = 'USE ' . $_POST['db'] . ';';
            $query = $query . file_get_contents('valutazione.sql');
            $db->exec($query);
            $db->commit();
            $db = new PDO("mysql:host=127.0.0.1;", $_POST['nome'], $_POST['password']);
            $db->beginTransaction();
            $query = 'USE ' . $_POST['db'] . ';';
            $query = $query . file_get_contents('visto.sql');
            $db->exec($query);
            $db->commit();
            $db = new PDO("mysql:host=127.0.0.1;", $_POST['nome'], $_POST['password']);
            $db->beginTransaction();
            $query = 'USE ' . $_POST['db'] . ';';
            $query = $query . file_get_contents('watchlist.sql');
            $db->exec($query);
            $db->commit();

            $db = new PDO("mysql:host=127.0.0.1;", $_POST['nome'], $_POST['password']);
            $db->beginTransaction();
            $query = 'USE ' . $_POST['db'] . ';';
            $query = $query . file_get_contents('SerieTV.sql');
            $db->exec($query);
            $db->commit();
            $db = new PDO("mysql:host=127.0.0.1;", $_POST['nome'], $_POST['password']);
            $db->beginTransaction();
            $query = 'USE ' . $_POST['db'] . ';';
            $query = $query . file_get_contents('vincoli.sql');
            $db->exec($query);
            $db->commit();



            $file = fopen('Utility/config.inc.php', 'c+');
            $script = '<?php global $config; 
            $config[\'mysql\'][\'typedb\']= \'' ."mysql:host=127.0.0.1;dbname=" . $_POST['db'] . '\';
            $config[\'mysql\'][\'password\']=  \'' . $_POST['password'] . '\';
            $config[\'mysql\'][\'user\']= \'' . $_POST['nome'] . '\';
            $config[\'mysql\'][\'host\']= \'' . "127.0.0.1". '\';?>';

            fwrite($file, $script);
            fclose($file);
           $db=null;
        }
        catch (PDOException $e)
        {
            echo "Errore : " . $e->getMessage();
            $db->rollBack();
            die;
        }
    }

}