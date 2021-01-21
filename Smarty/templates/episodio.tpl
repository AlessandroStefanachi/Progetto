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
    <link rel="stylesheet" type="text/css" href="/Progetto/Smarty/css/episodio.css">

    <script src="/Progetto/Smarty/js/episodio.js"></script>

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
    <div class="jumbotron episodio">
        <h1 class="display-4">{$episodio->getTitolo()}</h1>
        <span>
            Serie Tv:
        </span><span> {$serie}</span><br>
        <span>
            Stagione:
        </span><span> {$stagione}</span><br>
        <span>
            N°:
        </span> <span> {$pos+1}</span><br>
        <span>
            Durata:
        </span><span> {$episodio->getDurata()}</span><br>

        <hr class="my-4">
        <div class="vote">
            <span class="fa fa-star" id="uncheck1" {if in_array($episodio->getId(),$visti)}onclick="checked(1)"{/if}></span>
            <span class="fa fa-star checked" id="check1" {if in_array($episodio->getId(),$visti)}onclick="unchecked(1)"{/if}></span>
            <span class="fa fa-star" id="uncheck2" {if in_array($episodio->getId(),$visti)}onclick="checked(2)"{/if}></span>
            <span class="fa fa-star checked" id="check2" {if in_array($episodio->getId(),$visti)}onclick="unchecked(2)"{/if}></span>
            <span class="fa fa-star" id="uncheck3" {if in_array($episodio->getId(),$visti)}onclick="checked(3)"{/if}></span>
            <span class="fa fa-star checked" id="check3" {if in_array($episodio->getId(),$visti)}onclick="unchecked(3)"{/if}></span>
            <span class="fa fa-star" id="uncheck4" {if in_array($episodio->getId(),$visti)}onclick="checked(4)"{/if}></span>
            <span class="fa fa-star checked" id="check4" {if in_array($episodio->getId(),$visti)}onclick="unchecked(4)"{/if}></span>
            <span class="fa fa-star" id="uncheck5" {if in_array($episodio->getId(),$visti)}onclick="checked(5)"{/if}></span>
            <span class="fa fa-star checked" id="check5" {if in_array($episodio->getId(),$visti)}onclick="unchecked(5)"{/if}></span>


        </div>
        <br>
        <button href="/Progetto/Episodio/vote?voto=" class="btn btn-sm votebt" id="btn0" disabled>valuta</button>
        <a href="/Progetto/Episodio/vote?voto=1" class="btn btn-sm votebt" id="btn1">valuta</a>
        <a href="/Progetto/Episodio/vote?voto=2" class="btn btn-sm votebt" id="btn2">valuta</a>
        <a href="/Progetto/Episodio/vote?voto=3" class="btn btn-sm votebt" id="btn3">valuta</a>
        <a href="/Progetto/Episodio/vote?voto=4" class="btn btn-sm votebt" id="btn4">valuta</a>
        <a href="/Progetto/Episodio/vote?voto=5" class="btn btn-sm votebt" id="btn5">valuta</a>
        <hr class="my-4">
        <span>Commenti </span>

        <button type="button" class="btn  btn-sm down" id="down" style="background-color: #FFCF17;!important;" onclick="show()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
            </svg>

        </button>

        <button type="button" class="btn  btn-sm up " id="up" style="background-color: #FFCF17;!important;" onclick="hide()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                <path d="M7.247 4.86l-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
            </svg>

        </button>

        <br>
        <div id="BoxCommenti" style="max-height: 30vh; overflow: auto">
            {foreach from=$commenti item=$a}
            <div class="d-flex flex-row pt-5" style="width: 100%">
            <a href="/Progetto/Utente/user?id={$a->getAutore()}" class="mr-auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>


                {$a->getAutore()}</a>

            <span class="mx-auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-alarm-fill" viewBox="0 0 16 16">
  <path d="M6 .5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H9v1.07a7.001 7.001 0 0 1 3.274 12.474l.601.602a.5.5 0 0 1-.707.708l-.746-.746A6.97 6.97 0 0 1 8 16a6.97 6.97 0 0 1-3.422-.892l-.746.746a.5.5 0 0 1-.707-.708l.602-.602A7.001 7.001 0 0 1 7 2.07V1h-.5A.5.5 0 0 1 6 .5zm2.5 5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5zM.86 5.387A2.5 2.5 0 1 1 4.387 1.86 8.035 8.035 0 0 0 .86 5.387zM11.613 1.86a2.5 2.5 0 1 1 3.527 3.527 8.035 8.035 0 0 0-3.527-3.527z"/>
</svg>

                {$a->getOra()}</span>
            <span class="ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-calendar2-date-fill" viewBox="0 0 16 16">
  <path d="M9.402 10.246c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2z"/>
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zm-4.118 9.79c1.258 0 2-1.067 2-2.872 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684c.047.64.594 1.406 1.703 1.406zm-2.89-5.435h-.633A12.6 12.6 0 0 0 4.5 8.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675V7.354z"/>
</svg>

                {$a->getData()}</span>

            </div>
            <br>
            <div id="text" style="max-height: 10vh; overflow: auto">
            <span id="testo{$a->getId()}">{$a->getTesto()}</span>
            </div>
                {if $a->getAutore()==$utente->getUsername()}
            <div class="d-flex flex-row pt-2" style="width: 100%">
                <a class="mr-auto" onclick="edit('{$a->getId()}')">modifica</a>
                <a class="ml-auto" href="/Progetto/Episodio/eliminaCommento?id={$a->getId()}">elimina</a>
            </div>
                {/if}
            {/foreach}
        </div>
        <hr class="my-4">
        <div id="commentform">
        <form action="/Progetto/Episodio/commento?id={$episodio->getId()}" method="post">
            <div >
<textarea name="comments" id="comments" oninput="comment()" {if !in_array($episodio->getId(),$visti)}disabled{/if}>
aggiungi commento</textarea>
            </div>
            <input class="btn"type="submit" id="CommentButton" value="Submit" {if !in_array($episodio->getId(),$visti)}disabled{/if}>
        </form>
        </div>

        <div id="editform">
            <form action="/Progetto/Episodio/commento?id={$episodio->getId()}" method="post" id="editaction">
                <div >
<textarea name="editarea" id="editarea" oninput="editcheck()">
aggiungi commento</textarea>
                </div>
                <input class="btn"type="submit" id="EditButton" value="edit" >
            </form>
        </div>


    </div>
</div>
</div>
</body>
</html>