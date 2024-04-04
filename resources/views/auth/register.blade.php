<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{URL('storage/styles/connexion.css')}}"> 

    <title>Gestion crédit - register</title>

       
</head>
<body>
    <div class="contain">
        <div class="form">
            <form action="{{route('register')}}" class="formulaire-login" method="post" enctype="multipart/form-data">
                @csrf
                <div class="groupe-id">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="name" id="identifiat" placeholder="Votre nom" value="{{old('name')}}">
                </div>
                <div class="groupe-id">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="firstname" id="identifiat" placeholder="Votre prénom" value="{{old('firstname')}}">
                </div>
                <div class="groupe-civilite">
                    <i class="fa-regular fa-user"></i>
                    <select name="civility" id="">
                        <option >Votre Civilité</option>
                        <option value="M.">Monsieur</option>
                        <option value="Mme">Madame</option>
                        <option value="Mlle">Mademoiselle</option>
                    </select>
                </div>
                <div class="groupe-branch">
                    <i class="fa-solid fa-location-dot"></i>
                    <select name="branch">
                        <option value="">Choisissez votre agence</option>
                        @foreach ($branches as $branch)
                        <option value="{{$branch->token}}">{{$branch->branchname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="groupe-function">
                    <i class="fa-regular fa-user"></i>
                    <select name="function">
                        <option value="">Choisissez votre fonction</option>
                        @foreach ($occupations as $occupation)
                        <option value="{{$occupation->token}}">{{$occupation->occupationName}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="groupe-email">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" placeholder="Votre adresse mail" name="email" value="{{old('email')}}">
                </div>
                <div class="groupe-password">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe">
                </div>
                <div class="groupe-password">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password_confirmation" id="password" placeholder="Confirmation mot de passe">
                </div>
                <div class="groupe-photo">
                    <label>                     
                        <input type="file" name="path" required value="photo de profile" >
                        <span>Photo profile</span>
                    </label>
                </div>
                <div class="groupe-btn"><button type="submit">S'inscrire</button></div>
            </form>
            @error('name')<p class="error-message">{{$message}}</p>@enderror
            @error('firstname')<p class="error-message">{{$message}}</p>@enderror
            @error('civility')<p class="error-message">{{$message}}</p>@enderror
            @error('email')<p class="error-message">{{$message}}</p>@enderror
            @error('password')<p class="error-message">{{$message}}</p>@enderror
            @error('path')<p class="error-message">{{$message}}</p>@enderror
            @error('branch')<p class="error-message">{{$message}}</p>@enderror
            @error('function')<p class="error-message">{{$message}}</p>@enderror
        </div>
    </div>
</body>
</html>