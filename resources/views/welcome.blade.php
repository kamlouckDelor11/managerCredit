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
    <title>Dashboard</title>
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
    <div class="container">
        <div class="row-1">
            <div class="card-user">
                <div class="img-card">
                    <img src="{{URL('storage/images/img-dashboard.jpg')}}" alt="">
                </div>
                <div class="text-card">
                    <h5>Bienvenue {{ucfirst(Auth::user()->civility).' '. ucfirst(Auth::user()->name).' '. ucfirst(Auth::user()->firstname)}}</h5>
                    <p class="p-country">Agence : {{ucfirst(Auth::user()->branch->branchname)}}</p>
                    <p class="p-phone">Fonction: {{ucfirst(Auth::user()->occupation->occupationName).' - '.'('.(Auth::user()->occupation->shortName).')'}}</p>
                </div>
                <div class="picture">
                    <div class="profile-picture">
                        <img src="{{URL('storage/images')}}/{{Auth::user()->path}}" alt="photo de profile">
                    </div>
                </div>
            </div>
            <div class="action">
                <div class="compagnies">
                    <div class="add_compagny">
                        <button id="add_credit" >
                            <i class="fa-regular fa-square-plus"></i>
                            <span class="add">Soumettre un dossier</span>
                        </button>
                    </div>
                </div>
                <div class="compagnies">
                    <div class="add_compagny">
                        <button id="print_data" >
                            <i class="fa-regular fa-square-plus"></i>
                            <span class="add">édition des dossiers</span>
                        </button>
                    </div>
                </div>
                <div class="compagnies">
                    <div class="add_compagny">
                        <button id="print_loan_data" >
                            <i class="fa-regular fa-square-plus"></i>
                            <span class="add">suivi des prêts</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- =====================================formulaire ajout nouveau dossier=============================================== --}}
    <div class="contain-add-credit">
        <div class="close-form close-contain-add-credit"><i class="fa-regular fa-circle-xmark"></i></div>
        <div class="contain-form-add-credit">
            <div class="form-add-credit">
                <form action="{{route('credit.store')}}" method="post" enctype="multipart/form-data" id="form-add-credit">
                    @csrf
                    <fieldset>
                        <legend>Infos client</legend>
                        <div class="row-add-credit">
                            <div class="group-name-add-credit culum">
                                <label for="custumer-name-add-credit">Nom</label>
                                <input type="text" name="custumerName" id="custumer-name-add-credit" placeholder="Nom du client">
                            </div>
                            <div class="group-activity-add-credit culum">
                                <label for="custumer-activity-add-credit">Activité</label>
                                <input type="text" name="custumerActivity" id="custumer-activity-add-credit" placeholder="Activité du client">
                            </div>
                        </div>
                        <div class="row-add-credit">
                            <div class="group-activity-add-credit culum">
                                <label for="custumer-home-add-credit">Domicile</label>
                                <input type="text" name="custumerHome" id="custumer-home-add-credit" placeholder="Domicile du client">
                            </div>
                            <div class="group-activity-add-credit culum">
                                <label for="custumer-activity-home-add-credit">Lieu activité</label>
                                <input type="text" name="custumerActivityHome" id="custumer-activity-home-add-credit" placeholder="Localisation activité">
                            </div>
                        </div>
                        <div class="row-add-credit">
                            <div class="group-name-add-credit culum">
                                <label for="custumer-sexe-add-credit">Sexe</label>
                                <select name="sexe" id="custumer-sexe-add-credit">
                                    <option></option>
                                    <option value="Homme">Homme</option>
                                    <option value="Femme">Femme</option>
                                </select>
                            </div>
                        </div>
                        <div class="row-add-credit">
                            <div class="group-nui-add-credit culum">
                                <label for="custumer-nui-add-credit">NUI</label>
                                <input type="text" name="nui" id="custumer-nui-add-credit" placeholder="Identifiant unique">
                            </div>
                            <div class="group-phone-add-credit culum">
                                <label for="custumer-phone-add-credit">Téléphone</label>
                                <input type="text" name="custumerPhone" id="custumer-phone-add-credit" placeholder="Téléphone client">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Infos crédit</legend>
                        <div class="row-add-credit">
                            <div class="group-amount-add-credit culum">
                                <label for="amount-add-credit">Montant</label>
                                <input type="text" name="amount" id="amount-add-credit" placeholder="Montant du crédit">
                            </div>
                            <div class="group-deadline-add-credit culum">
                                <label for="dealine-add-credit">Durée</label>
                                <input type="text" name="deadline" id="deadline-add-credit" placeholder="Durée du crédit">
                            </div>
                        </div>
                        <div class="row-add-credit">
                            <div class="nature-add-credit culum">
                                <label for="nature-add-credit" class="select">Nature</label>
                                <select name="type" id="nature-add-credit">
                                    <option></option>
                                    <option value="conso">Crédit consommation</option>
                                    <option value="cresco">Crédit scolaire</option>
                                    <option value="decouvert">Découvert</option>
                                    <option value="prefinancement">Préfinancement</option>
                                </select>
                            </div>
                        </div>
                        <div class="row-add-credit">
                            <div class="culum">
                                <div class="group-phone-add-credit culum">
                                    <label for="dossier-add-credit" style="width:200px !important">
                                    <input type="file" name="pathFoleder" id="dossier-add-credit" title="Joindre le dossier">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <button type="submit" class="btn">Soumettre</button>
                </form>                
            </div>
        </div>
    </div>
     {{-- =====================================formulaire etat des dossiers=============================================== --}}
     <div class="contain-sale-log">
        <div class="close-form close-contain-sale-slog"><i class="fa-regular fa-circle-xmark"></i></div>
        <form action="{{route('credit.index')}}" method="post" id="display-sale" class="display-sale">
            @csrf
            <fieldset>
                <legend>Etat des dossiers</legend>
                <div class="groupe-select-sale">
                    <div class="groupe-select-sale-row">
                        <label class="label">Du</label>
                        <input type="date" name="datefrom">
                    </div>
                    <div class="groupe-select-sale-row">
                        <label class="label">Au</label>
                        <input type="date" name="dateto">
                    </div>
                    <div class="groupe-select-sale-row">
                        <label>Nature</label>
                        <select name="type" id="">
                            <option></option>
                            <option value="conso">Crédit consommation</option>
                            <option value="cresco">Crédit scolaire</option>
                            <option value="decouvert">Découvert</option>
                            <option value="prefinancement">Préfinancement</option>
                        </select>
                    </div>
                    <div class="groupe-select-sale-row">
                        <label>Statut</label>
                        <select name="status" id="">
                            <option></option>
                            <option value="Soumis">Soumis</option>
                            <option value="Encours">Encours d'étude</option>
                            <option value="debloque">Débloqué</option>
                            <option value="rejette">Rejetté</option>
                        </select>
                    </div>
                    <div class="groupe-select-sale-row">
                        <label>Agence</label>
                        <select name="branches" id="">
                            @if (Auth::user()->validator == 2)
                            <option></option>
                            @foreach ($branches as $branch)
                            <option value="{{$branch->token}}">{{$branch->branchname}}</option>  
                            @endforeach
                            @endif
                            @if (Auth::user()->validator == 1)
                            @foreach ($branches as $branch)
                            @if (Auth::user()->branch->token == $branch->token)
                            <option value="{{$branch->token}}">{{$branch->branchname}}</option>  
                            @endif
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </fieldset>
            <div class="contain-display-sale">
                <div class="display-folder">
                    <table>
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Date</th>
                                <th>Client</th>
                                <th>Mt demandé</th>
                                <th>Mt accordé</th>
                                <th>Agence</th>
                                <th>Status</th>
                                <th>Affiché</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="contain-row-sale-slog">
                        <table>
                            <tbody class="row-sale-log">      
                            </tbody>
                        </table>
                    </div>                  
                </div>
            </div>
            <div class="groupe-btn-sale">
                <div>
                    <button type="submit">rechercher</button>
                </div>
            </div>
        </form>
    </div>
     {{-- =====================================interface etat des prets=============================================== --}}
     <div class="container-manager-folder-loan">
        <div class="close-form close-container-manager-folder-loan"><i class="fa-regular fa-circle-xmark"></i></div>
        <div class="contain">
            <div class="btn-manager-folder-loan">
                <button id="data_loan">Etat des prêts</button>
                <button id="data_upaid">Gestion des impayés</button>
                <button id="data_single_loan">Intérroger un prêt</button>
            </div>
        </div>
            
    </div>
     {{-- =====================================fin interface etat des prets=============================================== --}}
     {{-- =====================================etat des impaye========================================= --}}
     <div class="contain-upaid-slog">
        <div class="close-form close-contain-upaid-slog"><i class="fa-regular fa-circle-xmark"></i></div>
        <form action="{{route('upaid.index')}}" method="post" id="form-show-upaid-data" class="display-sale">
            @csrf
            <fieldset>
                <legend>Etat des impayés</legend>
                <div class="groupe-select-sale">
                    <div class="groupe-select-sale-row">
                        <label class="label">Du</label>
                        <input type="date" name="datefrom">
                    </div>
                    <div class="groupe-select-sale-row">
                        <label class="label">Au</label>
                        <input type="date" name="dateto">
                    </div>
                    <div class="groupe-select-sale-row">
                        <label for="select-branch-upaid-data">Agence</label>
                        <select name="branches" id="select-branch-upaid-data">
                            @if (Auth::user()->validator == 2)
                            <option></option>
                            @foreach ($branches as $branch)
                            <option value="{{$branch->token}}">{{$branch->branchname}}</option>  
                            @endforeach
                            @endif
                            @if (Auth::user()->validator == 1)
                            @foreach ($branches as $branch)
                            @if (Auth::user()->branch->token == $branch->token)
                            <option value="{{$branch->token}}">{{$branch->branchname}}</option>  
                            @endif
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </fieldset>
            <div class="contain-display-sale">
                <div class="display-upaid">
                    <table>
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Echéance</th>
                                <th>N° prêt</th>
                                <th>Mt impayé</th>
                                <th>Agence</th>
                                <th>Affiché</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="contain-row-upaid">
                        <table>
                            <tbody class="row-upaid">      
                            </tbody>
                        </table>
                    </div>                  
                </div>
            </div>
            <div class="groupe-btn-sale">
                <div>
                    <button type="submit">rechercher</button>
                </div>
            </div>
        </form>
    </div>
     {{-- =====================================fin etat des impaye========================================= --}}
      {{-- =====================================formulaire interrogation pret=============================================== --}}
      <div class="contain-sale-log-single-loan">
        <div class="close-form close-contain-sale-single-slog"><i class="fa-regular fa-circle-xmark"></i></div>
        <form action="{{route('credit.loanFolder')}}" method="post" id="form-loan-single" class="display-sale">
            @csrf
            <fieldset>
                <legend>Intérroger un prêt</legend>
                <div class="groupe-select-sale">
                    <div class="groupe-select-sale-row">
                        <label>Prêt N°</label>
                        <input type="text" name="numberFolder" placeholder="Numéro dossier" style="border:none; outline:none; padding:3px; ">
                    </div>
                    <div class="groupe-select-sale-row">
                        <label>Agence</label>
                        <select name="branches" id="">
                            @if (Auth::user()->validator == 2)
                            <option></option>
                            @foreach ($branches as $branch)
                            <option value="{{$branch->token}}">{{$branch->branchname}}</option>  
                            @endforeach
                            @endif
                            @if (Auth::user()->validator == 1)
                            @foreach ($branches as $branch)
                            @if (Auth::user()->branch->token == $branch->token)
                            <option value="{{$branch->token}}">{{$branch->branchname}}</option>  
                            @endif
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </fieldset>
            <div class="contain-display-sale">
                <div class="display-folder">
                    <table>
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Date</th>
                                <th>Client</th>
                                <th>Mt demandé</th>
                                <th>Mt accordé</th>
                                <th>Agence</th>
                                <th>Etat</th>
                                <th>Affiché</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="contain-row-sale-slog">
                        <table>
                            <tbody class="row-sale-log">      
                            </tbody>
                        </table>
                    </div>                  
                </div>
            </div>
            <div class="groupe-btn-sale">
                <div>
                    <button type="submit">rechercher</button>
                </div>
            </div>
        </form>
    </div>
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
    <script src="{{URL('storage/scripts/script-add-credit.js')}}"></script>
    <script src="{{URL('storage/scripts/script-show-data.js')}}"></script>
</body>
</html>

