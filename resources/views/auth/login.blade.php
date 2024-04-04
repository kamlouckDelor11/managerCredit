<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{URL('storage/styles/connexion.css')}}"> 

    <title>Gestion crédit - login</title>
    

       
</head>
<body>
    <div class="contain">
        @error('email')
        <p class="error-message">{{$message}}</p>
        @enderror
        <div class="form">
            <form action="{{route('login')}}" class="formulaire-login" method="post">
                @csrf
                <div class="groupe-id">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="email" id="identifiat" placeholder="Votre identifiant" value="{{old('email')}}">
                </div>
                <div class="groupe-password">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" id="password" placeholder="Votre mot de passe">
                </div>
                <div class="groupe-btn"><button type="submit">Se connecter</button></div>
            </form>
        </div>
    </div>
</body>
</html>