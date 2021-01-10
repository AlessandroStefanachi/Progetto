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
    <title>TvTracker</title>

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
    <div class="jumbotron serie" style="overflow-wrap: break-word;!important;">
        <div class="d-flex flex-row" style="width: 100%">
        <h1 class="display-4 mx-auto" style="align-self: center">{$serie->getTitolo()}</h1>
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
            <span>genere</span>
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
            <br>
            <hr class="my-4">
        {/foreach}
</div>


</div>


</body>
</html>