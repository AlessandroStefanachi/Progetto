<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-14 15:12:08
  from '/opt/lampp/htdocs/Progetto/Smarty/templates/homelog.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_600051388beb04_26730711',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e370b45fdf3b9b10ac696de95bf662d164194fc0' => 
    array (
      0 => '/opt/lampp/htdocs/Progetto/Smarty/templates/homelog.tpl',
      1 => 1610633293,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600051388beb04_26730711 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>



    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">





    <?php echo '<script'; ?>
 src="/Progetto/Smarty/js/switch.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/Progetto/Smarty/js/button.js"><?php echo '</script'; ?>
>






    <!-- jQuery and JS bundle w/ Popper.js -->
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.5.14/css/mdb.min.css">

    <link rel="stylesheet" type="text/css" href="/Progetto/Smarty/css/hov2.css">

    <?php echo '<script'; ?>
>
        $(document).ready(function(){
            $("#staticBackdrop").modal('show');
        });
    <?php echo '</script'; ?>
>




    <title>TvTracker</title>
</head>

<body>
<div id="bg2"></div>
<nav class=" nav-fill w-100 navbar navbar-expand-lg navbar-dark  " style="background-color:#555B5F;" id="navbarprincipale">


    <div class="navbar-collapse order-3 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item " id="dropdown">
                <span class="navbar-brand" id="dropbtn">
				Filtro Rapido</span>
                <div id="dropdown-content" style="background-color: #FFCF17">

                    <form class>
                        <?php $_smarty_tpl->_assignInScope('v', 1);?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['genere']->value, 'g');
$_smarty_tpl->tpl_vars['g']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['g']->value) {
$_smarty_tpl->tpl_vars['g']->do_else = false;
?>

                        <div class="form-check">

                            <input class="form-check-input" type="radio" name="genere" id="<?php echo $_smarty_tpl->tpl_vars['g']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['g']->value;?>
" onclick="activatefilter()">
                            <label class="form-check-label" for="<?php echo $_smarty_tpl->tpl_vars['g']->value;?>
">

                                <?php echo $_smarty_tpl->tpl_vars['g']->value;?>


                            </label>
                            <?php $_smarty_tpl->_assignInScope('v', $_smarty_tpl->tpl_vars['v']->value+1);?>
                        </div>
                       <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        <button id="filterbutton" type="submit" class="btn btn-primary" style="background-color: #555B5F !important;" disabled="true">Filtra</button>
                    </form>
                </div>
            </li>
            <li class="nav-item" id="popwc">

                <a class="navbar-brand" id="popwc" href="#">
                    <div class="icon" id="popwc">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                            <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg>
                    </div>
                </a>
                <span id="wc-appear">Apri <span id="wc-appear">Watchlist</span>
            </li>
        </ul>
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <span class="navbar-brand" href="/Progetto/Utente/homepagedef">
                    <img src="/Progetto/Smarty/Immagini/giallo2.png" width="50" height="50" class="d-inline-block align-top" alt="icona" loading="lazy"></span>
            </li>
            <li class="nav-item pt-2">
<span class="navbar-brand pt-4"style="margin-top:;">Tv Tracker </span></li>
        </ul>
        <ul class="navbar-nav ml-auto" >
            <li class="nav-item" id="poppr">

                <a class="navbar-brand"  href="/Progetto/Utente/user?id=<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                    </div>
                </a>
                <span id="pr-appear">Profilo</span>
            </li>
            <li class="nav-item" id="poplg">

                <a class="navbar-brand" href="/Progetto/Utente/logout" >
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </div>
                    </a>
                <span id="lg-appear">logout</span>
            </li>
        </ul>
    </div>
</nav>

<div class="d-flex " style="display: flex ; flex-wrap: wrap; width: 100%;flex-grow: 1;">
    <div class="d-flex flex-row justify-content-center pt-5" style="width: 100%">
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Cerca serie tv" aria-label="Nome serie tv" id="scbar" style="width: 40vw">

            <btn  id="b" type="submit">
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="CurrentColor" class="bi bi-search" viewBox="0 0 16 16" d>
                    <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                    <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                </svg>
              </div>
            </btn>

        </form>
    </div>





    <div class=" d-flex flex-row justify-content-around pt-4" style=" /* flex-grow, flex-shrink, flex-basis */
  ; width: 100%">
        <div class="mr-5"></div>

        <!--Carousel Wrapper-->
        <div id="multi-item-example" class="carousel slide carousel-multi-item ml-5 series" data-bs-interval="0">

            <!--Controls-->

            <div class="d-flex justify-content-between controls-top">
                <div class="pt-4 watch pr-5"></div>
                    <div class="pt-4 series">
                        <form>
                        <label for="order" style="color: #f9f9f9">Ordina per rating</label>
                        <div class="btn-group me-2" id="order" role="group" aria-label="Second group">

                            <button type="submit" formmethod="post" formaction="/Progetto/Utente/crs" class="btn btn-secondary" id="order"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-up" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M3.204 11L8 5.519 12.796 11H3.204zm-.753-.659l4.796-5.48a1 1 0 0 1 1.506 0l4.796 5.48c.566.647.106 1.659-.753 1.659H3.204a1 1 0 0 1-.753-1.659z"/>
                                </svg></button>
                            <button type="submit"formmethod="post" formaction="/Progetto/Utente/decr" class="btn btn-secondary" id="order"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M3.204 5L8 10.481 12.796 5H3.204zm-.753.659l4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>
                                </svg></button >

                        </div>
                        </form>
                    </div>
                <div class="pr-5">
                <a class="btn-floating waves-effect waves-light" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left" style="background-color:#FFCF17; !important;"></i></a>
                <a class="btn-floating waves-effect waves-light" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right" style="background-color:#FFCF17;!important"></i></a>
                </div>


                <div class="pl-3 pt-4">
                    <button type="button" class="btn btn-secondary series" id="order" onclick="change()">Watchlist user</button>

                </div>

            </div>
            <!--/.Controls-->

            <!--Indicators-->

            <!--/.Indicators-->

            <!--Slides-->
            <div class="carousel-inner" >

                <!--First slide-->
                <?php $_smarty_tpl->_assignInScope('se', 0);?>
                <?php if (!(isset($_smarty_tpl->tpl_vars['serie']->value)) || count($_smarty_tpl->tpl_vars['serie']->value)/6 <= 1) {?>
                    <?php $_smarty_tpl->_assignInScope('cicli', 1);?>
                    <?php } else {
$_smarty_tpl->_assignInScope('cicli', count($_smarty_tpl->tpl_vars['serie']->value)/6);?>
                <?php }?>
                <?php
$_smarty_tpl->tpl_vars['ciclo'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['ciclo']->step = 1;$_smarty_tpl->tpl_vars['ciclo']->total = (int) ceil(($_smarty_tpl->tpl_vars['ciclo']->step > 0 ? $_smarty_tpl->tpl_vars['cicli']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['cicli']->value)+1)/abs($_smarty_tpl->tpl_vars['ciclo']->step));
if ($_smarty_tpl->tpl_vars['ciclo']->total > 0) {
for ($_smarty_tpl->tpl_vars['ciclo']->value = 1, $_smarty_tpl->tpl_vars['ciclo']->iteration = 1;$_smarty_tpl->tpl_vars['ciclo']->iteration <= $_smarty_tpl->tpl_vars['ciclo']->total;$_smarty_tpl->tpl_vars['ciclo']->value += $_smarty_tpl->tpl_vars['ciclo']->step, $_smarty_tpl->tpl_vars['ciclo']->iteration++) {
$_smarty_tpl->tpl_vars['ciclo']->first = $_smarty_tpl->tpl_vars['ciclo']->iteration === 1;$_smarty_tpl->tpl_vars['ciclo']->last = $_smarty_tpl->tpl_vars['ciclo']->iteration === $_smarty_tpl->tpl_vars['ciclo']->total;?>
                <div class="carousel-item <?php if ($_smarty_tpl->tpl_vars['ciclo']->value == 1) {?>active<?php }?> ">

                    <div class="row justify-content-center">

                            <div class="jumbotron series" style="display: block; overflow: auto;background-color: #919598;min-height: 70vh;min-width: 70vw;max-width: 90vw;!important;">
                                <?php if ((isset($_smarty_tpl->tpl_vars['filtro']->value)) && $_smarty_tpl->tpl_vars['filtro']->value != 'empty') {?><h1 class="text-center" style="color: #555B5F"><?php echo $_smarty_tpl->tpl_vars['filtro']->value;?>


                                    <a class="icon" style="color: #555B5F" href="/Progetto/Utente/homepagedef"> <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                                            </svg></div></a>
                                    </h1><?php }?>
                                <?php
$_smarty_tpl->tpl_vars['r'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['r']->step = 1;$_smarty_tpl->tpl_vars['r']->total = (int) ceil(($_smarty_tpl->tpl_vars['r']->step > 0 ? 1+1 - (0) : 0-(1)+1)/abs($_smarty_tpl->tpl_vars['r']->step));
if ($_smarty_tpl->tpl_vars['r']->total > 0) {
for ($_smarty_tpl->tpl_vars['r']->value = 0, $_smarty_tpl->tpl_vars['r']->iteration = 1;$_smarty_tpl->tpl_vars['r']->iteration <= $_smarty_tpl->tpl_vars['r']->total;$_smarty_tpl->tpl_vars['r']->value += $_smarty_tpl->tpl_vars['r']->step, $_smarty_tpl->tpl_vars['r']->iteration++) {
$_smarty_tpl->tpl_vars['r']->first = $_smarty_tpl->tpl_vars['r']->iteration === 1;$_smarty_tpl->tpl_vars['r']->last = $_smarty_tpl->tpl_vars['r']->iteration === $_smarty_tpl->tpl_vars['r']->total;?>
                             <div class="row pt-2">


                                 <?php
$_smarty_tpl->tpl_vars['c'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['c']->step = 1;$_smarty_tpl->tpl_vars['c']->total = (int) ceil(($_smarty_tpl->tpl_vars['c']->step > 0 ? 2+1 - (0) : 0-(2)+1)/abs($_smarty_tpl->tpl_vars['c']->step));
if ($_smarty_tpl->tpl_vars['c']->total > 0) {
for ($_smarty_tpl->tpl_vars['c']->value = 0, $_smarty_tpl->tpl_vars['c']->iteration = 1;$_smarty_tpl->tpl_vars['c']->iteration <= $_smarty_tpl->tpl_vars['c']->total;$_smarty_tpl->tpl_vars['c']->value += $_smarty_tpl->tpl_vars['c']->step, $_smarty_tpl->tpl_vars['c']->iteration++) {
$_smarty_tpl->tpl_vars['c']->first = $_smarty_tpl->tpl_vars['c']->iteration === 1;$_smarty_tpl->tpl_vars['c']->last = $_smarty_tpl->tpl_vars['c']->iteration === $_smarty_tpl->tpl_vars['c']->total;?>
                                 <?php if ($_smarty_tpl->tpl_vars['se']->value < count($_smarty_tpl->tpl_vars['serie']->value)) {?>
                                 <div class="col-4">
                                     <div class="card mb-2 h-100 mr-2" style=" display:block;overflow:auto; min-width: 20vw; max-width: 20vw!important;">
                                         <div class="imgdiv"style="display: block;">
                                             <img class="card-img-top " style="width:20vw;height: 15vw;object-fit: fill; !important" <?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[$_smarty_tpl->tpl_vars['se']->value]))) {?>src="data:<?php echo $_smarty_tpl->tpl_vars['serie']->value[$_smarty_tpl->tpl_vars['se']->value]->getCopertina()->getType();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['cop']->value[$_smarty_tpl->tpl_vars['se']->value];?>
"<?php }?> alt="Card image cap"></div>
                                         <div class="card-body ">
                                             <?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[$_smarty_tpl->tpl_vars['se']->value]))) {?><h4 class="card-title"> <?php echo $_smarty_tpl->tpl_vars['serie']->value[$_smarty_tpl->tpl_vars['se']->value]->getTitolo();?>
 </h4><?php }?>
                                            <?php if ((isset($_smarty_tpl->tpl_vars['serie']->value[$_smarty_tpl->tpl_vars['se']->value]))) {?>
                                             <?php $_smarty_tpl->_assignInScope('star', $_smarty_tpl->tpl_vars['serie']->value[$_smarty_tpl->tpl_vars['se']->value]->getValutazione());?>

                                             <span class="fa fa-star<?php if ($_smarty_tpl->tpl_vars['star']->value > 0) {?> checked <?php $_smarty_tpl->_assignInScope('star', $_smarty_tpl->tpl_vars['star']->value-1);
}?> "></span>
                                             <span class="fa fa-star <?php if ($_smarty_tpl->tpl_vars['star']->value > 0) {?> checked <?php $_smarty_tpl->_assignInScope('star', $_smarty_tpl->tpl_vars['star']->value-1);
}?>"></span>
                                             <span class="fa fa-star <?php if ($_smarty_tpl->tpl_vars['star']->value > 0) {?> checked <?php $_smarty_tpl->_assignInScope('star', $_smarty_tpl->tpl_vars['star']->value-1);
}?>"></span>
                                             <span class="fa fa-star <?php if ($_smarty_tpl->tpl_vars['star']->value > 0) {?> checked <?php $_smarty_tpl->_assignInScope('star', $_smarty_tpl->tpl_vars['star']->value-1);
}?>"></span>
                                             <span class="fa fa-star <?php if ($_smarty_tpl->tpl_vars['star']->value > 0) {?> checked <?php $_smarty_tpl->_assignInScope('star', $_smarty_tpl->tpl_vars['star']->value-1);
}?>"></span>
                                             <?php }?>

                                             <br>
                                             <a  class="pt-2" href="/Progetto/Utente/shortadding?id=<?php echo $_smarty_tpl->tpl_vars['serie']->value[$_smarty_tpl->tpl_vars['se']->value]->getId();?>
" >

                                                     <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#555B5F" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                         <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                         <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                                     </svg>

                                             </a>

                                             <a  class="pt-2" href="/Progetto/SerieTv/info?id=<?php echo $_smarty_tpl->tpl_vars['serie']->value[$_smarty_tpl->tpl_vars['se']->value]->getId();?>
" >

                                                 <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#555B5F" class="bi bi-binoculars" viewBox="0 0 16 16">
                                                     <path fill-rule="evenodd" d="M3 2.5A1.5 1.5 0 0 1 4.5 1h1A1.5 1.5 0 0 1 7 2.5V5h2V2.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5v2.382a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V14.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 14.5v-3a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5v3A1.5 1.5 0 0 1 5.5 16h-3A1.5 1.5 0 0 1 1 14.5V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V2.5zM4.5 2a.5.5 0 0 0-.5.5V3h2v-.5a.5.5 0 0 0-.5-.5h-1zM6 4H4v.882a1.5 1.5 0 0 1-.83 1.342l-.894.447A.5.5 0 0 0 2 7.118V13h4v-1.293l-.854-.853A.5.5 0 0 1 5 10.5v-1A1.5 1.5 0 0 1 6.5 8h3A1.5 1.5 0 0 1 11 9.5v1a.5.5 0 0 1-.146.354l-.854.853V13h4V7.118a.5.5 0 0 0-.276-.447l-.895-.447A1.5 1.5 0 0 1 12 4.882V4h-2v1.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V4zm4-1h2v-.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V3zm4 11h-4v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14zm-8 0H2v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14z"/>
                                                 </svg>

                                             </a>
                                             <?php $_smarty_tpl->_assignInScope('se', $_smarty_tpl->tpl_vars['se']->value+1);?>
                                         </div>
                                     </div>
                                 </div>
                                 <?php }?>
                                   <?php }
}
?>
                                 <?php if ($_smarty_tpl->tpl_vars['se']->value == 2 || $_smarty_tpl->tpl_vars['se']->value == 5) {?> <div class="card mb-2 h-100 mr-2 pr-2" style="overflow:auto; min-width: 20vw;!important;"></div><?php }?>


                            </div>
                                <?php }
}
?> <!--/row-->


                            </div>




                    </div>

                </div>
                <?php }
}
?>

                <!--/.First slide-->

                <!--Second slide-->

                <!--/.Third slide-->

            </div>
            <!--/.Slides-->

        </div>

        <!--Carousel watch-->



        <!--Carousel Wrapper-->
        <div id="multi-item-example-watch" class="carousel slide carousel-multi-item ml-5 watch" data-bs-interval="0">

            <!--Controls-->

            <div class="d-flex justify-content-between controls-top">
                <div class="pt-4 watch pr-5"></div>

                <div class="pr-5">
                    <a class="btn-floating waves-effect waves-light " href="#multi-item-example-watch" data-slide="prev"><i class="fa fa-chevron-left" style="background-color:#FFCF17; !important;"></i></a>
                    <a class="btn-floating waves-effect waves-light " href="#multi-item-example-watch" data-slide="next"><i class="fa fa-chevron-right" style="background-color:#FFCF17;!important"></i></a>
                </div>


                <div class="pl-3 pt-4">

                    <button type="button" class="btn btn-secondary watch" id="order" onclick="change2()">Serie Tv</button>
                </div>

            </div>
            <!--/.Controls-->

            <!--Indicators-->

            <!--/.Indicators-->

            <!--Slides-->
            <div class="carousel-inner" >

                <!--First slide-->
                <?php $_smarty_tpl->_assignInScope('se', 0);?>
                <?php if (!(isset($_smarty_tpl->tpl_vars['watch']->value)) || count($_smarty_tpl->tpl_vars['watch']->value)/3 <= 1) {?>
                    <?php $_smarty_tpl->_assignInScope('cicli', 1);?>
                <?php } else {
$_smarty_tpl->_assignInScope('cicli', count($_smarty_tpl->tpl_vars['watch']->value)/3);?>
                <?php }?>
                <?php
$_smarty_tpl->tpl_vars['ciclo'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['ciclo']->step = 1;$_smarty_tpl->tpl_vars['ciclo']->total = (int) ceil(($_smarty_tpl->tpl_vars['ciclo']->step > 0 ? $_smarty_tpl->tpl_vars['cicli']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['cicli']->value)+1)/abs($_smarty_tpl->tpl_vars['ciclo']->step));
if ($_smarty_tpl->tpl_vars['ciclo']->total > 0) {
for ($_smarty_tpl->tpl_vars['ciclo']->value = 1, $_smarty_tpl->tpl_vars['ciclo']->iteration = 1;$_smarty_tpl->tpl_vars['ciclo']->iteration <= $_smarty_tpl->tpl_vars['ciclo']->total;$_smarty_tpl->tpl_vars['ciclo']->value += $_smarty_tpl->tpl_vars['ciclo']->step, $_smarty_tpl->tpl_vars['ciclo']->iteration++) {
$_smarty_tpl->tpl_vars['ciclo']->first = $_smarty_tpl->tpl_vars['ciclo']->iteration === 1;$_smarty_tpl->tpl_vars['ciclo']->last = $_smarty_tpl->tpl_vars['ciclo']->iteration === $_smarty_tpl->tpl_vars['ciclo']->total;?>
                    <div class="carousel-item <?php if ($_smarty_tpl->tpl_vars['ciclo']->value == 1) {?>active<?php }?> ">

                        <div class="row justify-content-center">

                            <div class="jumbotron watch"  style="display: block; overflow: auto;background-color: #919598;min-height: 70vh;min-width: 70vw;max-width: 90vw;!important;">
                                <div class="row">
                                    <?php
$_smarty_tpl->tpl_vars['c'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['c']->step = 1;$_smarty_tpl->tpl_vars['c']->total = (int) ceil(($_smarty_tpl->tpl_vars['c']->step > 0 ? 2+1 - (0) : 0-(2)+1)/abs($_smarty_tpl->tpl_vars['c']->step));
if ($_smarty_tpl->tpl_vars['c']->total > 0) {
for ($_smarty_tpl->tpl_vars['c']->value = 0, $_smarty_tpl->tpl_vars['c']->iteration = 1;$_smarty_tpl->tpl_vars['c']->iteration <= $_smarty_tpl->tpl_vars['c']->total;$_smarty_tpl->tpl_vars['c']->value += $_smarty_tpl->tpl_vars['c']->step, $_smarty_tpl->tpl_vars['c']->iteration++) {
$_smarty_tpl->tpl_vars['c']->first = $_smarty_tpl->tpl_vars['c']->iteration === 1;$_smarty_tpl->tpl_vars['c']->last = $_smarty_tpl->tpl_vars['c']->iteration === $_smarty_tpl->tpl_vars['c']->total;?>
                                    <?php if ($_smarty_tpl->tpl_vars['se']->value < count($_smarty_tpl->tpl_vars['watch']->value)) {?>
                                    <div class="col-4 ">
                                        <div class="card mb-2 h-100 mr-2 pr-2" style="overflow:auto; min-width: 20vw;max-width: 20vw;!important;">
                                            <img class="card-img-top " style="width:20vw;height: 15vw;object-fit: fill;" <?php if ((isset($_smarty_tpl->tpl_vars['Cwatch']->value[$_smarty_tpl->tpl_vars['se']->value]))) {?>src="data:<?php echo $_smarty_tpl->tpl_vars['type']->value[$_smarty_tpl->tpl_vars['se']->value];?>
;base64,<?php echo $_smarty_tpl->tpl_vars['Cwatch']->value[$_smarty_tpl->tpl_vars['se']->value];?>
"<?php }?> alt="Card image cap">
                                            <div class="card-body ">
                                                <h4 class="card-title"><?php echo $_smarty_tpl->tpl_vars['watch']->value[$_smarty_tpl->tpl_vars['se']->value]->getNome();?>
</h4>
                                                <a><?php echo $_smarty_tpl->tpl_vars['watch']->value[$_smarty_tpl->tpl_vars['se']->value]->getProprietario();?>
</a>
                                                <br>
                                                <hr>
                                                <span><?php echo $_smarty_tpl->tpl_vars['watch']->value[$_smarty_tpl->tpl_vars['se']->value]->getDescrizione();?>
</span>

                                                <hr>
                                                <br>
                                                <a  class="pt-2" <?php if (!in_array($_smarty_tpl->tpl_vars['watch']->value[$_smarty_tpl->tpl_vars['se']->value]->getProprietario(),$_smarty_tpl->tpl_vars['seguiti']->value)) {?>href="/Progetto/Utente/follow?user=<?php echo $_smarty_tpl->tpl_vars['watch']->value[$_smarty_tpl->tpl_vars['se']->value]->getProprietario();?>
" <?php }?> >

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#555B5F" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                                    </svg>

                                                </a>

                                                <a  class="pt-2" href="" >

                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#555B5F" class="bi bi-binoculars" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M3 2.5A1.5 1.5 0 0 1 4.5 1h1A1.5 1.5 0 0 1 7 2.5V5h2V2.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5v2.382a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V14.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 14.5v-3a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5v3A1.5 1.5 0 0 1 5.5 16h-3A1.5 1.5 0 0 1 1 14.5V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V2.5zM4.5 2a.5.5 0 0 0-.5.5V3h2v-.5a.5.5 0 0 0-.5-.5h-1zM6 4H4v.882a1.5 1.5 0 0 1-.83 1.342l-.894.447A.5.5 0 0 0 2 7.118V13h4v-1.293l-.854-.853A.5.5 0 0 1 5 10.5v-1A1.5 1.5 0 0 1 6.5 8h3A1.5 1.5 0 0 1 11 9.5v1a.5.5 0 0 1-.146.354l-.854.853V13h4V7.118a.5.5 0 0 0-.276-.447l-.895-.447A1.5 1.5 0 0 1 12 4.882V4h-2v1.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V4zm4-1h2v-.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V3zm4 11h-4v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14zm-8 0H2v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14z"/>
                                                    </svg>

                                                </a>
                                                <?php $_smarty_tpl->_assignInScope('se', $_smarty_tpl->tpl_vars['se']->value+1);?>

                                            </div>
                                        </div>
                                    </div>

                                    <?php }
}
}
?>
                                    <?php if ($_smarty_tpl->tpl_vars['se']->value == 1 || $_smarty_tpl->tpl_vars['se']->value == 4) {?> <div class="card mb-2 h-100 mr-2 pr-2" style="overflow:auto; min-width: 20vw;!important;"></div>
                                        <div class="card mb-2 h-100 mr-2 pr-2" style="overflow:auto; min-width: 20vw;!important;"></div><?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['se']->value == 2) {?> <div class="card mb-2 h-100 mr-2 pr-2" style="overflow:auto; min-width: 20vw;!important;"></div><?php }?>

                                </div>


                            </div>




                        </div>

                    </div>
                <?php }
}
?>

                <!--/.First slide-->

                <!--Second slide-->

                <!--/.Third slide-->

            </div>
            <!--/.Slides-->

        </div>



        <!--Carousel watch end-->
        <div class="rect mt-5 ">


            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['seguiti']->value, 'a');
$_smarty_tpl->tpl_vars['a']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['a']->value) {
$_smarty_tpl->tpl_vars['a']->do_else = false;
?>

          <a class="followed"   methods="post" href="/Progetto/Utente/unfollow?user=<?php echo $_smarty_tpl->tpl_vars['a']->value;?>
"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" class="bi bi-person-dash" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10zM11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
              </svg></a>
                <a class="followed " style="color:white;"><?php echo $_smarty_tpl->tpl_vars['a']->value;?>
</a>
            <br>

            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


            </div>


<?php if ((isset($_smarty_tpl->tpl_vars['id']->value))) {?>
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Seleziona la watchlist</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class action="/Progetto/Watchlist/aggiungiserie">
                            <?php $_smarty_tpl->_assignInScope('v', 1);?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['watchlist']->value, 'g');
$_smarty_tpl->tpl_vars['g']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['g']->value) {
$_smarty_tpl->tpl_vars['g']->do_else = false;
?>

                                <div class="form-check">

                                    <input class="form-check-input" type="radio" name="genere" id="<?php echo $_smarty_tpl->tpl_vars['g']->value->getNome();?>
" value="<?php echo $_smarty_tpl->tpl_vars['g']->value->getId();?>
" onclick="activeadd()" >
                                    <label class="form-check-label" for="<?php echo $_smarty_tpl->tpl_vars['g']->value->getNome();?>
">

                                        <?php echo $_smarty_tpl->tpl_vars['g']->value->getNome();?>


                                    </label>
                                    <?php $_smarty_tpl->_assignInScope('v', $_smarty_tpl->tpl_vars['v']->value+1);?>
                                </div>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                            <button id="addbutton" type="submit" class="btn btn-primary" style="background-color: #555B5F !important;" disabled>Aggiungi</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
<?php }?>
</div>




<?php echo '<script'; ?>
>

    document.getElementById("dropdown-content").style.width = father.style.getPropertyValue("width").toString();
<?php echo '</script'; ?>
>
</body>
</html>

<?php }
}
