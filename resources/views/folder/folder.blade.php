<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" type="text/css" href="{{URL('storage/styles/style-home.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{URL('storage/styles/style-add-credit.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{URL('storage/styles/style-laoder.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{URL('storage/styles/style-show-data.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{URL('storage/styles/style-folder.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{URL('storage/styles/style-comment.css')}}"> 
    <title>Dossier de {{$credit->custumerName}}</title>
</head>
<body>
    <div class="loader">
        <div class="loading">Chargement.....</div>
    </div>
    <div class="loader-waiting">
        <div class="loading-waiting">Chargement.....</div>
    </div>
    @auth
    <form action="{{route('logout')}}" method="post" class="form-logout">
        @csrf
        <button type="submit">Déconnexion</button>
    </form>
    <div class="contain-message-error">
        <div class="sub-message-error-contain">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <p id="error-message-contain-spent-item" draggable="true" class="error-message"></p>
            <span class="hidde-error-message">OK</span>
        </div>
    </div>
    @if (Auth::user()->authorization == 1)
        @if (Auth::user()->validator == 1)
            @if (Auth::user()->token_branch == $credit->token_branch)
                <x-folders :credit=$credit/>
            @else
                <div class="container-guest">
                    <div class="contain">
                        <div class="title-guest">
                            <h1>Ooups ERREUR</h1>
                            <h2>Vous ne pouvez pas consulter ce dossier</h2>
                        </div>
                    </div>
                </div> 
            @endif 
        @endif
        @if(Auth::user()->validator == 2)
                <x-folders :credit=$credit/>
        @endif   
    @endif
    @if (Auth::user()->authorization == 0)
    <div class="container-guest">
        <div class="contain">
            <div class="title-guest">
                <h1>Bienvenue sur Gestion de Crédit</h1>
                <h2>Vous n'avez pas les autorisations réquises, veuillez contacter l'administrateur</h2>
            </div>
        </div>
    </div>    
    @endif 
    @endauth
    @guest
    <div class="container-guest">
        <div class="contain">
            <div class="title-guest">
                <h1>Bienvenue sur Gestion de Crédit</h1>
                <h2>Vous devez créer un compte ou vous connecter si vous en avez déjà</h2>
            </div>
            <div class="btn-connexion">
                <button>
                    <a href="{{route('register')}}">Créer un compte</a>
                </button>
                <button>
                    <a href="{{route('login')}}">Se connecter</a>
                </button>
            </div>
        </div>
    </div>  
    @endguest
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="{{URL('storage/scripts/script.js')}}"></script>
    <script src="{{URL('storage/scripts/script-coment.js')}}"></script>
</body>
</html>