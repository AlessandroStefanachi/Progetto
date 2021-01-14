<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.5.14/css/mdb.min.css">
    <link rel="stylesheet" type="text/css" href="/Progetto/Smarty/css/serieTv.css">


    <script src="/Progetto/Smarty/js/serietv.js"></script>
    <title>TvTracker</title>


    <script>
        $(document).ready(function(){
            $("#staticBackdrop").modal('show');
        });
    </script>

</head>

<body>
<div id="bg2"></div>

<nav class=" nav-fill w-100 navbar navbar-expand-lg navbar-dark  " style="background-color:#555B5F;" id="navbarprincipale">


    <div class="navbar-collapse order-3 dual-collapse2">
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <span class="navbar-brand" href="/Progetto/Utente/homepagedef">
                    <img src="/Progetto/Smarty/Immagini/giallo2.png" width="50" height="50" class="d-inline-block align-top" alt="icona" loading="lazy"></span>
            </li>
            <li class="nav-item pt-2">
                <a class="navbar-brand pt-4"style="color: #f9f9f9" href="/Progetto/Utente/homelog">Tv Tracker </a></li>
        </ul>
        <ul class="navbar-nav ml-auto" >

                <li class="nav-item" id="poppr">

                    <a class="navbar-brand"  href="/Progetto/Utente/user?id={$utente->getUsername()}">
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
    <div class="jumbotron serie" >
        <div class="d-flex flex-row" style="width: 100%">
        <h1 class="display-4 mx-auto" style="align-self: center">{$serie->getTitolo()}
            <a  class="" href="/Progetto/Utente/shortadding?id={$serie->getId()}" >

                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#555B5F" class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>

            </a>
        </h1>

        </div>


        <div class="d-flex flex-row" style="width: 100% ">
        <img class="card-img-top mx-auto " style="width:25vw;height: 20vw; !important" {if isset($serie) }src="data:{$serie->getCopertina()->getType()};base64,{$copertina}"{/if} alt="Card image cap">

        </div>

        <div class="d-flex flex-row" style="width: 100% ">
        {$star=$serie->getValutazione()}


        <div class="mx-auto">
        <span class="fa fa-star{if $star>0} checked {$star=$star-1}{/if} "></span>
        <span class="fa fa-star {if $star>0} checked {$star=$star-1}{/if}"></span>
        <span class="fa fa-star {if $star>0} checked {$star=$star-1}{/if}"></span>
        <span class="fa fa-star {if $star>0} checked {$star=$star-1}{/if}"></span>
        <span class="fa fa-star {if $star>0} checked {$star=$star-1}{/if}"></span>
        </div>
        </div>

        <div class="d-flex flex-row" style="min-width: auto;max-width: 25vw">

        <div class="pl-2 mx-auto" style="word-break: break-word">
            <span style="float:none" >{$serie->getTrama()}</span>

        </div>

        </div>
        <hr class="my-4">
        <div><span>Regista: {$serie->getRegista()}</span></div>
        <hr class="my-4">
        <div id="genere-appear">
            <span>genere
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
</svg>
            </span>
            <br>
            <div id="genere-box">
                <ul>
                    {foreach from=$serie->getGenere() item=$a}
                    <li>
                        <span>{$a}</span>
                    </li>
                    {/foreach}
                </ul>
            </div>
        </div>
        <hr class="my-4">


        {foreach from=$serie->getStagioni() item=$a}
            <span>Stagione {$a->getNumero()}</span>

            <button type="button" class="btn  btn-sm down" id="down{$a->getNumero()}" style="background-color: #FFCF17;!important;" onclick="show('{$a->getNumero()}')">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                    <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                </svg>

            </button>

            <button type="button" class="btn  btn-sm up " id="up{$a->getNumero()}" style="background-color: #FFCF17;!important;" onclick="hide('{$a->getNumero()}')">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                    <path d="M7.247 4.86l-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                </svg>

            </button>

            <br>
            <div class="season" id="season{$a->getNumero()}">
            <ul>
            {foreach from=$a->getEpisodi() item=$i}
                <li>
                    <div class="d-flex flex-row pb-1 pt-1" >
                    <span class="mr-auto">{$i->getTitolo()}</span>
                    <span class="mx-auto">{$i->getDurata()}</span>
                        <a  class="mr-auto" href="/Progetto/SerieTv/info?id=" >

                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#555B5F" class="bi bi-binoculars" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M3 2.5A1.5 1.5 0 0 1 4.5 1h1A1.5 1.5 0 0 1 7 2.5V5h2V2.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5v2.382a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V14.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 14.5v-3a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5v3A1.5 1.5 0 0 1 5.5 16h-3A1.5 1.5 0 0 1 1 14.5V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V2.5zM4.5 2a.5.5 0 0 0-.5.5V3h2v-.5a.5.5 0 0 0-.5-.5h-1zM6 4H4v.882a1.5 1.5 0 0 1-.83 1.342l-.894.447A.5.5 0 0 0 2 7.118V13h4v-1.293l-.854-.853A.5.5 0 0 1 5 10.5v-1A1.5 1.5 0 0 1 6.5 8h3A1.5 1.5 0 0 1 11 9.5v1a.5.5 0 0 1-.146.354l-.854.853V13h4V7.118a.5.5 0 0 0-.276-.447l-.895-.447A1.5 1.5 0 0 1 12 4.882V4h-2v1.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V4zm4-1h2v-.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V3zm4 11h-4v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14zm-8 0H2v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14z"/>
                            </svg>

                        </a>
                    </div>
                </li>

            {/foreach}

                <li><span>Lingue Disponibili: </span>
                {foreach from=$a->getLingue() item=$l}
                    <span>{$l}</span>

                {/foreach}
                </li>
            </ul>
            </div>
            <hr class="my-4">
        {/foreach}
</div>

        {if isset($watchlist)}
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


</body>
</html>