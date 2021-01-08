<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="/Progetto/Smarty/js/profile_edit.js"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.5.14/css/mdb.min.css">
    <link rel="stylesheet" type="text/css" href="/Progetto/Smarty/css/ownprofile.css">
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
           {if !$self[0]}
            <li class="nav-item" id="poppr">

                <a class="navbar-brand"  href="/Progetto/Utente/user?id={$self[1]}">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                    </div>
                </a>
                <span id="pr-appear">Profilo</span>
            </li>
            {/if}
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


{if isset($pwedit)}
    {if $pwedit==true}
        <div class="alert alert-success alert-dismissible fade show" role="alert">
           Password modificata correttamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    {/if}
{if $pwedit==false}
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Modifica password fallita, verifica di aver inserito correttamente la vecchia password.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
{/if}
{/if}

{if isset($emailedit)}
    {if $emailedit==true}
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Email modificata correttamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    {/if}
    {if $emailedit==false}
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Modifica email fallita, verifica di aver inserito correttamente la  password, altrimenti è possibile che l'email che stai cercando di inserire sia già usata.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    {/if}
{/if}

{if isset($usernameedit)}
    {if $usernameedit==true}
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Username modificato correttamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    {/if}
    {if $usernameedit==false}
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Modifica username fallita, verifica di aver inserito correttamente la  password, altrimenti è possibile che l'username che stai cercando di inserire sia già usato.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    {/if}
{/if}

<div class="d-flex " style="display: flex ; flex-wrap: wrap; width: 100%;flex-grow: 1;">
    <div class="d-flex flex-row justify-content-center pt-5" style="width: 100%">
        <div class="jumbotron " id="profile">
            <h1 class="display-4">Profilo privato
                {if !$self[0]}
                <a methods="post" href="/Progetto/Utente/unfollow?user={$utente->getUsername()}"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="sameColor" class="bi bi-person-dash" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10zM11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                    </svg></a>

                    <a methods="post" href="/Progetto/Utente/follow?user={$utente->getUsername()}">

                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="sameColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>

                    </a>

                {/if}
            </h1>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>
                Username</span>
            <br>
            <div class="d-flex flex-row" style="width: 100%">
            <span class="pr-5">{$utente->getUsername()}</span> {if $self[0]==true}<a class=" pl-5 ml-auto" href="" data-toggle="modal" data-target="#usern" >modifica</a>{/if}
            </div>
            <hr class="my-2">
            {if $self[0]==true}
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
</svg>
                Email</span>
            <br>

            <div class="d-flex flex-row" style="width: 100%">
                <span class="pr-5">{$utente->getEmail()}</span> <a class=" pl-5 ml-auto" href="" data-toggle="modal" data-target="#emailmodal">modifica</a>
            </div>
            <hr class="my-2">
            {/if}
            {if $self[0]==true}
            <span>
 <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
  <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg>
                Password</span>
            <br>
            <div class="d-flex flex-row" style="width: 100%">
                <span class="pr-5">nome</span> <a class=" pl-5 ml-auto" href="" data-toggle="modal" data-target="#pw">modifica</a>
            </div>
            <hr class="my-2">
            {/if}

            <div id="sg-appear">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
  <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
</svg>
                Seguiti
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
</svg>

            </span>
            <br>
            <div id="sgbox">
               <ul>
                   <!--PER CORRETTEZZA SI POTREBBERO DISABILITARE LE OPZIONI PER UTENTI GIÀ SEGUITI/NON SEGUITI-->
                   {if !isset($seguiti)}{$seguiti=$utente->getSeguiti()} {/if}
                   {foreach from=$seguiti item=$a }
                   <li>
                       {if $self[0]==true}
                       <a methods="post" href="/Progetto/Utente/unfollow?user={$a}"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="sameColor" class="bi bi-person-dash" viewBox="0 0 16 16">
                               <path fill-rule="evenodd" d="M8 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10zM11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                           </svg></a>
                       {/if}
                       <a class="pl-2" href="/Progetto/Utente/user?id={$a}">{$a}</a>
                   </li>
                   {/foreach}
               </ul>
            </div>
            </div>
            <hr class="my-2">
            <div id="se-appear"
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
  <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
</svg>
                Seguaci

                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
</svg>
            </span>
            <br>
            <div id="sebox">
                <ul>
                    <li>
                        {foreach from=$utente->getSeguaci() item=$a }
                        <a href="/Progetto/Utente/user?id={$a}"> {$a}</a>
                    </li>
                    {/foreach}
                </ul>
            </div>
            </div>
            <hr class="my-2">
        <div id="watch-appear">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                            <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg>
                Watchlist

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
</svg>
            </span>
            <br>
        <div id="wcbox">
            <ul>
                <li>
                    {foreach from=$utente->getWatchlist() item=$a }
                    <a> {$a->getNome()}</a>
                </li>
                {/foreach}
            </ul>
        </div>
        </div>
            <hr class="my-2">


        </div>
<!--user--->
    <div class="modal fade" id="usern" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Modifica Username</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form method="post" action="/Progetto/Utente/modificaUsername">

                        <div class="form-group">

                            <input type="text" class="form-control" name="username" id="nickname"  placeholder="nuovo username" oninput="checkUser()">

                        </div>
                        <div class="alert alert-danger" role="alert" style="display:none;" id="username alert">
                            Questo campo è obbligatorio e il non puoi usare più di 16 caratteri
                        </div>


                            <div class="form-group">

                                <input type="password" name="password" class="form-control" id="UsernamePassword"placeholder="Password" oninput="checkUser()">

                            </div>

                            <div> <button type="submit" class="btn btn-primary btn-dark" id="UsernameButton" disabled>Modifica</button> </div>
                    </form>
                </div>

            </div>

        </div>

    </div>
    <!--user--->



    </div>

<div>
<div class="modal fade" id="pw" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Modifica Password</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form method="post" action="/Progetto/Utente/modificaPassword">




                        <div class="form-group">

                            <input type="password" name="PwPassword" class="form-control" id="PwPassword"placeholder="Password" oninput="checkPW()">

                        </div>
                        <div class="form-group">

                            <input type="password" name="NewPassword" class="form-control" id="NewPassword"placeholder="nuova Password" oninput="checkPW()">

                        </div>
                        <div class="alert alert-danger" role="alert" style="display:none;" id="pass alert">
                            la password deve contenere un numero, una maiuscola e un carattere speciale
                        </div>
                        <div class="alert alert-success" role="alert"style="display:none" id="pass ok">
                            password valida
                        </div>
                        <div> <button type="submit" class="btn btn-primary btn-dark" id="PwButton" disabled>Modifica</button> </div>
                </form>
            </div>

        </div>

    </div>

</div>
</div>
<!----User modal----->

<div>
<div class="modal fade" id="emailmodal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Modifica Email</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <form method="post" action="/Progetto/Utente/modificaEmail">



                    <div class="form-group">
                        <div class="form-group">

                            <input type="username" name="email" class="form-control" id="email"  placeholder="nuova email" oninput="checkEmail()">

                        </div>
                        <div class="alert alert-danger" role="alert" style="display:none;" id="email alert">
                            email non valida
                        </div>
                        <div class="alert alert-success" role="alert" style="display:none" id="email ok">
                            email valida
                        </div>
                        <div class="form-group">

                            <input type="password" name="password" class="form-control" id="EmailPassword"placeholder="Password" oninput="checkEmail()">

                        </div>

                        <div> <button type="submit" class="btn btn-primary btn-dark" id="EmailButton" disabled>Modifica</button> </div>
                </form>
            </div>

        </div>

    </div>

</div>
</div>
<!--end-->
<script>$('#usern').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        resetuser();
    })</script>
<script>$('#pw').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        resetpw();
    })</script>
<script>$('#emailmodal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        resetmail();
    })</script>

</body>
</html>