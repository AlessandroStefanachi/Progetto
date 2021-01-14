{assign var='errore' value=$errore|default:false}
{assign var='errorelog' value=$errorelog|default:false}
{assign var='errorelog' value=$errorelog|default:false}
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

    <script src="/Progetto/Smarty/js/registrazione.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/Progetto/Smarty/css/homepagedef.css">
    <title>TvTracker</title>
    <script>
        function ready(){
            if (!navigator.cookieEnabled) {
                alert('Attenzione! per un corretto funzionamento del sito abilita i cookie e ricarica la pagina');
            }
        }
        document.addEventListener("DOMContentLoaded", ready);
    </script>

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
{if $errore == true}
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>REGISTRAZIONE FALLITA</strong> username o email già usati riprova
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
{/if}

{if $errorelog == true}
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>LOGIN FALLITO</strong> username o password errati
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
{/if}
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
                                <div class="col-md-4" >
                                    <div class="card mb-2 h-100" style="min-width: 17vw; max-width: 17vw!important;">
                                        <img class="card-img-top " style="width: 17vw;height: 15vw;object-fit: fill;" {if isset($serie[0]) }src="data:{$serie[0]->getCopertina()->getType()};base64,{$s[0]}"{/if} alt="Card image cap">
                                        <div class="card-body ">
                                            <h4 class="card-title">{if isset($serie[0]) }{$serie[0]->getTitolo()}{/if}</h4>
                                            <p class="card-text">{if isset($serie[0]) }{$serie[0]->getTrama()}{/if}</p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 clearfix d-none d-md-block">
                                    <div class="card mb-2 h-100" style="min-width: 17vw; max-width: 17vw!important;">
                                        <img class="card-img-top" style="width: 17vw;height: 15vw;object-fit: fill;"  {if isset($serie[1]) }src="data:{$serie[1]->getCopertina()->getType()};base64,{$s[1]}"{/if} alt="Card image cap">
                                        <div class="card-body ">
                                            <h4 class="card-title">{if isset($serie[1]) }{$serie[1]->getTitolo()}{/if}</h4>
                                            <p class="card-text">{if isset($serie[1]) }{$serie[1]->getTrama()}{/if}</p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 clearfix d-none d-md-block">
                                    <div class="card mb-2 h-100" style="min-width: 17vw; max-width: 17vw!important;">
                                        <img class="card-img-top" style="width: 17vw;height: 15vw;object-fit: fill;"  {if isset($serie[2]) }src="data:{$serie[2]->getCopertina()->getType()};base64,{$s[2]}" {/if}alt="Card image cap">
                                        <div class="card-body ">
                                            <h4 class="card-title">{if isset($serie[2]) }{$serie[2]->getTitolo()}{/if}</h4>
                                            <span class="card-text">{if isset($serie[2]) }{$serie[2]->getTrama()}{/if}</span>

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
                                    <div class="card mb-2 h-100" style="min-width: 17vw; max-width: 17vw!important;">
                                        <img class="card-img-top" style="width: 100%;height: 15vw;object-fit: fill;"  {if isset($serie[3]) }src="data:{$serie[3]->getCopertina()->getType()};base64,{$s[3]}" {/if}alt="Card image cap">
                                        <div class="card-body ">
                                            <h4 class="card-title">{if isset($serie[3]) }{$serie[3]->getTitolo()}{/if}</h4>
                                            <p class="card-text">{if isset($serie[3]) }{$serie[3]->getTrama()}{/if}</p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 clearfix d-none d-md-block">
                                    <div class="card mb-2 h-100" style="min-width: 17vw; max-width: 17vw!important;">
                                        <img class="card-img-top" style="width: 100%;height: 15vw;object-fit: fill;"  {if isset($serie[4]) }src="data:{$serie[4]->getCopertina()->getType()};base64,{$s[4]}" {/if}alt="Card image cap">
                                        <div class="card-body ">
                                            <h4 class="card-title">{if isset($serie[4]) }{$serie[4]->getTitolo()}{/if}</h4>
                                            <p class="card-text">{if isset($serie[4]) }{$serie[4]->getTrama()}{/if}</p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 clearfix d-none d-md-block">
                                    <div class="card mb-2 h-100" style="min-width: 17vw; max-width: 17vw!important;">
                                        <img class="card-img-top" style="width: 100%;height: 15vw;object-fit: fill;"  {if isset($serie[5]) }src="data:{$serie[5]->getCopertina()->getType()};base64,{$s[5]}"{/if} alt="Card image cap">
                                        <div class="card-body ">
                                            <h4 class="card-title">{if isset($serie[5]) }{$serie[5]->getTitolo()}{/if}</h4>
                                            <p class="card-text">{if isset($serie[5]) }{$serie[5]->getTrama()}{/if}</p>

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
                                    <div class="card mb-2 h-100" style="min-width: 17vw; max-width: 17vw!important;">
                                        <img class="card-img-top" style="width: 100%;height: 15vw;object-fit: fill;"{if isset($serie[6]) }src="data:{$serie[6]->getCopertina()->getType()};base64,{$s[6]}" {/if}alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">{if isset($serie[6]) }{$serie[6]->getTitolo()}{/if}</h4>
                                            <p class="card-text">{if isset($serie[6]) }{$serie[6]->getTrama()}{/if}</p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 clearfix d-none d-md-block">
                                    <div class="card mb-2 h-100" style="min-width: 17vw; max-width: 17vw!important;">
                                        <img class="card-img-top" style="width: 100%;height: 15vw;object-fit: fill;"  {if isset($serie[7]) }src="data:{$serie[7]->getCopertina()->getType()};base64,{$s[7]}"  {/if}alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">{if isset($serie[7]) }{$serie[7]->getTitolo()}{/if}</h4>
                                            <p class="card-text">{if isset($serie[7]) }{$serie[7]->getTrama()}{/if}</p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 clearfix d-none d-md-block">
                                    <div class="card mb-2 h-100"  style="min-width: 17vw; max-width: 17vw!important;">
                                        <img class="card-img-top" style="width: 100%;height: 15vw;object-fit: fill;"   {if isset($serie[8]) }src="data:{$serie[8]->getCopertina()->getType()};base64,{$s[8]}"{/if} alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">{if isset($serie[8]) }{$serie[8]->getTitolo()}{/if}</h4>
                                            <p class="card-text">{if isset($serie[8]) }{$serie[8]->getTrama()}{/if}</p>

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

<script>$('#registrati').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        reset();
    })</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.5.14/js/mdb.min.js"></script>
<div class="hiddendiv common"></div>
<script type="text/javascript" src="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/js/plugins/mdb-plugins-gathered.min.js"></script>
<script type="text/javascript"></script>

</body>
</html>