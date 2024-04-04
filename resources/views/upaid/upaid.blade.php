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
        </style>
        <div class="content-upaid-retail">
            <div class="contain-retail-upaid">
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
            </div>
        </div>
        <div class="contain-upaid">
            <h3>historique des impayé</h3>
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
                                    <td>{{$item->upaidAmount}}</td>
                                    <td>{{$item->upaidRecovery}}</td>
                                    <td>{{$item->upaidProof}}</td>
                                    @if ($item->status == 0)
                                        <td style="text-align: initial !important">I</td>
                                    @else
                                        <td style="text-align: initial !important">O</td>
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
</body>

</html>