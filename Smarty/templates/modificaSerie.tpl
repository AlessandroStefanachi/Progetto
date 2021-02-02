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
    <link rel="stylesheet" type="text/css" href="/Progetto/Smarty/css/serie.css">

    <script src="/Progetto/Smarty/js/modificaSerie.js"></script>

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
        <div class="jumbotron serie" style="max-height: 70vw">
            <div class="d-flex flex-row justify-content-center pt-5" style="width: 100%">
                <form class="form-inline" method="post" action="/Progetto/Admin/modifica?id={$serie->getId()}">
                    <div class="form-group-inline">
                        <input type="username" class="form-control" name="titolo" id="titolo" aria-describedby="nome" placeholder="Nome Watchlist" value="{$serie->getTitolo()}" oninput="modtitolo()" onautocomplete="modtitolo()">

                    </div>
                    <input class="btn btn-sm"type="submit" id="titolobutton" value="modifica titolo" disabled>
                </form>
            </div>


            <div class="d-flex flex-row justify-content-center pt-5" style="width: 100%">
                <form class="form-inline" method="post" action="/Progetto/Admin/modifica?id={$serie->getId()}">
                    <div class="form-group-inline">
                        <input type="username" class="form-control" name="regista" id="regista" aria-describedby="nome" placeholder="Nome Watchlist" oninput="modregista()" value="{$serie->getRegista()}">

                    </div>
                    <input class="btn btn-sm"type="submit" id="registabutton" value="modifica regista" disabled>
                </form>
            </div>


            <div class="d-flex flex-row justify-content-center pt-5" style="width: 100%">
                <form class="form-inline" method="post" action="/Progetto/Admin/modifica?id={$serie->getId()}">
                    <div class="form-group-inline">
                                        <textarea class="form-control" name="trama" id="trama" oninput="modtrama()">{$serie->getTrama()}</textarea>

                    </div>
                    <input class="btn btn-sm"type="submit" id="tramabutton" value="modifica trama" disabled>
                </form>
            </div>

            <div class="d-flex flex-row pt-5" style="width: 100% ">
                <img class="card-img-top mx-auto " style="width:15vw;height: 9vw; !important" {if isset($serie) }src="data:{$serie->getCopertina()->getType()};base64,{$copertina}"{/if} alt="Card image cap">

            </div>

            <div class="d-flex flex-row pt-5" style="width: 100% ">
                <form enctype="multipart/form-data"
                      action="/Progetto/Admin/modifica?id={$serie->getId()}"
                      method="post">
                    <div class="form-group">
                        <input  name="file" type="file" size="40" id="file" oninput="modfile()">

                    </div>
                    <input class="btn btn-sm"type="submit" id="filebutton" value="modifica copertina" disabled>
                </form>
            </div>
            <div class="d-flex flex-row pt-5" style="width: 100% ">
                <form method="post" action="/Progetto/Admin/modifica?id={$serie->getId()}">
                    <div class="form-group"  >
                        {foreach from=$serie->getGenere() item=$a}
                            <div class="form-check">
                                <input class="form-check-input" name="rimuoviGenere[]" type="checkbox" value="{$a}" id='{$a}'>
                                <label class="form-check-label" for='{$a}''>
                                {$a}
                                </label>
                            </div>
                        {/foreach}
                    </div>
                    <input class="btn btn-sm"type="submit" id="eliminaGeneriButton" value="elimina generi" disabled>
                </form>
            </div>

            <div class="d-flex flex-row pt-5" style="width: 100% ">
                <form method="post" action="/Progetto/Admin/modifica?id={$serie->getId()}">
                    <div class="form-group" >
                        {foreach from=$generi item=$a}
                            <div class="form-check">
                                {if !in_array($a['genere'],$serie->getGenere())}
                                <input class="form-check-input" name="aggiungiGenere[]" type="checkbox" value="{$a['genere']}" id='{$a['genere']}'>
                                <label class="form-check-label" for='{$a['genere']}''>
                                {$a['genere']}
                                </label>
                                {/if}
                            </div>
                        {/foreach}
                    </div>
                    <input class="btn btn-sm"type="submit" id="aggiungiGeneriButton" value="aggiungi generi" disabled>
                </form>
            </div>
            <div class="d-flex flex-row pt-5" style="width: 100% ">
                <div> <div class="ml-auto"></div> <span class="">Stagioni</span><btn class="btn btn-sm down " id="Alldown" onclick="seasondown()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                            <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                        </svg>
                    </btn>
                    <btn class="btn btn-sm up" id="Allup" onclick="seasonup()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                            <path d="M7.247 4.86l-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                        </svg>

                    </btn>


                </div><a class="ml-auto" href="" data-toggle="modal" data-target="#stagionemodal">aggiungi</a>
        </div>
                <div id="season-box" style="display: none">




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
                        <form action="/Progetto/Admin/modificaStagione?id={$a->getId()}" method="post">
                        <input type="date" class="form-control" name="data" id="data" value="{$a->getData()}" oninput="moddata()" onmouseover="moddata()">
                            <input class="btn btn-sm"type="submit" id="databutton" value="modifica data" disabled>
                        </form>
                        <a class="btn btn-sm" href="/Progetto/Admin/eliminaStagione?id={$a->getId()}">elimina stagione</a>
                        <a class="btn btn-sm"  data-toggle="modal" data-target="#episodioModal" onclick="setaction('{$a->getId()}')">aggiungi episodio</a>
                        <form action="/Progetto/Admin/modificaStagione?id={$a->getId()}" method="post">
                            <div class="form-group"  style="max-height: 5vw; overflow: auto">
                                {foreach from=$a->getLingue() item=$l}
                                    <div class="form-check">
                                        <input class="form-check-input" name="rimuoviLingua[]" type="checkbox" value="{$l}" id='{$l}{$a->getId()}'>
                                        <label class="form-check-label" for='{$l}{$a->getId()}'>
                                        {$l}
                                        </label>
                                    </div>
                                {/foreach}
                            </div>
                            <input class="btn btn-sm"type="submit" id="eliminaLinguabutton" value="elimina lingua" disabled>
                        </form>

                        <form action="/Progetto/Admin/modificaStagione?id={$a->getId()}" method="post">
                            <div class="form-group" >
                                {foreach from=$lingue item=$l}
                                    <div class="form-check">
                                        {if !in_array($l['lingua'],$a->getLingue())}
                                            <input class="form-check-input" name="aggiungiLingua[]" type="checkbox" value="{$l['lingua']}" id='{$l['lingua']}'>
                                            <label class="form-check-label" for='{$l['lingua']}''>
                                            {$l['lingua']}
                                            </label>
                                        {/if}
                                    </div>
                                {/foreach}
                            </div>
                            <input class="btn btn-sm"type="submit" id="aggiungiLinguabutton" value="aggiungi lingua" disabled>
                        </form>
                        <br>
                        <div class="season" id="season{$a->getNumero()}">
                            <ul>
                                {foreach from=$a->getEpisodi() item=$i}
                                    <li>
                                        <div class="d-flex flex-row pb-1 pt-1" >
                                            <form class="form-inline" method="post" action="/Progetto/Admin/modificaEpisodio?id={$i->getId()}">
                                                <div class="form-group-inline">
                                                    <input type="username" class="form-control" name="titolo" id="titolo episodio" aria-describedby="nome" placeholder="Nome Watchlist" oninput="modtitoloep()" value="{$i->getTitolo()}">

                                                </div>
                                                <input class="btn btn-sm"type="submit" id="titoloEpbutton" value="modifica titolo"disabled>
                                            </form>
                                            <form class="form-inline" method="post" action="/Progetto/Admin/modificaEpisodio?id={$i->getId()}">
                                                <input type="time" step="1" class="form-control" name="durata" id="durata" value="{$i->getDurata()}" oninput="moddurata()">
                                                <input class="btn btn-sm"type="submit" id="duratabutton" value="modifica durata"disabled >
                                            </form>

                                            <a  class="mr-auto pl-1 pr-1" href="/Progetto/Episodio/info?id={$i->getId()}" >

                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#555B5F" class="bi bi-binoculars" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M3 2.5A1.5 1.5 0 0 1 4.5 1h1A1.5 1.5 0 0 1 7 2.5V5h2V2.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5v2.382a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V14.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 14.5v-3a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5v3A1.5 1.5 0 0 1 5.5 16h-3A1.5 1.5 0 0 1 1 14.5V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V2.5zM4.5 2a.5.5 0 0 0-.5.5V3h2v-.5a.5.5 0 0 0-.5-.5h-1zM6 4H4v.882a1.5 1.5 0 0 1-.83 1.342l-.894.447A.5.5 0 0 0 2 7.118V13h4v-1.293l-.854-.853A.5.5 0 0 1 5 10.5v-1A1.5 1.5 0 0 1 6.5 8h3A1.5 1.5 0 0 1 11 9.5v1a.5.5 0 0 1-.146.354l-.854.853V13h4V7.118a.5.5 0 0 0-.276-.447l-.895-.447A1.5 1.5 0 0 1 12 4.882V4h-2v1.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V4zm4-1h2v-.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V3zm4 11h-4v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14zm-8 0H2v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14z"/>
                                                </svg>

                                            </a>
                                            <br>
                                            <a class="mr-auto pl-1 pr-1" href="/Progetto/Admin/eliminaEpisodio?={$i->getId()}">elimina</a>
                                        </div>
                                    </li>

                                {/foreach}


                            </ul>
                        </div>
                        <hr class="my-4">
                    {/foreach}





                </div>



            </div>


        </div>


    <div>
        <div class="modal fade" id="stagionemodal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Crea Stagione</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        <form method="post" action="/Progetto/Admin/aggiungiStagione?id={$serie->getId()}">



                            <div class="form-group">
                                <div class="form-group">
{$stg=$serie->getStagioni()}{$c=count($stg)-1}
                                    <input type="number" name="numero" class="form-control" id="numero"  placeholder="numero" oninput="modseason()" min="1" >

                                </div>

                                <div class="form-group">

                                    <input type="date" name="createdata" id="createdata"value="{date('Y-m-d')}"oninput="modseason()">

                                </div>

                                <div class="form-group">

                                    {foreach from=$lingue item=$l}
                                        <div class="form-check">

                                                <input class="form-check-input" name="aggiungiLingua[]" type="checkbox" value="{$l['lingua']}" id='{$l['lingua']}s'>
                                                <label class="form-check-label" for='{$l['lingua']}s''>
                                                {$l['lingua']}
                                                </label>

                                        </div>
                                    {/foreach}

                                </div>

                                <div> <button type="submit" class="btn btn-primary btn-dark" id="creaStagione" disabled>crea</button> </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>
    </div>


    <div>
        <div class="modal fade" id="episodioModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Crea episodio</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        <form method="post" action="/Progetto/Admin/aggiungiEpisodio?id=" id="episodioform">



                            <div class="form-group">
                                <div class="form-group">

                                    <input type="username" name="titolo" class="form-control" id="titoloep"  placeholder="titolo" oninput="modep()">

                                </div>

                                <div class="form-group">

                                    <input type="time" step="1" name="durata" id="creadurata"  oninput="modep()">


                                </div>

                                <div> <button type="submit" class="btn btn-primary btn-dark" id="episodiobutton" disabled>Crea</button> </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>
    </div>



    </div>
</div>
<script>$('#stagionemodal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        document.getElementById('creaStagione').disabled=true;

    })</script>
<script>$('#episodioModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        document.getElementById('episodiobutton').disabled=true;

    })</script>
</body>
</html>