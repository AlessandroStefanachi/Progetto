<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-18 00:11:37
  from '/opt/lampp/htdocs/Progetto/Smarty/templates/homepagedef.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fdbe5a9186b52_27804403',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16e219a2673da0e12bba6ee77e861ca1dbf5ab57' => 
    array (
      0 => '/opt/lampp/htdocs/Progetto/Smarty/templates/homepagedef.tpl',
      1 => 1608246163,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fdbe5a9186b52_27804403 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('errore', (($tmp = @$_smarty_tpl->tpl_vars['errore']->value)===null||$tmp==='' ? false : $tmp));
$_smarty_tpl->_assignInScope('errorelog', (($tmp = @$_smarty_tpl->tpl_vars['errorelog']->value)===null||$tmp==='' ? false : $tmp));
$_smarty_tpl->_assignInScope('errorelog', (($tmp = @$_smarty_tpl->tpl_vars['errorelog']->value)===null||$tmp==='' ? false : $tmp));?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">




    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.5.14/css/mdb.min.css">
    <link rel="stylesheet" type="text/css" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/mdb-plugins-gathered.min.css">

    <?php echo '<script'; ?>
 src="/Progetto/Smarty/js/registrazione.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="/Progetto/Smarty/css/homepagedef.css">
    <title>TvTracker</title>
    <?php echo '<script'; ?>
>
        function ready(){
            if (!navigator.cookieEnabled) {
                alert('Attenzione! per un corretto funzionamento del sito abilita i cookie e ricarica la pagina');
            }
        }
        document.addEventListener("DOMContentLoaded", ready);
    <?php echo '</script'; ?>
>

</head>


<div id="bg2"></div>

</div>
<nav class="navbar navbar-expand-lg navbar-dark " id="navbarprincipale">


    <div class="navbar-collapse order-3 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
<span class="navbar-brand"style="margin-top:;">
 <img src="/Progetto/Smarty/Immagini/giallo2.png" width="50" height="50" class="d-inline-block align-top" alt="" loading="lazy" style="margin-right:2px"">
                  </span></li>

            <li class="nav-item pt-2">
<span class="navbar-brand"style="margin-top:;">

                 Tv Tracker </span></li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="navbar-brand" data-toggle="modal" data-target="#login" href="">Login</a>
            </li>
            <li class="nav-item">
                <a class="navbar-brand" data-toggle="modal" data-target="#registrati" href="#">Registrati</a>
            </li>
        </ul>
    </div>
</nav>
<?php if ($_smarty_tpl->tpl_vars['errore']->value == true) {?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>REGISTRAZIONE FALLITA</strong> username o email già usati riprova
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['errorelog']->value == true) {?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>LOGIN FALLITO</strong> username o password errati
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php }?>
<noscript><div class="alert alert-danger alert-dismissible fade show" role="alert">
            Per un corretto funzionamento del sito web è necessario abilitare JavaScript e poi ricaricare la pagina
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div></noscript>
<div class="container-fluid" >

    <div class="row">
        <div class="col-sm">

        </div>
    </div>
    <div class="row pb-5"></div>
    <div class="row pb-5"></div>
    <div class="row pb-5"></div>
    <div class="row pb-5"></div>
    <div class="row pb-5"></div>
    <div class="row  pt-5"id="first desc" style="background-color:white;">
        <div class="col" id="first"><p class="text-left">cosa puoi fare con TV TRACKER</p>
        </div>
    </div>
    <div class="row pb-5 pt-5"id="second desc" style="background-color:white;">

        <div class="col" id="second">  <p class="text-left">  <span class="dot"></span>Crea e differenzia le tue watchlist e tieni traccia dei tuoi progressi</p></div>
    </div>
    <div class="row pb-5 " style="background-color:white;"> <div class="col" id="third"><p class="text-left"><span class="dot"></span>Valuta e commenta gli episodi che hai visto</p></div></div>
    <div class="row pb-5 " style="background-color:white;">  <div class="col" id="fourth"><p class="text-left"> <span class="dot"></span>Segui altri utenti e scopri nuove serie TV</p></div></div>
    <div class="row pb-5"></div>
    <div class="row pb-5">
        <div class="col-sm-1" style="background-color: ;">

        </div>
        <div class="col-sm-10" style=>
            <div class="container my-4">





                <!--Carousel Wrapper-->
                <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

                    <!--Controls-->
                    <div class="controls-top">
                        <a class="btn-floating waves-effect waves-light" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left" style="background-color:#FFCF17;"></i></a>
                        <a class="btn-floating waves-effect waves-light" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right" style="background-color:#FFCF17;"></i></a>
                    </div>
                    <!--/.Controls-->

                    <!--Indicators-->
                    <ol class="carousel-indicators">
                        <li data-target="#multi-item-example" data-slide-to="0" class="active" style="background-color:#FFCF17;"></li>
                        <li data-target="#multi-item-example" data-slide-to="1" class="" style="background-color:#FFCF17;"></li>
                        <li data-target="#multi-item-example" data-slide-to="2" class="" style="background-color:#FFCF17;"></li>
                    </ol>
                    <!--/.Indicators-->

                    <!--Slides-->
                    <div class="carousel-inner" role="listbox">

                        <!--First slide-->
                        <div class="carousel-item active">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card mb-2 h-100">
                                        <img class="card-img-top " style="width: 100%;height: 15vw;object-fit: fill;" <?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[0]))) {?>src="data:<?php echo $_smarty_tpl->tpl_vars['serie']->value[0]->getCopertina()->getType();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['s']->value[0];?>
"<?php }?> alt="Card image cap">
                                        <div class="card-body ">
                                            <h4 class="card-title"><?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[0]))) {
echo $_smarty_tpl->tpl_vars['serie']->value[0]->getTitolo();
}?></h4>
                                            <p class="card-text"><?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[0]))) {
echo $_smarty_tpl->tpl_vars['serie']->value[0]->getTrama();
}?></p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 clearfix d-none d-md-block">
                                    <div class="card mb-2 h-100">
                                        <img class="card-img-top" style="width: 100%;height: 15vw;object-fit: fill;"  <?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[1]))) {?>src="data:<?php echo $_smarty_tpl->tpl_vars['serie']->value[1]->getCopertina()->getType();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['s']->value[1];?>
"<?php }?> alt="Card image cap">
                                        <div class="card-body ">
                                            <h4 class="card-title"><?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[1]))) {
echo $_smarty_tpl->tpl_vars['serie']->value[1]->getTitolo();
}?></h4>
                                            <p class="card-text"><?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[1]))) {
echo $_smarty_tpl->tpl_vars['serie']->value[1]->getTrama();
}?></p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 clearfix d-none d-md-block">
                                    <div class="card mb-2 h-100">
                                        <img class="card-img-top" style="width: 100%;height: 15vw;object-fit: fill;"  <?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[2]))) {?>src="data:<?php echo $_smarty_tpl->tpl_vars['serie']->value[2]->getCopertina()->getType();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['s']->value[2];?>
" <?php }?>alt="Card image cap">
                                        <div class="card-body ">
                                            <h4 class="card-title"><?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[2]))) {
echo $_smarty_tpl->tpl_vars['serie']->value[2]->getTitolo();
}?></h4>
                                            <p class="card-text"><?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[2]))) {
echo $_smarty_tpl->tpl_vars['serie']->value[2]->getTrama();
}?></p>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--/.First slide-->

                        <!--Second slide-->
                        <div class="carousel-item ">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card mb-2 h-100">
                                        <img class="card-img-top" style="width: 100%;height: 15vw;object-fit: fill;"  <?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[3]))) {?>src="data:<?php echo $_smarty_tpl->tpl_vars['serie']->value[3]->getCopertina()->getType();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['s']->value[3];?>
" <?php }?>alt="Card image cap">
                                        <div class="card-body ">
                                            <h4 class="card-title"><?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[3]))) {
echo $_smarty_tpl->tpl_vars['serie']->value[3]->getTitolo();
}?></h4>
                                            <p class="card-text"><?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[3]))) {
echo $_smarty_tpl->tpl_vars['serie']->value[3]->getTrama();
}?></p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 clearfix d-none d-md-block">
                                    <div class="card mb-2 h-100">
                                        <img class="card-img-top" style="width: 100%;height: 15vw;object-fit: fill;"  <?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[4]))) {?>src="data:<?php echo $_smarty_tpl->tpl_vars['serie']->value[4]->getCopertina()->getType();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['s']->value[4];?>
" <?php }?>alt="Card image cap">
                                        <div class="card-body ">
                                            <h4 class="card-title"><?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[4]))) {
echo $_smarty_tpl->tpl_vars['serie']->value[4]->getTitolo();
}?></h4>
                                            <p class="card-text"><?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[4]))) {
echo $_smarty_tpl->tpl_vars['serie']->value[4]->getTrama();
}?></p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 clearfix d-none d-md-block">
                                    <div class="card mb-2 h-100">
                                        <img class="card-img-top" style="width: 100%;height: 15vw;object-fit: fill;"  <?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[5]))) {?>src="data:<?php echo $_smarty_tpl->tpl_vars['serie']->value[5]->getCopertina()->getType();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['s']->value[5];?>
"<?php }?> alt="Card image cap">
                                        <div class="card-body ">
                                            <h4 class="card-title"><?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[5]))) {
echo $_smarty_tpl->tpl_vars['serie']->value[5]->getTitolo();
}?></h4>
                                            <p class="card-text"><?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[5]))) {
echo $_smarty_tpl->tpl_vars['serie']->value[5]->getTrama();
}?></p>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--/.Second slide-->

                        <!--Third slide-->
                        <div class="carousel-item ">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card mb-2 h-100">
                                        <img class="card-img-top" style="width: 100%;height: 15vw;object-fit: fill;"<?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[6]))) {?>src="data:<?php echo $_smarty_tpl->tpl_vars['serie']->value[6]->getCopertina()->getType();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['s']->value[6];?>
" <?php }?>alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[6]))) {
echo $_smarty_tpl->tpl_vars['serie']->value[6]->getTitolo();
}?></h4>
                                            <p class="card-text"><?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[6]))) {
echo $_smarty_tpl->tpl_vars['serie']->value[6]->getTrama();
}?></p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 clearfix d-none d-md-block">
                                    <div class="card mb-2 h-100">
                                        <img class="card-img-top" style="width: 100%;height: 15vw;object-fit: fill;"  <?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[7]))) {?>src="data:<?php echo $_smarty_tpl->tpl_vars['serie']->value[7]->getCopertina()->getType();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['s']->value[7];?>
"  <?php }?>alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[7]))) {
echo $_smarty_tpl->tpl_vars['serie']->value[7]->getTitolo();
}?></h4>
                                            <p class="card-text"><?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[7]))) {
echo $_smarty_tpl->tpl_vars['serie']->value[7]->getTrama();
}?></p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 clearfix d-none d-md-block">
                                    <div class="card mb-2 h-100">
                                        <img class="card-img-top" style="width: 100%;height: 15vw;object-fit: fill;"   <?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[8]))) {?>src="data:<?php echo $_smarty_tpl->tpl_vars['serie']->value[8]->getCopertina()->getType();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['s']->value[8];?>
"<?php }?> alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title"><?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[8]))) {
echo $_smarty_tpl->tpl_vars['serie']->value[8]->getTitolo();
}?></h4>
                                            <p class="card-text"><?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[8]))) {
echo $_smarty_tpl->tpl_vars['serie']->value[8]->getTrama();
}?></p>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--/.Third slide-->

                    </div>
                    <!--/.Slides-->

                </div>
                <!--/.Carousel Wrapper-->
            </div>

            <div class="col-sm-1" style="background-color: ;">

            </div>

        </div>


    </div>

    <!-- Modal -->
    <div class="modal fade" id="login" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Accedi</h4>
                    <button type="button" class="close" data-dismiss="modal"onclick="reset()">&times;</button>

                </div>
                <div class="modal-body">
                    <form method="post" action="/Progetto/Utente/login">

                        <div class="form-group">

                            <input type="username" class="form-control" name="username" id="username" aria-describedby="username" placeholder="Username">

                        </div>
                        <div class="form-group">

                            <input type="password"  name="password" class="form-control" id="exampleInputPassword1"placeholder="Password">
                        </div>
                        <div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="ricordami">
                                <label for="ricordami">Ricordami</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Accedi</button>
                    </form>
                </div>

            </div>

        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="registrati" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Registrati</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form method="post" action="/Progetto/Utente/registrazione">

                    <div class="form-group">

                        <input type="text" class="form-control" name="username" id="nickname"  placeholder="Username" oninput="check()">

                    </div>
                    <div class="alert alert-danger" role="alert" style="display:none;" id="username alert">
                        Questo campo è obbligatorio e il non puoi usare più di 16 caratteri
                    </div>

                    <div class="form-group">
                        <div class="form-group">

                            <input type="username" name="email" class="form-control" id="email"  placeholder="email" oninput="check()">

                        </div>
                        <div class="alert alert-danger" role="alert" style="display:none;" id="email alert">
                            email non valida
                        </div>
                        <div class="alert alert-success" role="alert" style="display:none" id="email ok">
                            email valida
                        </div>
                        <div class="form-group">

                            <input type="password" name="password" class="form-control" id="Password"placeholder="Password" oninput="check()">

                        </div>
                        <div class="alert alert-danger" role="alert" style="display:none;" id="pass alert">
                            la password deve contenere un numero, una maiuscola e un carattere speciale
                        </div>
                        <div class="alert alert-success" role="alert"style="display:none" id="pass ok">
                            password valida
                        </div>
                        <div> <button type="submit" class="btn btn-primary btn-dark" id="registratibutton" disabled>Registrati</button> </div>
                </form>
            </div>

        </div>

    </div>

</div>

<!------>

<?php echo '<script'; ?>
>$('#registrati').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        reset();
    })<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.5.14/js/mdb.min.js"><?php echo '</script'; ?>
>
<div class="hiddendiv common"></div>
<?php echo '<script'; ?>
 type="text/javascript" src="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/js/plugins/mdb-plugins-gathered.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript"><?php echo '</script'; ?>
>

</body>
</html><?php }
}
