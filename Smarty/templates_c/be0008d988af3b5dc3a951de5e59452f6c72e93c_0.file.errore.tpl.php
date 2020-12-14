<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-06 23:40:02
  from '/opt/lampp/htdocs/Progetto/Smarty/templates/errore.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fcd5dc2839737_48643401',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be0008d988af3b5dc3a951de5e59452f6c72e93c' => 
    array (
      0 => '/opt/lampp/htdocs/Progetto/Smarty/templates/errore.tpl',
      1 => 1607294397,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fcd5dc2839737_48643401 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <meta charset="utf-8">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="/Progetto/Smarty/css/errore.css">

<!-- jQuery and JS bundle w/ Popper.js -->
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"><?php echo '</script'; ?>
>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.5.14/css/mdb.min.css">




  <title>TvTracker</title>
</head>

<body>
<div id="bg2"></div>
<nav class=" nav-fill w-100 navbar navbar-expand-lg navbar-dark  " style="background-color:#555B5F;" id="navbarprincipale">
       

 <div class="navbar-collapse order-3 dual-collapse2">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="navbar-brand" href="/Progetto/Utente/homepagedef">WeBetting</a>
            </li>
            
        </ul>
    </div>
 </nav>
<div class="container fluid">
<div class="row-12">
<div class="col-2"></div>
<div class="col-10" id="text">
<p class="text-center" id="error">ERRORE: la pagina richiesta non esiste verifica che l'url sia corretto</p>
</div>
<div class="col-2"></div>

</div>
</div>
</body>
</html>
<?php }
}
