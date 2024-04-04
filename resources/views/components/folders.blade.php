<div class="contain-auth">
    <div class="contain-title-folder">
        <h1>détails dossier de crédit</h1>
    </div>
    <div class="contain-retail-folder">
        <div class="row-retail-folder">
            <div class="culum-retail-folder">
                <p>Agence</p>
            </div>
            <div class="culum-retail-folder">
                <p>{{$credit->branch->branchname}}</p>
            </div>
        </div>
    </div>
    <div class="contain-retail-folder">
        <div class="row-retail-folder">
            <div class="culum-retail-folder">
                <p>Nom du client</p>
            </div>
            <div class="culum-retail-folder">
                <p>{{$credit->custumerName}}</p>
            </div>
        </div>
        <div class="row-retail-folder">
            <div class="culum-retail-folder">
                <p>Activité du client</p>
            </div>
            <div class="culum-retail-folder">
                <p>@php echo($credit->custumerActivity) @endphp</p>
            </div>
        </div>
        <div class="row-retail-folder">
            <div class="culum-retail-folder">
                <p>Localisation activité</p>
            </div>
            <div class="culum-retail-folder">
                <p>@php echo($credit->custumerLocalActivity) @endphp</p>
            </div>
        </div>
        <div class="row-retail-folder">
            <div class="culum-retail-folder">
                <p>Localisation domicile</p>
            </div>
            <div class="culum-retail-folder">
                <p>@php echo($credit->custumerDomicile) @endphp</p>
            </div>
        </div>
        <div class="row-retail-folder">
            <div class="culum-retail-folder">
                <p>Téléphone du client</p>
            </div>
            <div class="culum-retail-folder">
                <p>@php echo($credit->custumerPhoneNumber) @endphp</p>
            </div>
        </div>
        <div class="row-retail-folder">
            <div class="culum-retail-folder">
                <p>Identifiant unique</p>
            </div>
            <div class="culum-retail-folder">
                <p>@php echo($credit->custumerNui) @endphp</p>
            </div>
        </div>
    </div>
    <div class="contain-retail-folder">
        <div class="row-retail-folder">
            <div class="culum-retail-folder">
                <p>Montant sollicité</p>
            </div>
            <div class="culum-retail-folder">
                <p>@php echo (number_format(intval($credit->amount), 0, '.', ' ').' '.'XAF')@endphp</p>
            </div>
        </div>
    </div>
    <div class="contain-retail-folder">
        <div class="row-retail-folder">
            <div class="culum-retail-folder">
                <p>Montant accordé</p>
            </div>
            <div class="culum-retail-folder">
                @if ($credit->amountValidated==null)
                <p>{{'/'}}</p>    
                @else
                <p>@php echo (number_format(intval($credit->amountValidated), 0, '.', ' ').' '.'XAF')@endphp</p>   
                @endif                       
            </div>
        </div>
    </div>
    <div class="contain-retail-folder">
        <div class="row-retail-folder">
            <div class="culum-retail-folder">
                <p>Nature du crédit</p>
            </div>
            <div class="culum-retail-folder">
            <p>{{$credit->nature}} </p>                    
            </div>
        </div>
        <div class="row-retail-folder">
            <div class="culum-retail-folder">
                <p>statut du dossier</p>
            </div>
            <div class="culum-retail-folder">
            <p>{{$credit->status}} </p>                    
            </div>
        </div>
        <div class="row-retail-folder">
            <div class="culum-retail-folder">
                <p>Date soumission</p>
            </div>
            <div class="culum-retail-folder">
            <p>{{date("d-m-Y", strtotime($credit->create_at))}} </p>                    
            </div>
        </div>
        @if ($credit->status == 'debloque')
        <div class="row-retail-folder">
            <div class="culum-retail-folder">
                <p>Numéro du prêt</p>
            </div>
            <div class="culum-retail-folder">
            <p>{{$credit->numberFolder}} </p>                    
            </div>
        </div>
        <div class="row-retail-folder">
            <div class="culum-retail-folder">
                <p>Date mise en place</p>
            </div>
            <div class="culum-retail-folder">
            <p>{{date("d-m-Y", strtotime($credit->update_at))}} </p>                    
            </div>
        </div>
        @endif
        <div class="row-retail-folder">
            <div class="culum-retail-folder">
                <p>Gestionnaire</p>
            </div>
            <div class="culum-retail-folder">
            <p>{{$credit->user->name. ' '.$credit->user->firstname}} </p>                    
            </div>
        </div>
        <div class="row-retail-folder">
            <div class="culum-retail-folder">
                <p>Dossier d'étude</p>
            </div>
            <div class="culum-retail-folder">
            <p><a title="Télécharger le fichier" class="a-donwload" href="/storage/dossier/{{$credit->branch->branchname}}/{{$credit->path}}">{{$credit->path}} <i class="fa-solid fa-download"></i></a></p>                    
            </div>
        </div>
        @if ($credit->status == 'debloque')
        <div class="row-retail-folder">
            <div class="culum-retail-folder">
                <p>Dossier de déblocage</p>
            </div>
            <div class="culum-retail-folder">
            <p><a title="Télécharger le fichier" class="a-donwload" href="/storage/deblocage/{{$credit->branch->branchname}}/{{$credit->path2}}">{{$credit->path2}} <i class="fa-solid fa-download"></i></a></p>                    
            </div>
        </div>
        @endif
    </div>
    <div class="caitenaire-btn">
        <div class="contain-btn-folder">
            <button type="submit" id="manager_folder" class="btn">Gérer le dossier</button>
            @if ($credit->status !== 'debloque')
            <button type="submit" id="add_coment" class="btn">Laisser un commentaire</button>
            @if(Auth::User()->validator == 2 )
            <button type="submit" id="add_opinion" class="btn">Donner votre avis</button>
            @endif  
            @endif

        </div>
        <div class="contain-btn-folder">
            <button type="submit" id="read_comment" class="btn">Lire les commentaires</button>
            <button type="submit" id="read_opinion" class="btn">Lire les avis</button>
        </div>
        <div class="contain-btn-folder">
            <button type="submit" id="read_warantie" class="btn">Voir les garanties</button>
            <button type="submit" id="read_caution" class="btn">Voir les caution</button>
        </div>
    </div>
</div>
{{-- ===========================Formulaire ajout commentaire============================ --}}
@if ($credit->status !== 'debloque')
<div class="content-coment-folder">
    <div class="close-form close-content-coment-folder"><i class="fa-regular fa-circle-xmark"></i></div>
    <div class="contain-form-coment-folder">
        <form action="{{route('comment.store')}}" id="coment-folder" method="post">
            @csrf
            <div class="group-input-hidden">
                <input type="hidden" name="tokenFolder" value="{{$credit->token}}">
                <input type="hidden" name="tokenBranch" value="{{$credit->token_branch}}">
            </div>
            <div class="contain-coment">
                <label for="coment">
                    <span>Votre commentaire</span>
                    <br>
                    <textarea name="coment" id="coment" cols="30" rows="10"></textarea>
                </label>
            </div>
            <button type="submit">Envoyer</button>
        </form>
    </div>
</div>
{{-- ===========================fin Formulaire ajout avis============================ --}}
{{-- ===========================Formulaire ajout avis============================ --}}
<div class="content-opinion-folder">
    <div class="close-form close-content-opinion-folder"><i class="fa-regular fa-circle-xmark"></i></div>
    <div class="contain-form-coment-folder">
        <form action="{{route('opinion.store')}}" id="opinion-folder" method="post">
            @csrf
            <div class="group-input-hidden">
                <input type="hidden" name="tokenFolder" value="{{$credit->token}}">
                <input type="hidden" name="tokenBranch" value="{{$credit->token_branch}}">
            </div>
            <div class="contain-coment">
                <label for="coment">
                    <span>Votre avis</span>
                    <br>
                    <textarea name="coment" id="opinion" cols="30" rows="10"></textarea>
                </label>
            </div>
            <button type="submit">Envoyer</button>
        </form>
    </div>
</div>
{{-- ===========================Fin formulaire ajout avis============================ --}}
{{-- ===========================Formulaire ajout caution============================ --}}
<div class="contain-add-caution">
    <div class="close-form close-contain-add-caution"><i class="fa-regular fa-circle-xmark"></i></div>
    <div class="contain-form-add-credit">
        <div class="form-add-caution">
            <form action="{{route('caution.store', $credit->token)}}" method="post" enctype="multipart/form-data" id="form-add-caution">
                @csrf
                <fieldset>
                    <legend>Infos caution</legend>
                    <div class="row-add-credit">
                        <div class="group-name-add-credit culum">
                            <label for="caution-name">Nom</label>
                            <input type="text" name="nomCaution" id="caution-name" placeholder="Nom de la caution">
                        </div>
                        <div class="group-activity-add-credit culum">
                            <label for="caution-activity">Activité</label>
                            <input type="text" name="activiteCaution" id="caution-activity" placeholder="Activité de la caution">
                        </div>
                    </div>
                    <div class="row-add-credit">
                        <div class="group-activity-add-credit culum">
                            <label for="caution-home">Domicile</label>
                            <input type="text" name="localisationCaution" id="caution-home" placeholder="Domicile de la caution">
                        </div>
                        <div class="group-activity-add-credit culum">
                            <label for="caution-activity-home">Lieu activité</label>
                            <input type="text" name="localisationActivite" id="caution-activity-home" placeholder="Localisation activité">
                        </div>
                    </div>
                    <div class="row-add-credit">
                        <div class="group-name-add-credit culum">
                            <label for="caution-sexe">Sexe</label>
                            <select name="sexeCaution" id="caution-sexe">
                                <option></option>
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                            </select>
                        </div>
                        <div class="group-nui-add-credit culum">
                            <label for="caution-lien">Lien</label>
                            <input type="text" name="lienCaution" id="caution-lien" placeholder="lien demandeur-caution">
                        </div>
                    </div>
                    <div class="row-add-credit">
                        <div class="group-nui-add-credit culum">
                            <label for="age-caution">Age</label>
                            <input type="text" name="ageCaution" id="age-caution" placeholder="Age de la caution">
                        </div>
                        <div class="group-phone-add-credit culum">
                            <label for="caution-phone">Téléphone</label>
                            <input type="text" name="cautionPhone" id="caution-phone" placeholder="Téléphone de la caution">
                        </div>
                    </div>
                </fieldset>
                <button type="submit" class="btn">Sauvegarder</button>
            </form>                
        </div>
    </div>
</div>
{{-- ===========================Fin formulaire ajout caution============================ --}}
{{-- ===========================Formulaire ajout garantie============================ --}}
<div class="content-form-add-garantie">
    <div class="close-form close-form-add-garantie"><i class="fa-regular fa-circle-xmark"></i></div>
    <div class="contain-form-coment-folder">
        <form action="{{route('garantie.store', $credit->token)}}" id="form-add-garantie" method="post">
            @csrf
            <div class="contain-coment">
                <label for="description-garantie">
                    <span>Description de la garantie</span>
                    <br>
                    <textarea name="natureGarantie" id="description-garantie" ></textarea>
                </label>
            </div>
            <div class="row-add-credit">
                <div class="group-nui-add-credit culum">
                    <label for="valeur-garantie">Valeur</label>
                    <input type="text" name="valeurGarantie" id="valeur-garantie" placeholder="Valeur de la garantie">
                </div>
            </div>
            <div class="row-add-credit">
                <div class="group-phone-add-credit culum">
                    <label for="copie-garantie" style="width:200px !important;">
                    <input type="file" name="pathGarantie" id="copie-garantie" title="Joindre une copie">
                    </label>
                </div>
            </div>
            <button type="submit">Enregistrer</button>
        </form>
    </div>
</div>
{{-- ===========================Fin formulaire ajout garantie============================ --}}
@endif
<div class="show-comment-container">
    <div class="close-form close-contain-show-comment"><i class="fa-regular fa-circle-xmark"></i></div>
    <div class="show-comment">
        <div class="show-content">
            <fieldset>
                <legend>Les commentaires</legend>
                <div class="show-comment-content">
                    @foreach ($comments as $comment)           
                    @if ($credit->token == $comment->token_credit)
                    <div class="container-comment">
                        {{-- @auth
                        @if (Auth::user()->id === $comment->othor_id)
                        <div class="delete-comment"><form id="form-delete-comment" method="get" action="{{route('coment.destroy', $comment->id)}}">@csrf  <button class='btn-comment'><i title="Supprimer" class="fa fa-trash" aria-hidden="true" style ="color:brown" id="btn-delete-comment"></i></button></form></div>
                        @endif  
                        @endauth --}}
                        {{-- <div class="reply-comment"><div><button class='btn-comment' type="submit"><i title="Répondre" class="fa fa-reply" aria-hidden="true" style ='color:green'></i></button></div></div> --}}
                        <div class="user-icon">
                            <div class="picture-comment">
                                <div class="profile-picture-comment">
                                    <img src="{{URL('storage/images')}}/{{$comment->user->path}}" alt="photo de profile">
                                </div>
                            </div>
                            <div class="content-comment">
                                <span class="othor-comment">{{$comment->user->name}} {{$comment->user->firstname}} </span>
                                <p><time>Puiblié le {{date("d-m-Y", strtotime($comment->created_at))}}</time></p>
                                <p class="p-content"> @php  echo($comment->content) @endphp </p>
                            </div>
                        </div>
                    </div>
                    @endif  
                    @endforeach
                </div>  
            </fieldset>
        </div>
    </div>
</div>
<div class="show-opinion-container">
    <div class="close-form close-contain-show-opinion"><i class="fa-regular fa-circle-xmark"></i></div>
    <div class="show-comment">
        <div class="show-content">
            <fieldset>
                <legend>Les avis</legend>
                <div class="show-comment-content">
                    @foreach ($opinions as $opinion)           
                    @if ($credit->token == $opinion->token_credit)
                    <div class="container-comment">
                        {{-- @auth
                        @if (Auth::user()->id === $comment->othor_id)
                        <div class="delete-comment"><form id="form-delete-comment" method="get" action="{{route('coment.destroy', $comment->id)}}">@csrf  <button class='btn-comment'><i title="Supprimer" class="fa fa-trash" aria-hidden="true" style ="color:brown" id="btn-delete-comment"></i></button></form></div>
                        @endif  
                        @endauth --}}
                        {{-- <div class="reply-comment"><div><button class='btn-comment' type="submit"><i title="Répondre" class="fa fa-reply" aria-hidden="true" style ='color:green'></i></button></div></div> --}}
                        <div class="user-icon">
                            <div class="picture-comment">
                                <div class="profile-picture-comment">
                                    <img src="{{URL('storage/images')}}/{{$opinion->user->path}}" alt="photo de profile">
                                </div>
                            </div>
                            <div class="content-comment">
                                <span class="othor-comment">{{$opinion->user->name}} {{$opinion->user->firstname}} </span>
                                <p><time>Puiblié le {{date("d-m-Y", strtotime($opinion->created_at))}}</time></p>
                                <p class="p-content"> @php  echo($opinion->content) @endphp </p>
                            </div>
                        </div>
                    </div>
                    @endif  
                    @endforeach
                </div>
            </fieldset>
        </div>
    </div>
</div>
<div class="show-caution-container">
    <div class="close-form close-contain-show-caution"><i class="fa-regular fa-circle-xmark"></i></div>
    <div class="show-caution">
        <div class="show-content">
            <fieldset>
                <legend>Les cautions</legend>
                <div class="show-caution-content">
                    @php
                        $nbGarantie = 1;
                    @endphp
                    @foreach ($cautions as $caution)
                    @if ($credit->token == $caution->credit_token)
                    <div class="container-caution">
                        <p>{{$nbGarantie}}</p>
                        <div class="row-retail-folder">
                            <div class="culum-retail-folder">
                                <p>Nom</p>
                            </div>
                            <div class="culum-retail-folder">
                                <p>{{$caution->nomCaution}}</p>                    
                            </div>
                        </div>
                        <div class="row-retail-folder">
                            <div class="culum-retail-folder">
                                <p>Sexe</p>
                            </div>
                            <div class="culum-retail-folder">
                                <p>{{$caution->sexeCaution}}</p>                    
                            </div>
                        </div>
                        <div class="row-retail-folder">
                            <div class="culum-retail-folder">
                                <p>âge</p>
                            </div>
                            <div class="culum-retail-folder">
                                <p>{{$caution->ageCaution .' ans'}}</p>                    
                            </div>
                        </div>
                        <div class="row-retail-folder">
                            <div class="culum-retail-folder">
                                <p>Lien</p>
                            </div>
                            <div class="culum-retail-folder">
                                <p>{{$caution->lien}}</p>                    
                            </div>
                        </div>
                        <div class="row-retail-folder">
                            <div class="culum-retail-folder">
                                <p>Activité</p>
                            </div>
                            <div class="culum-retail-folder">
                                <p>{{$caution->activiteCaution}}</p>                    
                            </div>
                        </div>
                        <div class="row-retail-folder">
                            <div class="culum-retail-folder">
                                <p>Lieu activité</p>
                            </div>
                            <div class="culum-retail-folder">
                                <p>{{$caution->localisationCaution}}</p>                    
                            </div>
                        </div>
                        <div class="row-retail-folder">
                            <div class="culum-retail-folder">
                                <p>domicile</p>
                            </div>
                            <div class="culum-retail-folder">
                                <p>{{$caution->localisationActivite}}</p>                    
                            </div>
                        </div>
                        <div class="row-retail-folder">
                            <div class="culum-retail-folder">
                                <p>Téléphone</p>
                            </div>
                            <div class="culum-retail-folder">
                                <p>{{$caution->telephoneCaution}}</p>                    
                            </div>
                        </div>
                    </div>
                    @php
                        $nbGarantie ++;
                    @endphp
                    @endif
                    @endforeach
                </div>
            </fieldset>
        </div>
    </div>
</div>
<div class="show-garantie-container">
    <div class="close-form close-contain-show-garantie"><i class="fa-regular fa-circle-xmark"></i></div>
    <div class="show-garantie">
        <div class="show-content">
            <fieldset>
                <legend>Les garanties</legend>
                <div class="show-garantie-content">
                    @php
                        $nbGarantie = 1;
                    @endphp
                    @foreach ($garanties as $garantie)
                    @if ($credit->token == $garantie->credit_token)
                    <div class="container-garantie">
                        <p>{{$nbGarantie}}</p>
                        <div class="row-retail-folder">
                            <div class="culum-retail-folder">
                                <p>Description</p>
                            </div>
                            <div class="culum-retail-folder">
                                <p>{{$garantie->natureGarantie}}</p>                    
                            </div>
                        </div>
                        <div class="row-retail-folder">
                            <div class="culum-retail-folder">
                                <p>Valeur</p>
                            </div>
                            <div class="culum-retail-folder">
                                <p>@php echo (number_format(intval($garantie->valueGarantie), 0, '.', ' ').' '.'XAF')@endphp</p>                    
                            </div>
                        </div>
                        <div class="row-retail-folder">
                            <div class="culum-retail-folder">
                                <p>Copie</p>
                            </div>
                            <div class="culum-retail-folder">
                                <p><a title="Télécharger le fichier" class="a-donwload" href="/storage/dossier/garantie/{{$garantie->pathGarantie}}">{{$garantie->pathGarantie}} <i class="fa-solid fa-download"></i></a></p>                    
                            </div>
                        </div>
                    </div>
                    @php
                        $nbGarantie ++;
                    @endphp
                    @endif
                    @endforeach
                </div>
            </fieldset>
        </div>
    </div>
</div>
@if ($credit->status !== 'debloque')
<div class="container-manager-folder">
    <div class="close-form close-container-manager-folder"><i class="fa-regular fa-circle-xmark"></i></div>
    <div class="contain">
        <div class="btn-manager-folder">
            @if (Auth::user()->validator == 1)
            <button id="update_folder"> Modifier le dossier</button>
            <button id="add_warantie"> Ajouter une Garantie</button>
            <button id="add_caution"> Ajouter une Caution</button>
            @endif
            @if (Auth::user()->validator == 2)
            <button id="change_status"> Changer de statut</button>
            <button id="approve_folder"> Débloquer le dossier</button>
            @endif
        </div>
    </div>
</div>
{{-- =======================================formulaire modification statut================================================ --}}
<div class="content-change-status-folder">
    <div class="close-form close-content-change-status-folder"><i class="fa-regular fa-circle-xmark"></i></div>
    <div class="contain-form-coment-folder">
        <fieldset>
            <legend>Modifier le statut du dossier</legend>
            <form action="{{route('credit.updateStatusFolder', $credit->token)}}" id="change-status-folder" method="post">
                @csrf
                <div class="groupe-select-statut-row">
                    <select name="status" id="">
                        <option></option>
                        <option value="Soumis">Soumis</option>
                        <option value="Encours">Encours d'étude</option>
                        <option value="debloque">Débloqué</option>
                        <option value="rejette">Rejetté</option>
                    </select>
                </div>
                <button type="submit">Modifier</button>
            </form>
        </fieldset>
    </div>
</div>
{{-- =======================================fin formulaire modification statut================================================ --}}
{{-- =======================================formulaire deblocage================================================================================== --}}
<div class="contain-approuve-credit">
    <div class="close-form close-contain-approuve-credit"><i class="fa-regular fa-circle-xmark"></i></div>
    <div class="contain-form-add-credit">
        <div class="form-approuve-credit">
            <form action="{{route('credit.approveFolder',$credit->token)}}" method="post" enctype="multipart/form-data" id="form-approuve-credit">
                @csrf
                <fieldset>
                    <legend>Infos crédit</legend>
                    <div class="row-add-credit">
                        <div class="group-name-add-credit culum number">
                            <label for="number-folder">N° prêt</label>
                            <input type="text" name="numberFolder" id="number-folder" placeholder="Numéro du prêt">
                        </div>
                        <div class="group-activity-add-credit culum">
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
                        <div class="group-phone-add-credit culum">
                            <label for="dossier-add-credit">Date déblocage</label>
                            <input type="date" name="updated_at" id="dossier-add-credit" title="Joindre le dossier">                           
                        </div>
                        <div class="group-phone-add-credit culum">
                            <label for="dossier-add-credit" for="remboursement">Montant échéance</label>
                            <input type="text" name="remboursement" id="remboursement" placeholder="Montant remboursement">
                        </div>
                    </div>
                    <div class="row-add-credit">
                        <div class="group-phone-add-credit culum">
                            <label for="dossier-add-credit">Première échéance</label>
                            <input type="date" name="firstRemboursement" id="dossier-add-credit">                           
                        </div>
                        <div class="group-phone-add-credit culum">
                            <label for="dossier-add-credit">Dernière échéance</label>
                            <input type="date" name="lastRemboursement" id="dossier-add-credit">                           
                        </div>
                    </div>
                    <div class="row-add-credit">
                        <div class="group-phone-add-credit culum">
                            <label for="dossier-add-credit" style="width:200px !important">
                            <input type="file" name="pathFoleder" id="dossier-add-credit" title="Joindre le dossier">
                            </label>
                        </div>
                    </div>
                </fieldset>
                <button type="submit" class="btn">Valider</button>
            </form>                
        </div>
    </div>
</div>
{{-- =======================================fin formulaire deblocage================================================================================== --}}
@endif
@if ($credit->status == 'debloque')
<div class="container-manager-folder">
    <div class="close-form close-container-manager-folder"><i class="fa-regular fa-circle-xmark"></i></div>
    <div class="contain">
        <div class="btn-manager-folder">
            <button id="manager_upaid"> Gestion impayés</button>
        </div>
    </div>
</div>
{{-- ==============================interface bouton gestion impayes=========================== --}}
<div class="container-manager-upaid">
    <div class="close-form close-container-manager-upaid"><i class="fa-regular fa-circle-xmark"></i></div>
    <div class="contain">
        <div class="btn-manager-folder">
            <button id="delaration_upaid"> Déclarer l'impayé</button>
            <button id="manager_upaid"> Suivi impayé</button>
        </div>
    </div>
</div>
{{-- ==============================interface bouton gestion impayes=========================== --}}
@endif
{{-- =======================================formulaire declaration impaye================================================ --}}
<div class="content-upaid-declaration">
    <div class="close-form close-content-upaid-declaration"><i class="fa-regular fa-circle-xmark"></i></div>
    <div class="contain-form-upaid-declaration">
        <fieldset>
            <legend>Déclaration impayé </legend>
            <form action="{{route('upaid.store', $credit->token)}}" id="form-upaid-declaration" method="post">
                @csrf
                <div class="upaid-declaration-culum">
                    <div class="row-upaid">
                        <label for="amount-upaid">Montant impayé </label>
                        <input type="text" name="amountUpaid" id="amount-upaid" placeholder="Montant impayé">
                    </div>
                    <div class="row-upaid">
                        <label for="echeance-upaid">Echéance impayée</label>
                        <input type="date" name="dateUpaid" id="echeance-upaid">
                    </div>
                    <div class="">
                        <span for="upaid-motivation" style="color:#fff; font-weight:bold;padding:5px">Motif impayé</span>
                        <textarea name="upaidMotivation" id="upaid-motivation" style="height: 125px; width:459px; min-height: 125px; min-width:459px; outline:none; border:none; max-width:459px; padding:5px;"></textarea>
                    </div>
                </div>
                <button type="submit">OK</button>
            </form>
        </fieldset>
    </div>
</div>
{{-- =======================================fin formulaire declaration impaye================================================ --}}