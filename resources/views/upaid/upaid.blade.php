<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" type="text/css" href="{{URL('storage/styles/style-home.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{URL('storage/styles/style-add-credit.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{URL('storage/styles/style-laoder.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{URL('storage/styles/style-show-data.css')}}">  
    <link rel="stylesheet" type="text/css" href="{{URL('storage/styles/style-folder.css')}}">  

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
    <div class="content-upaid">
        <style>
            .row-retail-upaid {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 0 10px;
                /* border: 0.03px solid rgba(193, 237, 245, 0.774); */
                margin: 0 5px;
            }

            .row-retail-upaid .culum-retail-upaid:nth-child(1) {
                text-align: right !important;
                background: #99bbe8;
                color: #fff;
            }

            .culum-retail-upaid {
                width: 50%;
                text-align: center;
                border: 0.03px solid rgba(193, 237, 245, 0.774);
                font-weight: 900;
                text-transform: uppercase;
            }

            .row-retail-upaid .culum-retail-upaid:nth-child(1) p::after {
                content: ':';
                margin-left: 2px;
            }

            .content-upaid-retail {
                width: 1000px;
                margin:0 auto;
            }

            .contain-retail-upaid{
                width: 100%;
                
            }

            .content-form-recouvery-upaid{
                position: fixed;
                width: 100%;
                height: 100vh;
                top: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                background: rgba(228, 228, 231, 0.897);
                transform: scale(0);
                transition: transform 1s ease;
                z-index: 100;
            }

            .content-form-recouvery-upaid.active{
                transform: scale(1);
                transition: transform 1s ease;
            }
            .content-form-recouvery-upaid-action{
                position: fixed;
                width: 100%;
                height: 100vh;
                top: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                background: rgba(228, 228, 231, 0.897);
                transform: scale(0);
                transition: transform 1s ease;
                z-index: 100;
            }

            .content-form-recouvery-upaid-action.active{
                transform: scale(1);
                transition: transform 1s ease;
            }

            .contain-form-recouvery-upaid{
                background: #99bbe8;
                width: 400px;
                padding: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .contain-recovery-upaid{
                background: #fff;
                margin-bottom: 5px;
            }
            .contain-recovery-upaid input{
                font-weight: bolder;
                display:inline-block;
                border: none;  
                background: transparent;
                flex: 1;
                outline: none; 
            }
            .contain-recovery-upaid label{
                color: #fff;
                font-weight: bolder;
                display:inline-block; 
                background: #99bbe8;
                padding: 10px;
                border: 0.03px solid rgba(193, 237, 245, 0.774);
            }
            .sub-content-form-upaid{
                background: #99bbe8;
                padding: 5px;
            }

            /* action recouvrement */

            .contain-action-recouvery{
                position: fixed;
                background: rgba(228, 228, 231, 0.89);
                height: 100vh;
                width: 100%;
                top: 0;
                transform: scale(0);
                transition: transform 1s ease;
                z-index: 1000;
            }
            .contain-action-recouvery.active{
                transform: scale(1);
                transition: transform 1s ease;
            }

            .show-garantie{
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100%; 
            }

            .container-garantie{
                border: dotted 1px;
                padding: 10px;
                margin-bottom: 20px;
                background: rgba(228, 228, 231, 0.315);
                color: rgb(23, 127, 76);
            }

            .show-content{
                width: 100%;
                height: 100%;
                max-width: 655px;
                max-height: 400px;
                background: #99bbe8;
                overflow-y: scroll;
                scrollbar-width: thin;
                padding: 10px;
            }

        </style>
        <div class="contain-message-error">
            <div class="sub-message-error-contain">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <p id="error-message-contain-spent-item" draggable="true" class="error-message"></p>
                <span class="hidde-error-message">OK</span>
            </div>
        </div>
        <div class="contain-upaid">
            {{-- ===========================Formulaire recouvrement============================ --}}
            <div class="content-form-recouvery-upaid">
                <div class="close-form close-content-form-recouvery-upaid"><i class="fa-regular fa-circle-xmark"></i></div>
                    <div class="sub-content-form-upaid">
                        <fieldset>
                            <legend>Recouvrement</legend>
                        <div class="contain-form-recouvery-upaid">
                            <form action="{{route('upaid.recouvery', $upaid->token)}}" id="form-recouvery-upaid" method="post">
                                @csrf
                                <div class="contain-recovery-upaid">
                                    <label for="amount-recouvery">Montant</label>
                                    <input name="recouveryUpaid" type="text" id="amount-recouvery" placeholder="Montant recouvré">
                                </div>
                                <button type="submit">OK</button>
                            </form>
                        </div>
                        </fieldset>
                    </div>
            </div>
            {{-- ===========================fin Formulaire recouvrement============================ --}}
            {{-- ===========================Formulaire action recouvrement============================ --}}
            <div class="content-form-recouvery-upaid-action">
                <div class="close-form close-content-form-recouvery-upaid-action"><i class="fa-regular fa-circle-xmark"></i></div>
                    <div class="sub-content-form-upaid">
                        <fieldset>
                            <legend>Action recouvrement</legend>
                        <div class="contain-form-recouvery-upaid">
                            <form action="{{route('actionRecovery.store', $upaid->token)}}" id="form-recouvery-action" method="post">
                                @csrf
                                <div class="contain-recovery-upaid">
                                    <label for="recouvery-action-object">Objet Doc</label>
                                    <input name="recouveryUpaidActionObject" type="text" id="recouvery-action-object" placeholder="Objet du document">
                                </div>
                                <div class="contain-recovery-upaid">
                                    <label for="amount-recouvery">Fichier
                                        <input name="recouveryUpaidActionDoc" type="file" id="recouvery-action-document">
                                    </label>
                                </div>
                                <button type="submit">OK</button>
                            </form>
                        </div>
                        </fieldset>
                    </div>
            </div>
            {{-- ===========================fin Formulaire action recouvrement============================ --}}
            {{-- ===========================consulter les action de recouvrement============================ --}}
            <div class="contain-action-recouvery">
                <div class="close-form close-contain-action-recouvery"><i class="fa-regular fa-circle-xmark"></i></div>
                <div class="show-garantie">
                    <div class="show-content">
                        <fieldset>
                            <legend>Les actions</legend>
                            <div class="show-garantie-content">
                                @php
                                    $nbAction = 1;
                                @endphp
                                @foreach ($actions as $action)
                                @if ($upaid->token == $action->token_upaid)
                                <div class="container-garantie">
                                    <p>{{$nbAction}}</p>
                                    <div class="row-retail-folder">
                                        <div class="culum-retail-folder">
                                            <p>Description</p>
                                        </div>
                                        <div class="culum-retail-folder">
                                            <p>{{$action->title}}</p>                    
                                        </div>
                                    </div>
                                    <div class="row-retail-folder">
                                        <div class="culum-retail-folder">
                                            <p>document</p>
                                        </div>
                                        <div class="culum-retail-folder">
                                            <p><a title="Télécharger le fichier" class="a-donwload" href="/storage/document/upaid/{{$action->path}}">{{$action->path}} <i class="fa-solid fa-download"></i></a></p>                    
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $nbAction ++;
                                @endphp
                                @endif
                                @endforeach
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            {{-- ===========================fin consultation action de recouvrement============================ --}}
            <div class="content-upaid-retail">
                <div class="contain-retail-upaid">
                    <div class="row-retail-upaid">
                        <div class="culum-retail-upaid">
                            <p>Nom client</p>
                        </div>
                        <div class="culum-retail-upaid">
                            <p>{{$upaid->credit->custumerName}}</p>
                        </div>
                    </div>
                    <div class="row-retail-upaid">
                        <div class="culum-retail-upaid">
                            <p>Numéro prêt</p>
                        </div>
                        <div class="culum-retail-upaid">
                            <p>{{$upaid->numberFolder}}</p>
                        </div>
                    </div>
                    <div class="row-retail-upaid">
                        <div class="culum-retail-upaid">
                            <p>Echéance</p>
                        </div>
                        <div class="culum-retail-upaid">
                            <p>{{date('d-m-Y', strtotime($upaid->upaidDate))}}</p>
                        </div>
                    </div>
                    <div class="row-retail-upaid">
                        <div class="culum-retail-upaid">
                            <p>Montant impayé</p>
                        </div>
                        <div class="culum-retail-upaid">@php echo (number_format(intval($upaid->upaidAmount) , 0 , '.', ' '). ' XAF') @endphp</p>
                        </div>
                    </div>
                    <div class="row-retail-upaid">
                        <div class="culum-retail-upaid">
                            <p>Montant recouuvré</p>
                        </div>
                        <div class="culum-retail-upaid">@php echo (number_format(intval($upaid->upaidRecovery) , 0 , '.', ' '). ' XAF') @endphp</p>
                        </div>
                    </div>
                    <div class="row-retail-upaid">
                        <div class="culum-retail-upaid">
                            <p>Montant à recouuvrer</p>
                        </div>
                        <div class="culum-retail-upaid">@php echo (number_format(intval($upaid->upaidAmount - $upaid->upaidRecovery) , 0 , '.', ' '). ' XAF') @endphp</p>
                        </div>
                    </div>
                    <div class="row-retail-upaid">
                        <div class="culum-retail-upaid">
                            <p>Téléphone client</p>
                        </div>
                        <div class="culum-retail-upaid">@php echo (number_format(intval($upaid->credit->custumerPhoneNumber) , 0 , '.', ' ')) @endphp</p>
                        </div>
                    </div>
                </div>
                <div class="group-btn-upaid" style="padding: 10px; margin:3px;">
                    @if (intval($upaid->upaidAmount) != intval($upaid->upaidRecovery ))
                    <button type="submit" id="recouvery-upaid-btn">Recouvrement</button>
                    <button type="submit" id="recouvery-upaid-action-btn">Action Recouvrement</button>
                    @endif
                    <button type="submit" id="show-action-recouvery-btn">Voir les actions</button>
                </div>
            </div>
            <h3>historique des impayés</h3>
            <div class="contain-display-sale display-sale contain-display-upaid">
                <div class="display-upaid">
                    <table>
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Echéance</th>
                                <th>Impayé</th>
                                <th>Recouvrement</th>
                                <th>Motif</th>            
                                <th>Statut</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                    <div class="contain-row-upaid">
                        <table>
                            <tbody class="row-upaid" style="position: relative;"> 
                                @php $nb = 1 @endphp
                                @foreach ($upaids as $item)
                                <tr>
                                    <td>{{$nb}}</td>
                                    <td> {{date('d-m-Y', strtotime($item->upaidDate))}}</td>
                                    <td>@php echo (number_format(intval($item->upaidAmount), 0 , '.', ' ')) @endphp</td>
                                    <td>@php echo (number_format(intval($item->upaidRecovery), 0 , '.', ' ')) @endphp</td>
                                    <td>{{$item->upaidProof}}</td>
                                    @if ($item->upaidRecovery == $item->upaidAmount)
                                        <td style="text-align: initial !important">O</td>
                                    @else
                                        <td style="text-align: initial !important">I</td>
                                    @endif  
                                    <td><a style="color: rgb(23, 127, 76) !important;" href="{{$item->token}}">Détail</a></td>
                                    @php $nb += 1 @endphp
                                    {{-- <td><button type="submit" style="padding:2px !important;">Suivre</button></td> --}}
                                    {{-- <td style="position:fixed; top:50%; left:50%; transform:translatex(-50%)" ><form action="" style="background:#99bbe8; width:300px; height:200px"><input  type="text" value="{{$item->token}}"> </form></td> --}}
                                </tr>
                                @endforeach     
                            </tbody>
                        </table>
                    </div>                  
                </div>
            </div>
        </div>
    </div>
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
    <script src="{{URL('storage/scripts/script-recouvery.js')}}"></script>
</body>

</html>