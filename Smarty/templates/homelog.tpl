<!DOCTYPE html>
<html>

<head>



    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">





    <script src="/Progetto/Smarty/js/switch.js"></script>
    <script src="/Progetto/Smarty/js/button.js"></script>






    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.5.14/css/mdb.min.css">

    <link rel="stylesheet" type="text/css" href="/Progetto/Smarty/css/hov2.css">

    <script>
        $(document).ready(function(){
            $("#staticBackdrop").modal('show');
        });
    </script>




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
                        {$v=1}
                        {foreach from=$genere item=$g }

                        <div class="form-check">

                            <input class="form-check-input" type="radio" name="genere" id="{$g}" value="{$g}" onclick="activatefilter()">
                            <label class="form-check-label" for="{$g}">

                                {$g}

                            </label>
                            {$v=$v+1}
                        </div>
                       {/foreach}

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

                <a class="navbar-brand"  href="/Progetto/Utente/user?id={$username}">
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
            <input class="form-control mr-sm-2" type="search" placeholder="Cerca serie tv" aria-label="Nome serie tv" id="scbar" style="width: 40vw" name="q">

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
                {$se=0}
                {if !isset($serie)||count($serie)/6<=1}
                    {$cicli=1}
                    {else }{$cicli=count($serie)/6}
                {/if}
                {for $ciclo=1 to $cicli}
                <div class="carousel-item {if $ciclo==1}active{/if} ">

                    <div class="row justify-content-center">

                            <div class="jumbotron series" style="display: block; overflow: auto;background-color: #919598;min-height: 70vh;min-width: 70vw;max-width: 90vw;!important;">
                                {if isset($filtro)&&$filtro!='empty'}<h1 class="text-center" style="color: #555B5F">{$filtro}

                                    <a class="icon" style="color: #555B5F" href="/Progetto/Utente/homepagedef"> <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                                            </svg></div></a>
                                    </h1>{/if}
                                {for $r=0 to 1}
                             <div class="row pt-2">


                                 {for $c=0 to 2}
                                 {if $se < count($serie)}
                                 <div class="col-4">
                                     <div class="card mb-2 h-100 mr-2" style=" display:block;overflow:auto; min-width: 20vw; max-width: 20vw!important;">
                                         <div class="imgdiv"style="display: block;">
                                             <img class="card-img-top " style="width:20vw;height: 15vw;object-fit: fill; !important" {if isset($serie[$se]) }src="data:{$serie[$se]->getCopertina()->getType()};base64,{$cop[$se]}"{/if} alt="Card image cap"></div>
                                         <div class="card-body ">
                                             {if isset($serie[$se])}<h4 class="card-title"> {$serie[$se]->getTitolo()} </h4>{/if}
                                            {if isset($serie[$se]) }
                                             {$star=$serie[$se]->getValutazione()}

                                             <span class="fa fa-star{if $star>0} checked {$star=$star-1}{/if} "></span>
                                             <span class="fa fa-star {if $star>0} checked {$star=$star-1}{/if}"></span>
                                             <span class="fa fa-star {if $star>0} checked {$star=$star-1}{/if}"></span>
                                             <span class="fa fa-star {if $star>0} checked {$star=$star-1}{/if}"></span>
                                             <span class="fa fa-star {if $star>0} checked {$star=$star-1}{/if}"></span>
                                             {/if}

                                             <br>
                                             <a  class="pt-2" href="/Progetto/Utente/shortadding?id={$serie[$se]->getId()}" >

                                                     <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#555B5F" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                         <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                         <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                                     </svg>

                                             </a>

                                             <a  class="pt-2" href="/Progetto/SerieTv/info?id={$serie[$se]->getId()}" >

                                                 <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#555B5F" class="bi bi-binoculars" viewBox="0 0 16 16">
                                                     <path fill-rule="evenodd" d="M3 2.5A1.5 1.5 0 0 1 4.5 1h1A1.5 1.5 0 0 1 7 2.5V5h2V2.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5v2.382a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V14.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 14.5v-3a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5v3A1.5 1.5 0 0 1 5.5 16h-3A1.5 1.5 0 0 1 1 14.5V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V2.5zM4.5 2a.5.5 0 0 0-.5.5V3h2v-.5a.5.5 0 0 0-.5-.5h-1zM6 4H4v.882a1.5 1.5 0 0 1-.83 1.342l-.894.447A.5.5 0 0 0 2 7.118V13h4v-1.293l-.854-.853A.5.5 0 0 1 5 10.5v-1A1.5 1.5 0 0 1 6.5 8h3A1.5 1.5 0 0 1 11 9.5v1a.5.5 0 0 1-.146.354l-.854.853V13h4V7.118a.5.5 0 0 0-.276-.447l-.895-.447A1.5 1.5 0 0 1 12 4.882V4h-2v1.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V4zm4-1h2v-.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V3zm4 11h-4v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14zm-8 0H2v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14z"/>
                                                 </svg>

                                             </a>
                                             {$se=$se+1}
                                         </div>
                                     </div>
                                 </div>
                                 {/if}
                                   {/for}
                                 {if $se==2||$se==5} <div class="card mb-2 h-100 mr-2 pr-2" style="overflow:auto; min-width: 20vw;!important;"></div>{/if}


                            </div>
                                {/for} <!--/row-->


                            </div>




                    </div>

                </div>
                {/for}

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
                {$se=0}
                {if !isset($watch)||count($watch)/3<=1}
                    {$cicli=1}
                {else }{$cicli=count($watch)/3}
                {/if}
                {for $ciclo=1 to $cicli}
                    <div class="carousel-item {if $ciclo==1}active{/if} ">

                        <div class="row justify-content-center">

                            <div class="jumbotron watch"  style="display: block; overflow: auto;background-color: #919598;min-height: 70vh;min-width: 70vw;max-width: 90vw;!important;">
                                <div class="row">
                                    {for $c=0 to 2}
                                    {if $se<count($watch)}
                                    <div class="col-4 ">
                                        <div class="card mb-2 h-100 mr-2 pr-2" style="overflow:auto; min-width: 20vw;max-width: 20vw;!important;">
                                            <img class="card-img-top " style="width:20vw;height: 15vw;object-fit: fill;" {if isset($Cwatch[$se]) }src="data:{$type[$se]};base64,{$Cwatch[$se]}"{/if} alt="Card image cap">
                                            <div class="card-body ">
                                                <h4 class="card-title">{$watch[$se]->getNome()}</h4>
                                                <a>{$watch[$se]->getProprietario()}</a>
                                                <br>
                                                <hr>
                                                <span>{$watch[$se]->getDescrizione()}</span>

                                                <hr>
                                                <br>
                                                <a  class="pt-2" {if !in_array($watch[$se]->getProprietario(),$seguiti)}href="/Progetto/Utente/follow?user={$watch[$se]->getProprietario()}" {/if} >

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
                                                {$se=$se+1}

                                            </div>
                                        </div>
                                    </div>

                                    {/if}{/for}
                                    {if $se==1||$se==4} <div class="card mb-2 h-100 mr-2 pr-2" style="overflow:auto; min-width: 20vw;!important;"></div>
                                        <div class="card mb-2 h-100 mr-2 pr-2" style="overflow:auto; min-width: 20vw;!important;"></div>{/if}
                                    {if $se==2} <div class="card mb-2 h-100 mr-2 pr-2" style="overflow:auto; min-width: 20vw;!important;"></div>{/if}

                                </div>


                            </div>




                        </div>

                    </div>
                {/for}

                <!--/.First slide-->

                <!--Second slide-->

                <!--/.Third slide-->

            </div>
            <!--/.Slides-->

        </div>



        <!--Carousel watch end-->
        <div class="rect mt-5 ">


            {foreach from=$seguiti item=$a }

          <a class="followed"   methods="post" href="/Progetto/Utente/unfollow?user={$a}"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" class="bi bi-person-dash" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10zM11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
              </svg></a>
                <a class="followed " style="color:white;">{$a}</a>
            <br>

            {/foreach}


            </div>


{if isset($id)}
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
                            {$v=1}
                            {foreach from=$watchlist item=$g }

                                <div class="form-check">

                                    <input class="form-check-input" type="radio" name="genere" id="{$g->getNome()}" value="{$g->getId()}" onclick="activeadd()" >
                                    <label class="form-check-label" for="{$g->getNome()}">

                                        {$g->getNome()}

                                    </label>
                                    {$v=$v+1}
                                </div>
                            {/foreach}

                            <button id="addbutton" type="submit" class="btn btn-primary" style="background-color: #555B5F !important;" disabled>Aggiungi</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
{/if}
</div>




<script>

    document.getElementById("dropdown-content").style.width = father.style.getPropertyValue("width").toString();
</script>
</body>
</html>

